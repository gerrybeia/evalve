<?php

class User_FaculteController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){
    	$this->view->pageCur = "fac";

    	$this->view->facs = $this->user->getFacultes();

    	$this->view->titre = "evalve - facultes";
    }

    public function viewAction(){
    	$this->view->pageCur = "fac";

    	$code = $this->fcR->getParam('code');

    	$this->view->fac = $this->em->getRepository('Entity\Faculte')->findOneBy(array('code'=>$code));

    	$this->view->titre = "evalve - promotion - ".$this->view->fac->getDescription();
    }

    public function addAction(){
    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $desc = $this->req->getPost('desc');
        $code = uniqid();

        $fac = new Entity\Faculte($desc, $code, $this->user);
        $this->em->persist($fac);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('facultes');
    }
}

