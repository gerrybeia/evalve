<?php 

class Schieben_View_Helper_JaScript extends Zend_View_Helper_Abstract
{
    public $view;
 	
 	public function jaScript($src){
 		return '
 		<script src="'.$this->view->baseUrl('/public/js/'.$src).'"></script>';
 	}

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }
}