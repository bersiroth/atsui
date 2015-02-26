<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class template {

    private $template;
    private $model;
    
    function __construct($template) {
        define("PATH_TEMPLATE", PATH_TEMPLATES.DS.$template['name']);
        
        define("URL_PATH_TEMPLATE",'/templates/'.$template['name']);
        define("URL_PATH_TEMPLATE_MEDIA",URL_PATH_TEMPLATE.'/media');
        define("URL_PATH_TEMPLATE_CSS",URL_PATH_TEMPLATE.'/css');
        define("URL_PATH_TEMPLATE_JS",URL_PATH_TEMPLATE.'/js');
        
        $this->template         = $template;
        $this->templateRender   = $this->getIncludeContent(PATH_TEMPLATES.DS.$template['name'].DS.'index.php');       
        $this->model            = $this->getModel($template['id']);
    }
    
    function getModel($templateId){
        request::setVar('addon', 'template');
        if(!is_a($this->model, 'templateModel')){
            return new templateModel($templateId); 
        }else{
            return $this->model;
        }
    }

    public function bind($name,$data){
        $this->templateRender = preg_replace("/\{$name\}/", $data, $this->templateRender);
    }

    public function display(){
        $this->bindAll();
        echo $this->templateRender;
    }
  
    private function bindAll(){
        foreach ($this->model->getPositions() as $position) {
            $addonList = $this->model->getAddonList($position);
            if($position['name'] != 'content'){
                foreach ($addonList as $addon) {
                    $this->bind($position['name'], $this->model->getAddon($addon['name']));
                }
            }
        }
    }
    
    private function getIncludeContent($fileName) {
        if (file_exists($fileName)) {
            ob_start();
            include $fileName; 
            $fileDisplay = ob_get_contents();
            ob_end_clean();
            return $fileDisplay;
        }else{
            debug::writeLog('error', 'missing file "'.$fileName.'"',true);
            return false;
        }
    }
}
?>
