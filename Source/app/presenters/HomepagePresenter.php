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
            $this->template->registerForm = $this['registerForm'];
	}
        
        public function createComponentRegisterForm()
        {
            $formData = $this->getSession('$formData');
            $formData->setExpiration('10 minutes');         
            $emailDefault = $formData->email;
            if($emailDefault==""){
                $emailDefault = "@";
            }
            
            $form = new Form;
            $form->addText("username","Meno *")
                  ->setDefaultValue($formData->username)
		  ->setRequired(' Prosím vlož svoje meno.');
            $form->addPassword("password","Heslo *")
		  ->setRequired(' Prosím zadaj heslo.');
            $form->addText("email","E-mail *")
                  ->setDefaultValue($emailDefault)
		  ->setRequired(' Prosím vlož svoj e-mail.')
                  ->addRule(Form::EMAIL, "Zadaj e-mail v správnom formáte.");
            $form->addText("popis","Popis")
                  ->setDefaultValue($formData->description);
            $form->addSubmit("submit","Potvrdenie");
            $form->onSuccess[] = $this->registerFormSucceeded;
            return $form;
        }
        
        public function registerFormSucceeded($form){
            $values = $form->getValues();
            $rows = $this->database->table('users');
            $variable = 0;
            foreach($rows as $row){
                if($row->username == $values->username){
                    $this->flashMessage('Užívateľ s takým menom už existuje !');
                    $variable = 1;
                }
            }
            if($variable == 0){
                    $this->flashMessage('Užívateľ zaregistrovaný !');
                    $data = array(
                        'username' => $values->username,
                        'password' => md5($values->password),
                        'role'     => 'member',
                        'email'    => $values->email,
                        'popis'    => $values->popis
                    );
                    $this->database->table('users')->insert($data);
            $formData = $this->getSession('$formData');
            $formData->remove();
            $this->redirect('Homepage:default');
            }
        }
}
