<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of request
 *
 * @author bernard
 */
class request {
    
    static function getVar($name,$default = NULL){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }elseif(isset($_GET[$name])){
            return $_GET[$name];
        }elseif(!is_null($default)){
            return $default;
        }else{
            return null;
        }
    }
    
    static function setVar($name, $value){
        $type = $_SERVER['REQUEST_METHOD'];
        if($type == 'GET'){
            $_GET[$name] = $value ;
        }else{
            $_POST[$name] = $value ;
        }
    }
}

?>
