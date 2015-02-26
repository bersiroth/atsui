<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class debug {
    
    static function var_dump($param,$die = false) 
    {
        echo '<pre>'.var_dump($param).'</pre>';
        if($die)exit;
    }
    
    static function writeLog($fileName, $message, $exit=false)
    {
        $tmpMessage = "[" . date('Y-d-m H:i:s') . "]\t" . php_uname('n') . "\t" . $message . "  \n";
        foreach (debug_backtrace() as $k => $v) { 
            if ($k < 2) { 
                continue; 
            } 
            array_walk($v['args'], function (&$item, $key) { 
                $item = var_export($item, true); 
            }); 
            $tmpMessage .= "\t#" . ($k - 2) . ' ' . $v['file'] . '(' . $v['line'] . '): ' . (isset($v['class']) ? $v['class'] . '->' : '') . $v['function'] . '(' . implode(', ', $v['args']) . ')' . "\n"; 
        }
        
        $logPath = configuration::get('path','logPath').$fileName.'_'.date('Y-d-m').'.log';
        if (false !== $handle = fopen($logPath, "a+")) {
            die('ERROR FOR OPEN LOG FILE');
        }
        
        if(fwrite($handle, $tmpMessage) === FALSE) {
            die('ERROR FOR WRITE IN LOG FILE . '.$handle); 
        }
        
        fclose($handle);
        if ($exit) {
            die(nl2br($tmpMessage));
        }
    }
}
