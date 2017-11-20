<?php
include_once ('src/view/Page.php');

use src\view\Page;$page = new Page ($_REQUEST );$className = $page->getController () . 'Controller';
try {
	include_once 'src/controller/' . $className . '.php';	$controller = new $className ( $page );	$action = $page->getAction ();	$controller->$action ();
} catch ( Exception $e ) {
}

?>

