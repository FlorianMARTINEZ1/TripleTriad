<?php 
  
  echo "<p>L'utilisateur  ".htmlspecialchars($_GET['login'])." a bien été créée !</p>";
  require File::build_path(array("view","utilisateur","list.php"));

?>