<?php

class File{

  public static function build_path($path_array) {

    // $ROOT_FOLDER (sans slash à la fin) vaut
    // "/home/ann2/votre_login/public_html/TD5" à l'IUT
    //$ROOT_FOLDER = "Votre chemin de fichier menant au site Web";
    $DS = DIRECTORY_SEPARATOR;
	  $ROOT_FOLDER = __DIR__ . $DS . "..";
    /*$ROOT_FOLDER ="/home/ann2/ginestes/public_html/PHPH/TD5";*/
    return $ROOT_FOLDER.$DS. join($DS, $path_array);;

  }




}
?>
