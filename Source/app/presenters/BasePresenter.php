<?php

namespace App\Presenters;
use Nette\Application\UI\Form;

use Nette,
	App\Model;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{	
        public function handleSignOut()
        {
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('Homepage:');
        }
        
        public $database;

        function __construct(Nette\Database\Context $database)
        {
            $this->database = $database;
        }
}
