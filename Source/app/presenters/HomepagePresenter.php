<?php

namespace App\Presenters;

use Nette\Database\Context;
use Nette\Application\UI\Form;

use Nette,
	App\Model;
/**
 * Homepage presenter.
 */

class HomepagePresenter extends BasePresenter
{
	public function renderDefault()
	{
                $user = $this->getUser();
                $this->template->user = $user;
	}
}
