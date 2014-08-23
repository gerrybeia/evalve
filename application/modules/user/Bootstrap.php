<?php
//FICHIER DE DEMARAGE
class User_Bootstrap extends Zend_Application_Module_Bootstrap
{
	public function _initRoute(){

		$frontController = Zend_Controller_Front::getInstance();
        $router = $frontController->getRouter();

        $router->addRoute(
            'logout-user',
            new Zend_Controller_Router_Route('logout-user',
                                             array('module' => 'user',
                                                'controller' => 'index',
                                                   'action' => 'deconnexion'))
        );

		$router->addRoute(
            'resume',
            new Zend_Controller_Router_Route('resume',
                                             array('module' => 'user',
                                                'controller' => 'index',
                                                   'action' => 'index'))
        );

        $router->addRoute(
            'facultes',
            new Zend_Controller_Router_Route('facultes',
                                             array('module' => 'user',
                                                'controller' => 'faculte',
                                                   'action' => 'index'))
        );
        

        $router->addRoute(
            'add-fac',
            new Zend_Controller_Router_Route('add-fac',
                                             array('module' => 'user',
                                                'controller' => 'faculte',
                                                   'action' => 'add'))
        );
        $router->addRoute(
            'add-year',
            new Zend_Controller_Router_Route('add-year',
                                             array('module' => 'user',
                                                'controller' => 'annee',
                                                   'action' => 'add'))
        );
        $router->addRoute(
            'add-note',
            new Zend_Controller_Router_Route('add-note',
                                             array('module' => 'user',
                                                'controller' => 'note',
                                                   'action' => 'add'))
        );
        $router->addRoute(
            'add-prom',
            new Zend_Controller_Router_Route('add-prom',
                                             array('module' => 'user',
                                                'controller' => 'promotion',
                                                   'action' => 'add'))
        );
        $router->addRoute(
            'add-etu',
            new Zend_Controller_Router_Route('add-etu',
                                             array('module' => 'user',
                                                'controller' => 'etudiant',
                                                   'action' => 'add'))
        );
        $router->addRoute('viewfac', new Zend_Controller_Router_Route_Regex(
            'faculte/(.+)/code-(.+)',
                array(
                        'module'=>'user',
                        'controller' => 'faculte',
                        'action'     => 'view'
                    ),
                    array(
                        1 => 'nomfac',
                        2 => 'code'
                    ),
                    'faculte/%s/code-%s'
                ));

        $router->addRoute('viewprom', new Zend_Controller_Router_Route_Regex(
            'faculte/(.+)/(.+)/code-(.+)-(\d+)',
                array(
                        'module'=>'user',
                        'controller' => 'promotion',
                        'action'     => 'view'
                    ),
                    array(
                        1 => 'nomfac',
                        2 => 'nomprom',
                        3 => 'code',
                        4 => 'idprom'
                    ),
                    'faculte/%s/%s/code-%s-%d'
                ));

        $router->addRoute('viewyear', new Zend_Controller_Router_Route_Regex(
            'faculte/(.+)/(.+)/(.+)/code-(.+)-(\d+)',
                array(
                        'module'=>'user',
                        'controller' => 'annee',
                        'action'     => 'view'
                    ),
                    array(
                        1 => 'nomfac',
                        2 => 'nomprom',
                        3 => 'annper',
                        4 => 'code',
                        5 => 'idann'
                    ),
                    'faculte/%s/%s/%s/code-%s-%d'
                ));

        $router->addRoute('viewetu', new Zend_Controller_Router_Route_Regex(
            'faculte/(.+)/(.+)/(.+)/(.+)/code-(.+)-(\d+)',
                array(
                        'module'=>'user',
                        'controller' => 'etudiant',
                        'action'     => 'view'
                    ),
                    array(
                        1 => 'nomfac',
                        2 => 'nomprom',
                        3 => 'annper',
                        4 => 'nometu',
                        5 => 'code',
                        6 => 'idetu'
                    ),
                    'faculte/%s/%s/%s/%s/code-%s-%d'
                ));


        /* FORM ANNONCE ADDS
        ========================================================== */
        $router->addRoute(
            'add-annonce-allfac',
            new Zend_Controller_Router_Route('add-annonce-allfac',
                                             array('module' => 'user',
                                                'controller' => 'annonce',
                                                   'action' => 'addallfac'))
        );
        $router->addRoute(
            'add-annonce-fac',
            new Zend_Controller_Router_Route('add-annonce-fac',
                                             array('module' => 'user',
                                                'controller' => 'annonce',
                                                   'action' => 'addfac'))
        );
        $router->addRoute(
            'add-annonce-prom',
            new Zend_Controller_Router_Route('add-annonce-prom',
                                             array('module' => 'user',
                                                'controller' => 'annonce',
                                                   'action' => 'addprom'))
        );
        $router->addRoute(
            'add-annonce-etu',
            new Zend_Controller_Router_Route('add-annonce-etu',
                                             array('module' => 'user',
                                                'controller' => 'annonce',
                                                   'action' => 'addetu'))
        );
    }
}

