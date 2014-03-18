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
	public function renderDefault()
	{
            $user = $this->getUser();
            $this->template->user = $user;
            
            $projekt_S = $this->getSession('projekt_S');
            $projekt_S->setExpiration(0);
            
            if(!$projekt_S->pr_id){
                $this->redirect('Projekt:default');
            }
            
            $this->template->konkretny_projekt = $this->database->table("project")->where("id",$projekt_S->pr_id);   
            
            $owner = $this->database->table("project")->where("id",$projekt_S->pr_id)->fetch()->owner;
            $admin = $this->database->table("users")->where("id",$owner)->fetch()->name;
            $this->template->admin = $admin;
            
            $this->template->members = $this->database->table("project_member")->where("project_id",$projekt_S->pr_id);
            $this->template->users = $this->database->table("users");
	}
}
