<?php

namespace App\Presenters;

use Nette\Database\Context;
use Nette\Application\UI\Form;

use Nette,
	App\Model;
/**
 * Projekt presenter.
 */

class ProjektPresenter extends BasePresenter
{
        public function handleGetIn($projectID)
        {      
            $user = $this->getUser();
            $project_member = $this->database->table("project_member");
            
            foreach($this->database->table("project")->where("id",$projectID) as $projekt){
                if($projekt->owner != $user->id){
                    $data = array(
                        "user_id"    => $user->id,
                        "project_id" => $projectID
                    );
                    $project_member->insert($data);

                    $projekt_S = $this->getSession('projekt_S');
                    $projekt_S->setExpiration(0);
                    $projekt_S->pr_id = $projectID;

                    $this->flashMessage("Pridaný do projektu.");
                    $this->redirect('KonkretnyProjekt:default');
                }else{
                    $this->flashMessage("Nemôžeš byť pridaný, lebo si zakladateľom tohto projektu!");
                }
            }
        }
        
        public function handleKProjekt($projectID)
        {            
            $projekt_S = $this->getSession('projekt_S');
            $projekt_S->setExpiration(0);
            $projekt_S->pr_id = $projectID;
            
            $this->redirect('KonkretnyProjekt:default');
        }
    
	public function renderDefault()
	{
            $moje_projekty = $this->database->table("project")->where("owner",$this->user->id);
            $this->template->moje_projekty = $moje_projekty;

            $vsetky_projekty = $this->database->table("project");
            $this->template->vsetky_projekty = $vsetky_projekty;
	}
        
        public function createComponentNewProjectForm()
        {
            $form = new Form;
            $form->addText("name","Názov projektu")
                 ->setRequired("Zadaj názov projektu!")
                 ->getControlPrototype()->setClass("form-control");
            $form->addTextArea("description","Popis projektu",NULL,8)
                 ->setRequired("Napíš popis projektu!")
                 ->getControlPrototype()->setClass("form-control");
            $form->addSubmit('add', 'Vytvoriť')
                 ->getControlPrototype()->setClass("btn-u");
            $form->onSuccess[] = $this->newProjectSucceeded;
	    return $form;
        }
        
        public function newProjectSucceeded($form)
        {
	    $values = $form->getValues();
            $user = $this->getUser();
            if($user->isLoggedIn()){
                $data = array(
                    "name"        => $values->name,
                    "description" => $values->description,
                    "owner"       => $user->id
                );
                $this->database->table("project")->insert($data);
                $this->flashMessage("Nový projekt vytvorený!");
                $this->redirect('Projekt:default');
            }else{
                $this->flashMessage("Nikto nie je prihlásený.");
            }
        }
}
/*
            $data = array(
                "name"        => $values->name,
                "description" => $values->description,
                "owner"       => $this->database
            );
 * 
 */