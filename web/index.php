<?php
//TODO protection des repertoires avec un index.html vide (pas obligatoir avec la protection server) contre l'apelle des fichier directement (redirection des URL autre que les menus)
//TODO commentaire pour documentation
//TODO controller le typage des des variable et des functions

//TODO uniquement function static 
//TODO convention de nomage pas underscore pour les functions static 
//TODO revoir les includes des models vue et template avec le autoload
//TODO revoir l'histoire de l'addon principal et le passage d'argument
//TODO faire un ORM dans la classe mere model (gestion des donnee BDD par objet)
//TODO finir la gestion des addons templates dans la bdd
//TODO continuer le back office
//TODO faire une classe erreur avec gestion des type d'erreur et ecriture dans les logs

define ("DS"        , DIRECTORY_SEPARATOR);
define ("PATH_BASE" , dirname(dirname(__FILE__)));

require_once(PATH_BASE.DS.'includes'.DS.'defines.inc.php');
require_once(PATH_BASE.DS.'includes'.DS.'loader.inc.php');

setlocale(LC_ALL, configuration::get('local','local'));

$addon = request::getVar('addon', 'default');   
$controller = request::getVar('controller', $addon).'Controller';
$task = request::getVar('task', 'display');

$controller = new $controller();
$controller->$task();

?>