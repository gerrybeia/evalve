<?php 
    
    /* REQUEST - REDIRECTOR - SESSION - LAYOUT - ENTITY MANAGER
    =================================================================== */

    $this->fcR = Zend_Controller_Front::getInstance()->getRequest();
    $this->red = $this->_helper->getHelper('Redirector');
    $this->userSession = new Zend_Session_Namespace('user');
    $this->layout = Zend_Layout::getMvcInstance();
    $this->req = new Zend_Controller_Request_Http();
    $this->mess = $this->_helper->getHelper('FlashMessenger');
    $this->em = Zend_Registry::get('em');

    $this->view = $this->layout->getView();
    $this->view->userSession = $this->userSession;

    /* HELPER PERSO AFFICHAGE DES MESSAGES
    ========================================================== */
    $this->view->addHelperPath(SCHIEBEN_HELPERS_PATH, 'Schieben_View_Helper');
    $this->view->messages = $this->mess->getMessages();

    $this->view->addScriptPath(APPLICATION_PATH."/layouts/partials/");
    $this->view->addScriptPath(APPLICATION_PATH."/modules/user/views/helpers/ouvrage/");

    if (is_null($this->userSession->userId) && $this->fcR->getModuleName()!="default") {
        $this->red->gotoUrl('/');
    }else{
        
        if($this->userSession->userStatue == 'user')
        {
            if ($this->fcR->getModuleName()=="default" || $this->fcR->getModuleName()=="admin") 
                $this->red->gotoUrl('resume');
            $this->user = $this->em->find('Entity\Etablissement',$this->userSession->userId);
            $this->view->userConn = $this->user;
        }
        elseif($this->userSession->userStatue == 'admin')
        {
            if ($this->fcR->getModuleName()=="default" || $this->fcR->getModuleName()=="user") 
                $this->red->gotoUrl('admin-resume');
            $this->user = $this->em->find('Entity\Admin',$this->userSession->userId);
            $this->view->userConn = $this->user;
        }
        
    }
    
?>