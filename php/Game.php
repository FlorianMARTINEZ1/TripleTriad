
<?php
class Game {

  private $id;
  private $listOfJoueur;
  private $listOfCard;
  private $plateau;
  private $currentPlayer;


public function __construct($id = NULL, $listOfJoueurString = NULL) {
  if (!is_null($id) && !is_null($listOfJoueur)) {
    require_once("Carte.php");

    $this->id= $id;
    $this->currentPlayer=0;
    //Met toute les carte de la base de donnée dans la listOfCard
    $this->$listOfCard=Carte::getAllCarte();

    $this->$listOfJoueur = array(

       '0' => new Joueur($listOfJoueurString['0'],$this) ,
       '1' => new Joueur($listOfJoueurString['1'],$this) ,
     );


    }
  }
}
