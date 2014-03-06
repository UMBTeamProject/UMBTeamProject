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

        public function beforeRender() 
        {
                $user = $this->getUser();
                $this->template->user = $user;
                $rows = $this->database->table('users')
                        ->where('id', $user->id)->fetch();
                if($user->isLoggedIn()){
                    $this->template->name = $rows->username;
                    $this->template->email = $rows->email;
                }
        }
    
	protected function createComponentSignInForm()
	{
		$form = new Form;
		$form->addText('username', 'Username:',10)
                        ->setAttribute("placeholder","meno")
			->setRequired('Prosím vlož svoje prihlasovacie meno.');

		$form->addPassword('password', 'Password:',10)
                        ->setAttribute("placeholder","heslo")
			->setRequired(' Prosím vlož svoje heslo.');

		$form->addCheckbox('remember', 'Zostaň prihlásený.');

		$form->addSubmit('send', 'Login');

		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}


	public function signInFormSucceeded($form)
	{
		$values = $form->getValues();
                
                $user = $this->getUser();
                try {
                    $user->login($values->username, $values->password);
                    $user->setExpiration('10 minutes', TRUE);
                    //$this->redirect(...);

                } catch (Nette\Security\AuthenticationException $e) {
                    $this->flashMessage($e->getMessage());
                }
                
		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
                $formData = $this->getSession('$formData');
                $formData->remove();
                $this->redirect('Homepage:default');
	}
}
