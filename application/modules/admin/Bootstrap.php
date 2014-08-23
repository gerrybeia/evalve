<?php
//FICHIER DE DEMARAGE
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
	public function _initRoute(){

        /* GETTING FRONT CONTROLLER INSTANCE THEN ROUTER OBJECT 
        ========================================================== */
        $frontController = Zend_Controller_Front::getInstance();
        $router = $frontController->getRouter();

        $router->addRoute(
            'logout',
            new Zend_Controller_Router_Route('logout',
                                             array('module' => 'admin',
                                                'controller' => 'index',
                                                   'action' => 'deconnexion'))
        );

        $router->addRoute(
            'admin-resume',
            new Zend_Controller_Router_Route('admin-resume',
                                             array('module' => 'admin',
                                                'controller' => 'index',
                                                   'action' => 'index'))
        );

        $router->addRoute(
            'admin-ets',
            new Zend_Controller_Router_Route('admin-ets',
                                             array('module' => 'admin',
                                                'controller' => 'etablissement',
                                                   'action' => 'index'))
        );

        $router->addRoute(
            'add-ets',
            new Zend_Controller_Router_Route('add-ets',
                                             array('module' => 'admin',
                                                'controller' => 'etablissement',
                                                   'action' => 'add'))
        );
    }
}

