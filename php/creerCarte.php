<?php



    require_once('Carte.php');
     $Carte1 = new Carte($_POST['id'],$_POST['valN'],$_POST['valS'],$_POST['valO'],$_POST['valE']);
     $Carte1->save();


 ?>
