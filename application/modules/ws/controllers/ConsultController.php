<?php
class Ws_ConsultController extends Zend_Controller_Action
{
    public function init()
    {
        $this->fcR = Zend_Controller_Front::getInstance()->getRequest();
        $this->em = Zend_Registry::get('em');
    }

    public function getAction()
    {

        /* RECUPERATION DES PARAMS
        ========================================================== */
        $numero = $this->fcR->getParam("n");
        $sms = $this->fcR->getParam("t");

        /* TRAITEMENT DE L'SMS
        ========================================================== */
        $parametres = explode('-', $sms);

        /* SI LE NUMERO N'EST PAS ENCORE ENREGISTRE
        ========================================================== */
        if(is_null($sms) || is_null($numero)) {
            $this->erreur();
        }
        $etudiants = $this->em->createQuery('SELECT e FROM Entity\Etudiant e JOIN e.numeros n WHERE n.tel = \''.$numero.'\'')->getResult();
        if(is_null($etudiants) || empty($etudiants)){
            $this->erreur("2");
        }

        /* SI LE MESSAGE EST VIDE
        ========================================================== */
        if($sms=="" || $numero=="") {
            $this->erreur();
        }

        /* SI LE MESSAGE CONTIENT LES BONS MOT-CLES
        ========================================================== */
        $nbrparams = count($parametres);//NBR DE PARAMETRES

        //PAS DE PARAMS
        if($nbrparams<1) {
            $this->erreur();
        }

        $typeReq = $parametres[0];//FIRST PARAM : TYPE REQ

        $trietemps =null;
        if($nbrparams>1) $trietemps = $parametres[1];

        //SWITCH CASE TYPE REQ
        switch ($typeReq) {
            case 'note':
                $this->answerNote($typeReq,$trietemps,$etudiants);
                break;
            case 'horaire':
                die($typeReq);
                break;
            default:
                $this->erreur();
                break;
        }  
    }

    public function erreur($message=null){
        $reponse = array();
        $reponse['error'] = 1;
        if($message==null) $reponse['message'] = "evalve **** erreur : votre requete n'est pas conforme";
        else $reponse['message'] = "evalve **** erreur : numero non enregistre.";
        die(Zend_Json::encode($reponse));
    }

    public function nodata($message=null){
        $reponse = array();
        $reponse['error'] = 0;
        if($message==null) $reponse['message'] = "evalve **** no data : l'information que vous demandez n'est pas encore disponible";
        else $reponse['message'] = $message;
        die(Zend_Json::encode($reponse));
    }

    public function postAction(){
        //die(Zend_Json::encode(array("error"=>"0","user"=>"freddy")));
    }

    public function answerNote($typeReq,$trietemps,$etudiants){

        $notes = $etudiants[0]->getNotes();

        if($notes->count()<1){
            $this->nodata();
        }

        $reponse = array();
        $reponse['error'] = 0;
        $reponse['message'] = "evalve **** message : ";

        if($trietemps!=null){
            foreach ($notes as $key => $value) {
                
                if($trietemps==str_replace(' ', '', $value->getPeriode()))
                    $reponse['message'] .= " - ".$value->getPeriode()." : ".$value->getLanote();
            }
        }else{
            foreach ($notes as $key => $value) {
                $reponse['message'] .= " - ".$value->getPeriode()." : ".$value->getLanote()." - ";
            }
        }
        die(Zend_Json::encode($reponse));

    }

}
?>