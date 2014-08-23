<?php

class IndexController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){

    	if($this->req->isPost()){

    		$email = strtolower($this->req->getPost('email'));
            $mdp = $this->req->getPost('mdp');
            
            /* RECUPERATION DANS LA BASE DE DONNEE
            =================================================================== */
            $admin = $this->em->getRepository('Entity\Admin')->findOneBy(array('email'=>$email,'mdp'=>md5($mdp)));
            
            if($admin == null){
            	
                $user = $this->em->getRepository('Entity\Etablissement')->findOneBy(array('email'=>$email,'mdp'=>$mdp));
                
                if(is_null($user)){
                    $this->mess->addMessage(array('danger'=>'<em>email ou mot de passe incorrect! veuillez réessayer...</em>'));
                    $this->red->gotoUrl('/');
                }else{
                    $this->userSession->userId = $user->getId();
                    $this->userSession->userStatue = 'user';
                    $this->userSession->userNom = $user->getNom();
                }   
            }else{
                $this->userSession->userId = $admin->getId();
                $this->userSession->userStatue = 'admin';
                $this->userSession->userNom = $admin->getNom();
            }
            $this->red->gotoUrl("/");
    	}
    	$this->view->titre = "e-valve -- connexion";
    }
}

