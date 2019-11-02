<?php 
  
  echo "<p>L'utilisateur ".htmlspecialchars($_GET['login'])." a bien été modifié !</p>";
  require File::build_path(array("view","utilisateur","list.php"));

?>