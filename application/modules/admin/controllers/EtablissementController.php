<?php

class Admin_EtablissementController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){
    	$this->view->pageCur = "ets";

        $this->view->etabs = $this->em->getRepository('Entity\Etablissement')->findAll();

    	$this->view->titre = "e-valve -- admin -- etablissement";
    }

    public function addAction(){
    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $email = $this->req->getPost('email');
        $nom = $this->req->getPost('nom');
        $cigle = $this->req->getPost('cigle');
        $tel = $this->req->getPost('tel');

        $code = $cigle;

        $ets = new Entity\Etablissement($email,$nom, $cigle, $tel, $code);
        $this->em->persist($ets);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('admin-ets');
    }
}

