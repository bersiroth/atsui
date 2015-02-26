<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of default
 *
 * @author bernard
 */
class adminpanelController  extends controller {
    
    public function display($isContent = true){
        return parent::display($isContent);
    }
    
    public function login(){
        $login = request::getVar('login', 'default');
        $password = request::getVar('password', 'default');
        $model = $this->getModel();
        if($model->getAuth($login,$password)){
//            Bredirect::redirect();
//            die('OK');
            header('HTTP/1.1 301 Moved Permanently');
            header("Location : /index.php");
        }else{
            request::setVar("error", true);
            $this->display();
        }
    }
}
?>
