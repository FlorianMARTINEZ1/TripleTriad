<?php
require_once '../lib/File.php';



     require_once 'Carte.php';
     $Carte1 = new Carte($_POST['nomCarte'],$_POST['valN'],$_POST['valS'],$_POST['valO'],$_POST['valE']);
     $Carte1->save();
     $imgr = $_POST['urlRed'];
     $imgb = $_POST['urlBlue'];
     $imgr = str_replace('data:image/png;base64,', '', $imgr);
     $imgb = str_replace('data:image/png;base64,', '', $imgb);
     $imgr = str_replace(' ', '+', $imgr);
     $imgb = str_replace(' ', '+', $imgb);
     $fileDatar = base64_decode($imgr);
     $fileDatab = base64_decode($imgb);
     //saving
     $fileNamer = File::build_path(array("css","cartes",$_POST['source'],$_POST['nomCarte'].'.rouge.jpg'));
     $fileNameb = File::build_path(array("css","cartes",$_POST['source'],$_POST['nomCarte'].'.bleu.jpg'));
     file_put_contents($fileNamer, $fileDatar);
     file_put_contents($fileNameb, $fileDatab);


 ?>
