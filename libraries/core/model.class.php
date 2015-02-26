<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author bernard
 */
class model {
    
    private   $DBparams;
    protected $db;
    
    function __construct() {
        $this->DBparams = configuration::get('db');
        $this->db = $this->getDB();
    }
    
    private function getDB(){
        if(!is_a($this->db, 'PDO')){
            try {
                $pdo = new PDO('mysql:dbname='.$this->DBparams['base'].';host='.$this->DBparams['host'], $this->DBparams['user'], $this->DBparams['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            } catch (Exception $e) {
                debug::writeLog('dbAcces',$e->getMessage(),true);
            }
            return $pdo;
        }else{
            return $this->db;
        }
    }
    
    public function getTemplate(){
        $addon =request::getVar('addon', 'default');
        $adminPanel = ($addon == 'adminpanel') ? 1 : 0 ;
        $row = $this->db->query("SELECT * FROM `template` WHERE `default` = 1 AND adminpanel = ".$adminPanel);
        $template = $row->fetch(PDO::FETCH_ASSOC);
        return new template($template);
    }
}

?>
