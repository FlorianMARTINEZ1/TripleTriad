<?php

  echo "<h5>Le joueur  ".htmlspecialchars($_GET['login'])." a bien été créée !</h5>";
  require File::build_path(array("view","joueur","connect.php"));
  echo "<script>let e = document.getElementsByTagName(\"h5\").classList.add(\"afficheh5\");
  e.style.display=\"block\";</script>";

?>
