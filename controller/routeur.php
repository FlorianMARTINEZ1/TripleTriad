<?php


require_once 'ControllerJoueur.php';
require_once 'ControllerGame.php';
// On recupère l'action passée dans l'URL

$controller_default = "game";

if(!isset($_GET['action'])){
	$action = "accueil";
}
else{
  $action = $_GET['action'];
}



if(!isset($_GET['controller'])){
	$controller = $controller_default;
}
else{
	 $controller = $_GET['controller'];
}

$controller_class='Controller'.ucfirst($controller);
if(class_exists($controller_class)){
	if(in_array($action,get_class_methods($controller_class))){
		$controller_class::$action();

	}
	else{
		$controller_class::error();
	}

}
else{
	ControllerJoueur::error();
}




?>
