<?php

class Admin_IndexController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){
    	$this->view->pageCur = "res";

        $query = $this->em->createQuery('SELECT COUNT(e.id) as nbb FROM Entity\Etablissement e');
        $nbr = $query->getResult();
        $this->view->nbrets = $nbr['0']['nbb'];

        $query = $this->em->createQuery('SELECT COUNT(e.id) as nbb FROM Entity\Etudiant e');
        $nbr = $query->getResult();
        $this->view->nbretu = $nbr['0']['nbb'];

    	$this->view->titre = "e-valve -- admin -- resume";
    }

    public function deconnexionAction(){
    	Zend_Session::namespaceUnset('user');
        $this->red->gotoUrl('/');
    }
}

