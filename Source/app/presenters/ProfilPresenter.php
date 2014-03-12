<?php

namespace App\Presenters;

use Nette\Database\Context;

use Nette,
	App\Model;
/**
 * Profil presenter.
 */

class ProfilPresenter extends BasePresenter
{

	public function renderDefault()
	{
                $rows = $this->database->table('users');
                
                $user = $this->getUser();
                if($user->isLoggedIn()){
                    foreach($rows as $row){
                        $this->template->id= $row['id'];
                        $this->template->name = $row['name'];
                        $this->template->mail = $row['mail'];
                        $this->template->about_me = $row['about_me'];
                        $this->template->references = $row['references'];
                        $this->template->skills = $row['skills'];   
                        $this->template->date = $row['date'];   
                    }
                }
                else{
                    $this->redirect("Homepage:");
                }
	}
}
