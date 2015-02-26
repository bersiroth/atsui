<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of template
 *
 * @author bernard
 */
class templateModel extends model{

    private $templateId;
    
    function __construct($templateId){
        $this->templateId = $templateId;
        parent::__construct();
    }
    
    public function getAddonList($position){
        $rows = $this->db->query("SELECT * FROM addon JOIN addon_position ON id=id_addon WHERE id_position = ".$position['id']." AND id_template=".$this->templateId);
        $addonList = $rows->fetchAll(PDO::FETCH_ASSOC);
        return (count($addonList)>0) ? $addonList : false;  
    }
    
    public function getPositions(){
        $rows = $this->db->query("SELECT name,id FROM position JOIN template_position ON id=id_position WHERE id_template=".$this->templateId);
        $position = $rows->fetchAll(PDO::FETCH_ASSOC);
        if(count($position)>0){
            return $position;
        }else{
            debug::writeLog('error', '0 positions found in the template id '.$this->templateId,true);
            return false;
        }
    }
    
    public function getAddon($addonName){
        request::setVar('addon', $addonName);
        request::setVar('controller', $addonName);
        $className = $addonName.'Controller';
        $addon = new $className();
        return $addon->display(false);
    }
}

?>
