<?php

  echo "<h5>L'utilisateur ".htmlspecialchars($_GET['login'])." a bien été modifié !</h5>";
  require File::build_path(array("view","joueur","connect.php"));

?>
