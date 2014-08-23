<?php

class User_AnnonceController extends Zend_Controller_Action
{
    public function init(){
    	require_once APPLICATION_PATH.'/configs/ini.php';
    }

    public function addallfacAction(){

    	if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $desc = $this->req->getPost('desc');

        $type = "allfac";
        $date = new DateTime(date('m/d/Y h:i:s a', time()));

        $empty = $this->em->getRepository('Entity\Etudiant')->findOneBy(array('code'=>'empty'));

        $annonce = new Entity\Annonce($desc , $type, $date, $this->user, $empty->getFaculte(), $empty->getPromotion(), $empty->getAnnee(), $empty);

        $this->em->persist($annonce);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('resume');

    }

    public function addfacAction(){

        if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $desc = $this->req->getPost('desc');
        $facid = $this->req->getPost('facid');

        $type = "fac";
        $date = new DateTime(date('m/d/Y h:i:s a', time()));

        $empty = $this->em->getRepository('Entity\Etudiant')->findOneBy(array('code'=>'empty'));

        $faculte = $this->em->find('Entity\Faculte',$facid);

        $annonce = new Entity\Annonce($desc , $type, $date, $this->user, $faculte, $empty->getPromotion(), $empty->getAnnee(), $empty);

        $this->em->persist($annonce);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('resume');

    }

    public function addpromAction(){

        if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $desc = $this->req->getPost('desc');
        $promid = $this->req->getPost('promid');

        $type = "prom";
        $date = new DateTime(date('m/d/Y h:i:s a', time()));

        $empty = $this->em->getRepository('Entity\Etudiant')->findOneBy(array('code'=>'empty'));

        $promotion = $this->em->find('Entity\Promotion',$promid);

        $annonce = new Entity\Annonce($desc , $type, $date, $this->user, $promotion->getFaculte(), $promotion, $empty->getAnnee(), $empty);

        $this->em->persist($annonce);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('resume');

    }

    public function addetuAction(){

        if(!$this->req->isPost()) throw new Exception("Error Processing Request", 1);
        
        $desc = $this->req->getPost('desc');
        $etuid = $this->req->getPost('etuid');

        $type = "prom";
        $date = new DateTime(date('m/d/Y h:i:s a', time()));

        $etudiant = $this->em->find('Entity\Etudiant',$etuid);

        $annonce = new Entity\Annonce($desc , $type, $date, $this->user, $etudiant->getFaculte(), $etudiant->getPromotion(), $etudiant->getAnnee(), $etudiant);

        $this->em->persist($annonce);
        $this->em->flush();

        $this->mess->addMessage(array('success'=>'Ajout reussi.'));    
        $this->red->gotoUrl('resume');

    }
}

