<?php

class User_IndexController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }
    public function indexAction(){
    	$this->view->pageCur = "res";
        $this->view->titre = "evalve - resume";
    }

    public function deconnexionAction(){
    	Zend_Session::namespaceUnset('user');
        $this->red->gotoUrl('/');
    }
}

