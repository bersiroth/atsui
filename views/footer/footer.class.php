<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of header
 *
 * @author bernard
 */
class footerView extends view{
    
    function display(){
        $this->bind('data','footer view display');    
        return parent::display();
    }
}

?>
