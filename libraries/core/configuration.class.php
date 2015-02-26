<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class configuration {

    public static function get($group,$key = null)
    {
        $configPath = PATH_BASE.DS.'configuration'.DS.'global.ini';
        if (file_exists($configPath)) {
            $conf = parse_ini_file(PATH_BASE.DS.'configuration'.DS.'global.ini',true);
            if (!is_null($key)) {
                if (isset($conf[$group][$key])) {
                    return $conf[$group][$key];
                } else {
                    if ($group == 'path' && $key == 'logPath') return PATH_BASE.DS;
                    debug::writeLog('error', "Error var $key in group $group is miising in global configuration file", true);
                }
            } else {
                if (isset($conf[$group])) {
                    return $conf[$group];
                } else {
                    debug::writeLog('error', "Error group $group is miising in global configuration file", true);
                }
            }
        } else {
            debug::writeLog('error', "Error global configuration file is missing : $configPath", true);
        }
    }

}

?>
