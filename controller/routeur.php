<?php


require_once 'ControllerJoueur.php';
require_once 'ControllerGame.php';
<<<<<<< HEAD
require_once 'ControllerCreateurCarte.php';
=======
>>>>>>> 07b0ef45d3695f455b8e8522b79855f0bed8aef4
// On recupère l'action passée dans l'URL

function myGet($nomvar){
	 if(isset($_GET[$nomvar])){
		 return $_GET[$nomvar];
	 }
	 else if(isset($_POST[$nomvar])){
		 return $_POST[$nomvar];
	 }
	 else {
		 return null;
	 }
}

$controller_default = "game";

if(is_null(myGet('action'))){
	$action = "accueil";
}
else{
  $action = myGet('action');
}



if(is_null(myGet('controller'))){
	$controller = $controller_default;
}
else{
	 $controller =  myGet('controller');
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
