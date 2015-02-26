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
class defaultModel extends model {

    function getTest(){
        $row = $this->db->query('SELECT * FROM jeuxvideo;');
        return $row->fetchAll();
    }
    
}
?>
