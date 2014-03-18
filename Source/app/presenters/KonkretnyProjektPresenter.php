<?php

namespace App\Presenters;

use Nette\Database\Context;
use Nette\Application\UI\Form;

use Nette,
	App\Model;
/**
 * KonkretnyProjekt presenter.
 */

class KonkretnyProjektPresenter extends BasePresenter
{
        public $id;
    
	public function renderDefault($id)
	{
            $this->id = $id;
            $user = $this->getUser();
            $this->template->user = $user;
            
            $this->template->konkretny_projekt = $this->database->table("project")->where("id",$id)->fetch();   
            
            $owner = $this->database->table("project")->where("id",$id)->fetch()->owner;
            $admin = $this->database->table("users")->where("id",$owner)->fetch()->name;
            $this->template->admin = $admin;
            
            $this->template->members = $this->database->table("project_member")->where("project_id",$id);
            $this->template->users = $this->database->table("users");
	}
        
        public function createComponentListTasks()
        {
            $konkretny_projekt = $this->database->table("project")->where("id",$this->id)->fetch(); 
            dump($this->id);
            $form = new Form;
            $form->addText("name","Názov úlohy")
                 ->setRequired("Zadaj meno úlohy!")
                 ->getControlPrototype()->setClass("form-control");
            $form->addtextArea("description","Popis úlohy",NULL,8)
                 ->setRequired("Zadaj popis úlohy!")
                 ->getControlPrototype()->setClass("form-control");
            $items = array(
                $konkretny_projekt->owner => $konkretny_projekt->ref("users","owner")->name,
            );
            foreach($konkretny_projekt->related("project_member") as $user){
                $items[$user->user->id] = $user->user->name;
            }
            $form->addSelect("worker","Členovia",$items)
                 ->getControlPrototype()->setClass("form-control");
            $form->addSubmit("send","Pridať úlohu")
                 ->getControlPrototype()->setClass("btn-u");
            $form->onSuccess[] = $this->listTasksSucceeded;
	    return $form;
        }
        
        public function listTasksSucceeded($form)
        {
	    $values = $form->getValues();
            $values['owner'] = $this->user->id;
            $values['project_id'] = $this->id;
            $this->database->table("task")->insert($values); 
                $this->flashMessage("Úloha pridaná!");
                $this->redirect('KonkretnyProjekt:default');
        }
}
