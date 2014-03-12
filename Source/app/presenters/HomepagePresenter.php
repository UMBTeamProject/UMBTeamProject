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
    
	protected function createComponentSignInForm()
	{
		$form = new Form;
		$form->addText('email', 'E-mail:')
                     ->setAttribute("placeholder","e-mail")
	             ->setRequired('Prosím vlož svoj prihlasovací e-mail.');

		$form->addPassword('password', 'Heslo:')
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
                    $user->login($values->email, $values->password);
                    $user->setExpiration('10 minutes', TRUE);

                } catch (Nette\Security\AuthenticationException $e) {
                    $this->flashMessage($e->getMessage());
                }
                
		if ($values->remember) {
			$this->getUser()->setExpiration('14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->email, $values->password);
                        $this->redirect('Profil:default');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}
        /*--------------------------------------------------------------------*/
        
        public function createComponentRegisterForm()
        {                     
            $form = new Form;
            $form->addText("mail","E-mail:*")
                 ->addRule(Form::EMAIL,"Vlož správnu e-mailovu adresu!")
                 ->setRequired("Vlož e-mailovu adresu!");
            $form->addPassword("password","Heslo:*")
                 ->addRule(Form::MIN_LENGTH, 'Heslo musí mať aspoň 5d znaky', 4)
                 ->setRequired("Vlož heslo");
            $form->addPassword('passwordVerify', 'Heslo pre kontrolu:*')
                 ->setRequired('Zadejte prosím heslo eště raz pre kontrolu!')
                 ->addRule(Form::EQUAL, 'Hesla se neshodují', $form['password']);
            $form->addText("name","Meno:*")
                 ->setRequired("Zadaj svoje meno!");
            $form->addText("about_me","O mne:*")
                 ->setRequired("Napíš niečo o sebe!");
            $form->addText("references","Odporúčania:");
            $form->addText("skills","Zručnosti:");
            $form->addSubmit("submit","Registrovať");
            $form->onSuccess[] = $this->registerFormSucceeded;
            return $form;
        }
        
        public function registerFormSucceeded($form){
            $values = $form->getValues();
            $rows = $this->database->table('users');
            $variable = 0;
            foreach($rows as $row){
                if($row->name == $values->name){
                    $this->flashMessage('Užívateľ s takým menom už existuje !');
                    $variable = 1;
                }
                if($row->mail == $values->mail){
                    $this->flashMessage('Užívateľ s takým e-mailom už existuje !');
                    $variable = 1;
                }
            }
            if($variable == 0){
                $this->flashMessage('Užívateľ zaregistrovaný !');
                $data = array(
                    'mail'       => $values->mail,
                    'password'   => md5($values->password),
                    'role'       => 'member',
                    'name'       => $values->name,
                    'about_me'   => $values->about_me,
                    'references' => $values->references,
                    'skills'     => $values->skills
                    );
            $this->database->table('users')->insert($data);
            $this->redirect('Profil:default');
            }
        }
}
