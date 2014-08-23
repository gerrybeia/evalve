<?php

class User_NoteController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }

    public function viewAction(){
    }

    public function addAction(){
    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);

        $idetu = $this->req->getPost('idetu');
        $code = uniqid();

        $etudiant = $this->em->find('Entity\Etudiant',$idetu);

        $lanote = $this->req->getPost('lanote');
        $periode = $this->req->getPost('periode');

        $fac = $etudiant->getFaculte();
        $prom = $etudiant->getPromotion();
        $ann = $etudiant->getAnnee();

        $date = new DateTime(date('m/d/Y h:i:s a', time()));

        $note = new Entity\Note($periode, $lanote, $date, $etudiant, $this->user, $fac, $prom, $ann);

        $this->em->persist($note);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('facultes');
    }
}

