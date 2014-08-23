<?php 

class Schieben_View_Helper_CScript extends Zend_View_Helper_Abstract
{
    public $view;
 	
 	public function cScript($src){
 		return '
 		<link rel="stylesheet" href="'.$this->view->baseUrl('/public/css/'.$src).'"/>';
 	}

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }
}