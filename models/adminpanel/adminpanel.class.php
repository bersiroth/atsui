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
class adminpanelModel extends model {

    public function getAuth($login,$password){
//        echo 'query = '. "SELECT * FROM users WHERE login = '$login' AND password = '".md5($password)."'";
        $row = $this->db->query("SELECT * FROM users WHERE login = '$login' AND password = '".md5($password)."'");
        $user = $row->fetchAll(PDO::FETCH_ASSOC);
        return (count($user)>0) ? true : false; 
    }
    
}
?>
