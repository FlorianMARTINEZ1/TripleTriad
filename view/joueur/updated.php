<?php

  echo "<h5>L'utilisateur ".htmlspecialchars(myget('login'))." a bien été modifié !</h5>";
  require File::build_path(array("view","joueur","connect.php"));

?>
