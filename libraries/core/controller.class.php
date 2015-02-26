<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author bernard
 */
class controller {
    
    var $controllerName;
        
    function __construct() {
        $this->controllerName = request::getVar('controller', request::getVar('addon', 'default'));
    }
    
    function display($isContent){
        $view = $this->controllerName.'View';
        $view = new $view;
        request::setVar('isContent', $isContent);
        return $view->display();
    }
    
    function getModel(){
        $model = $this->controllerName.'Model';
        return new $model(); 
    }
}

?>
