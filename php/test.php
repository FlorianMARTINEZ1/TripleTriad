
<?php
require_once '../lib/File.php';
require_once File::build_path(array('php','Carte.php'));// on appelle la classe Carte.php
if(isset($_GET["deck"])){
  Carte::getAllCarteWithDeck($_GET["deck"]);
}
else{
  Carte::getAllCarteWithDeck("FF8"); // on cherche toutes les cartes de la BD et on les envoie en format JSON
}


?>
