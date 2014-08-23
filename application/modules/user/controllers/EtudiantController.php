<?php

class User_EtudiantController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }

    public function viewAction(){
        $this->view->pageCur = "fac";

        $idetu = $this->fcR->getParam('idetu');

        $this->view->etudiant = $this->em->find('Entity\Etudiant',$idetu);

        $this->view->titre = "evalve - etudiant - ".$this->view->etudiant->getNom();
    }

    public function addAction(){
    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);

        $idann = $this->req->getPost('annid');
        $code = uniqid();

        $annee = $this->em->find('Entity\Annee',$idann);

        $email = $this->req->getPost('email');
        $nom = $this->req->getPost('nom');
        $prenom = $this->req->getPost('prenom');

        $tel = $this->req->getPost('tel');

        $fac = $annee->getFaculte();
        $prom = $annee->getPromotion();

        $etudiant = new Entity\Etudiant($email, $nom, $prenom, $code, $this->user, $fac, $prom, $annee);


        $this->em->persist($etudiant);
        $this->em->flush();

        $numero = new Entity\Numero('self', $tel, $etudiant);
        $this->em->persist($numero);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('facultes');
    }
}

