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
	public function renderDefault()
	{
                $user = $this->getUser();
                $this->template->user = $user;
	}

	public function renderDetail($id)
	{
	}
}
