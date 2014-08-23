<?php

class User_AnneeController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){
    }

    public function viewAction(){

        $this->view->pageCur = "fac";
        $id = $this->fcR->getParam('idann');

        $ann = $this->em->find('Entity\Annee',$id);
        $this->view->etds = $ann->getEtudiants();

        $this->view->ann = $ann;

        $this->view->titre = "evalve - annees";
    }

    public function addAction(){
    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $idprom = $this->req->getPost('promid');
        $code = uniqid();

        $prom = $this->em->find('Entity\Promotion',$idprom);

        $periode = $this->req->getPost('periode');
        $fac = $prom->getFaculte();

        $annee = new Entity\Annee($periode, $code, $fac ,$this->user, $prom);


        $this->em->persist($annee);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('facultes');
    }
}

