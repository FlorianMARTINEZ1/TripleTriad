<?php
require_once 'lib/File.php';
require_once File::build_path(array('model','ModelHistorique.php')); // chargement du modèle


class ControllerSite {
  protected static $object = 'site';
  // s'occupe de générer les pages extérieux aux joueur et aux parties

    public static function accueil() {
      require_once File::build_path(array('model','ModelCategorieDeck.php'));
      $controller='site';
      $view='Accueil';
      $pagetitle='Accueil';
      $tab_deck = ModelCategorieDeck::selectAll();
      $taille = 12/count($tab_deck);
      if($taille<3){
        $taille = 3;
      }
      require File::build_path(array('view','view.php')); //"redirige" vers la vue
    }

    public static function demandeContact(){

      if(!is_null(myGet("pseudo")) && !is_null(myGet("email")) && !is_null(myGet("subject")) && !is_null(myGet("detail-msg"))){

        $login = myGet("pseudo");
        $mail = myGet("email");
        $sujet = myGet("subject");
        $text = myGet("detail-msg");

        $mailEcrit='
               <html>
                 <body>
                   <div align="center">
                     <u>login de l\'expéditeur :</u>'.htmlspecialchars($login).'<br />
                     <br />
                     '.htmlspecialchars($text).'
                     <br />
                   </div>
                 </body>
               </html>
               ';

        mail("TripleTriadContact@yopmail.com", $sujet, $mailEcrit); // envoie au contact de l'application (un admin)
        mail($mail, $sujet, $mailEcrit); // envoie une copie au joueur
        $message = "message envoyé ! Nous faisons tout notre possible pour vous répondre le plus rapidement possible !";

      }
      else{
        $message = "Il y a eu une erreur dans l'envoie de votre message !";
      }

      $controller='site';
      $view='Contact';
      $pagetitle='Contact';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue
    }

    public static function regle(){
      $controller='site';
      $view='Regle';
      $pagetitle='Règle';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue

    }

    public static function contact(){
      $controller='site';
      $view='Contact';
      $pagetitle='Contact';
      require File::build_path(array('view','view.php')); //"redirige" vers la vue

    }

    public static function classement(){
      $controller='site';
      $view='classement';
      $pagetitle='Classement';
      if(isset($_GET['IA'])&&$_GET['IA']==0)
      {
        $IA = false;
      }
      else
      {
        $IA = true;
      }
      if(isset($_GET['win'])&&$_GET['win']==1)
      {
        $win = true;
      }
      else
      {
        $win = false;
      }
      $tabClassement = ModelHistorique::classement($IA, $win);
      require File::build_path(array('view','view.php'));
  }

    public static function error(){
        $controller='site';
        $view='error';
        $pagetitle='error';
        require File::build_path(array('view','view.php'));
    }


}
?>
