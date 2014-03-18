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
	public function renderDefault($id)
	{
            $user = $this->getUser();
            $this->template->user = $user;
            
            $this->template->konkretny_projekt = $this->database->table("project")->where("id",$id);   
            
            $owner = $this->database->table("project")->where("id",$id)->fetch()->owner;
            $admin = $this->database->table("users")->where("id",$owner)->fetch()->name;
            $this->template->admin = $admin;
            
            $this->template->members = $this->database->table("project_member")->where("project_id",$id);
            $this->template->users = $this->database->table("users");
	}
}
