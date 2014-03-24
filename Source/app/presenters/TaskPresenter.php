<?php

namespace App\Presenters;

use Nette\Database\Context;
use Nette\Application\UI\Form;

use Nette,
	App\Model;
/**
 * Ulohy presenter.
 */

class TaskPresenter extends BasePresenter
{
	/** @persistent */
	public $id;

	public function renderDetail($id)
	{
		$this->id = $id;
		$this->template->task = $this->database->table("task")->where("id",$id)->fetch();
	}

	public function createComponentAddComment()
	{
		$form = new Form;
		$form->addTextarea("text","Komentár:")
			->setAttribute("rows",8)
			->getControlPrototype()
			->setClass("form-control");
		$form->addSubmit("send","Poslať komentár")
			->getControlPrototype()
			->setClass("btn-u");
		$form->onSuccess[] = $this->addComment;
		return $form;
	}

	public function addComment($form)
	{
		if (!$this->user->isLoggedIn()) {
			$this->flashMessage("Pridávanie komentárov je povolené iba pre prihlásených.", "warning");
		} else {
		$this->database->table('comment')
			->insert(
				array_merge(
					(array) $form->getValues(),
					array(
						"task" => $this->id,
						"author" => $this->user->id,
					)
				)
			);
		}
		$this->redirect('this');
	}
}
