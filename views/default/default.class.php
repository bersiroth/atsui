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
class defaultView extends view 
{    
    public function display()
    {
        $model = $this->getModel();
        $dataTest = $model->getTest();
        $this->bind('data',$dataTest);    
        return parent::display();
    }
}

?>
