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
abstract class view 
{
    
    private $controllerName;
    private $model;
    
    public function __construct() 
    {
        $addonName = request::getVar('addon', 'default');
        $this->controllerName = request::getVar('controller', $addonName);
        if (file_exists(PATH_BASE.DS.'models'.DS.$addonName.DS.$this->controllerName.'.class.php')) {
            $this->model = $this->getModel();
        }
    }
    
    protected function getModel()
    {
        if (!is_a($this->model, $this->controllerName.'Model')) {         
            $model = $this->controllerName.'Model';
            return new $model(); 
        } else {
            return $this->model;
        }
    }
    
    private function getIncludeContent($fileName) 
    {
        if (file_exists($fileName)) {
            ob_start();
            include $fileName; 
            $fileDisplay = ob_get_contents();
            ob_end_clean();
            return $fileDisplay;
        } else {
            debug::writeLog('error', 'missing file "'.$fileName.'"',true);
            return false;
        }
    }
            
    public function display($layout='default')
    {
        $addonNamne = request::getVar('addon','default');
        $layoutPath = PATH_BASE.DS.'views'.DS.$addonNamne.DS.'layout'.DS.$layout.'.php';
        $layoutDisplay = $this->getIncludeContent($layoutPath);
        $isContent = request::getVar('isContent', false);
        if($isContent == true){
            $template = $this->model->getTemplate();
            $template->bind('content',$layoutDisplay);
            $template->display();
        }else{
            return $layoutDisplay;
        }
    }
    
    public function bind($name,$data)
    {
        $this->$name = $data;
    }
}

?>
