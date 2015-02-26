<?php
require_once(PATH_LIBRARIES.DS.'utils'.DS.'debug.class.php');
require_once(PATH_LIBRARIES.DS.'helpers'.DS.'request.class.php');

function __autoload($file){
    preg_match("/[A-Z][a-z]*/",$file,$type);
    $file = str_replace($type,"",$file);
    $type = (isset($type[0]))? strtolower($type[0]).'s' : '';
    $addon = request::getVar('addon','default');
    $path = PATH_BASE.DS.$type.DS.$addon.DS.$file.'.class.php';
    if (file_exists($path)) {
        include $path; 
    } elseif (file_exists(PATH_LIBRARIES.DS.'core'.DS.$file.'.class.php')) {
        include PATH_LIBRARIES.DS.'core'.DS.$file.'.class.php'; 
    } elseif (file_exists(PATH_LIBRARIES.DS.'helpers'.DS.$file.'.class.php')) {
        include PATH_LIBRARIES.DS.'helpers'.DS.$file.'.class.php'; 
    } elseif (file_exists(PATH_LIBRARIES.DS.'utils'.DS.$file.'.class.php')) {
        include PATH_LIBRARIES.DS.'utils'.DS.$file.'.class.php'; 
    } else {
        debug::writeLog('error', 'missing file '.$file.'.class.php for include (type = '.$type.', addon = '.$addon.', path = '.$path.')',true);
    }
}

?>
