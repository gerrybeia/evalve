<?php

class User_PromotionController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){
    	
    }

    public function viewAction(){

        $this->view->pageCur = "fac";
        $id = $this->fcR->getParam('idprom');

        $prom = $this->em->find('Entity\Promotion',$id);
        $this->view->anns = $prom->getAnnees();

        $this->view->prom = $prom;

        $this->view->titre = "evalve - promotion";
    }

    public function addAction(){
    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $attr = $this->req->getPost('attr');
        $level = $this->req->getPost('level');

        $codefac = $this->req->getPost('facode');

        $fac = $this->em->getRepository('Entity\Faculte')->findOneBy(array('code'=>$codefac));
        if($fac==null) die($codefac);
        $code = uniqid();

        $prom = new Entity\Promotion($level, $attr, $code, $fac ,$this->user);
        $this->em->persist($prom);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('facultes');
    }
}

