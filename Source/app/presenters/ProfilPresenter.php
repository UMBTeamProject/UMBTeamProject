<?php

namespace App\Presenters;

use Nette\Database\Context;
use Nette\Application\UI\Form;

use Nette,
	App\Model;
/**
 * Profil presenter.
 */

class ProfilPresenter extends BasePresenter
{
	public function renderDetail($id)
	{
		$this->template->profil = $this->database->table("users")->where("id",$id)->fetch();
		$this->template->ownedProjects = $this->database->table("project")->where("owner",$id);
		$this->template->memberProjects = $this->database->table("project")->group('project.id')->where(":project_member.user_id",$id);
	}
}
