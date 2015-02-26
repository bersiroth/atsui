<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author bernard
 */
class adminpanelView extends view {
    
    function display(){    
        $msgError = (request::getVar("error", false)) ? "Error whith your information" : "" ;
        $this->bind('error', $msgError);
        return parent::display();
    }
}

?>
