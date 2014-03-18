<?php

namespace App\Presenters;

use Nette\Database\Context;
use Nette\Application\UI\Form;

use Nette,
	App\Model;
/**
 * Registracia presenter.
 */

class RegistraciaPresenter extends BasePresenter
{
	public function renderDefault()
	{
                $user = $this->getUser();
                $this->template->user = $user;
	}
        
        public function createComponentRegisterForm()
        {                     
            $form = new Form;
            $form->addText("mail","E-mail:*")
                 ->addRule(Form::EMAIL,"Vlož správnu e-mailovu adresu!")
                 ->setRequired("Vlož e-mailovu adresu!")
                 ->setAttribute("placeholder","E-mail")
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addPassword("password","Heslo:*")
                 ->addRule(Form::MIN_LENGTH, 'Heslo musí mať aspoň %d znaky', 4)
                 ->setRequired("Vlož heslo!")
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addPassword('passwordVerify', 'Heslo pre kontrolu:*')
                 ->setRequired('Zadejte prosím heslo eště raz pre kontrolu!')
                 ->addRule(Form::EQUAL, 'Hesla sa neshodujú.', $form['password'])
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addText("name","Meno:")
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addText("about_me","O mne:")
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addText("references","Odporúčania:")
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addText("skills","Zručnosti:")
                 ->getControlPrototype()->setClass("form-control margin-bottom-20");
            $form->addSubmit("submit","Registrovať")
                 ->getControlPrototype()->setClass("btn btn-primary");
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