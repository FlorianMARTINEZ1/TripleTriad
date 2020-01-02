<?php
require_once '../lib/File.php';



     require_once 'Carte.php';
     //Création d'un objet PHP de classe Carte à partir des données envoyées dans le formulaire
     $Carte1 = new Carte($_POST['nomCarte'],$_POST['valN'],$_POST['valS'],$_POST['valO'],$_POST['valE']);
     $Carte1->setSource($_POST["source"]);
     //On enregistre cet objet dans la base de donnée
     $Carte1->save();
     //On s'occupe maintenant des images des cartes le suffixe r correspond à l'image rouge et le suffixe b à l'image bleue
     //Nous récupérons les données qui étaient dans les champs cachés
     $imgr = $_POST['urlRed'];
     $imgb = $_POST['urlBlue'];
     //Nous préparons les données récupéré en enlevant son entête
     $imgr = str_replace('data:image/png;base64,', '', $imgr);
     $imgb = str_replace('data:image/png;base64,', '', $imgb);
     //Et en remplaçant les espaces par des +
     $imgr = str_replace(' ', '+', $imgr);
     $imgb = str_replace(' ', '+', $imgb);
     //Nous décodons les données pour avoir le contenu du fichier image que nous souhaitions
     $fileDatar = base64_decode($imgr);
     $fileDatab = base64_decode($imgb);
     //On prépare le chemin du fichier final
     $fileNamer = File::build_path(array("css","cartes",$_POST['source'],$_POST['nomCarte'].'.rouge.jpg'));
     $fileNameb = File::build_path(array("css","cartes",$_POST['source'],$_POST['nomCarte'].'.bleu.jpg'));
     //On créée un fichier et on met toutes les données qu'on a décodé dedans au chemin précédant
     file_put_contents($fileNamer, $fileDatar);
     file_put_contents($fileNameb, $fileDatab);
     //Nous redirigeons l'utilisateur vers le formulaire de création de carte pour qu'il en conçoive, s'il le veut, une autre.
     header('Location: ./../../TripleTriad/index.php?action=createCard&controller=CreateurCarte');
     exit();
 ?>
