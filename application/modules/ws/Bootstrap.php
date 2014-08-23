<?php
//FICHIER DE DEMARAGE
class Ws_Bootstrap extends Zend_Application_Module_Bootstrap
{
	//INITIALISATION DES ROUTES POUR LE MODULE SERVICE WEB 
	public function _initRoute()
    {    
        $frontController = Zend_Controller_Front::getInstance();
        $restRoute = new Zend_Rest_Route($frontController, array(), array('ws'));
        $router = $frontController->getRouter();
        $router->addRoute('ws',$restRoute);
    }
}

