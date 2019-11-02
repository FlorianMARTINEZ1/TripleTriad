
<?php
require_once '../lib/File.php';
class Game {


  private $id;
  private $listOfJoueur;
  private $listOfCard;
  private $listOfCardInGame;
  private $listOfCardInBoard;
  private $plateau;
  private $currentPlayer;




public function setCardInBoard($nomCarte,$case){
    $this->plateau["$case"]=$nomCarte;
}

public function __construct($id = NULL, $listOfJoueurString = NULL) {
  if (!is_null($id) && !is_null($listOfJoueurString)) {
    require_once("Carte.php");
    require_once("Joueur.php");

    $this->id= $id;
    $this->currentPlayer=0;
    //Met toute les carte de la base de donnée dans la listOfCard
    $this->listOfCard=Carte::getAllCarte();

    if(shuffle($this->listOfCard)){
      $this->listOfCardInGame = array(
        '0' => $this->listOfCard['0'],
        '1' => $this->listOfCard['1'],
        '2' => $this->listOfCard['2'],
        '3' => $this->listOfCard['3'],
        '4' => $this->listOfCard['4'],
        '5' => $this->listOfCard['5'],
        '6' => $this->listOfCard['6'],
        '7' => $this->listOfCard['7'],
        '8' => $this->listOfCard['8'],
        '9' => $this->listOfCard['9'],
      );

    }


    $listOfCardJ1= array(
      '0' => $this->listOfCardInGame['0'],
      '1' => $this->listOfCardInGame['1'],
      '2' => $this->listOfCardInGame['2'],
      '3' => $this->listOfCardInGame['3'],
      '4' => $this->listOfCardInGame['4'],
    );

    $listOfCardJ2 = array(
      '0' => $this->listOfCardInGame['5'],
      '1' => $this->listOfCardInGame['6'],
      '2' => $this->listOfCardInGame['7'],
      '3' => $this->listOfCardInGame['8'],
      '4' => $this->listOfCardInGame['9'],

    );

    $this->plateau = array(
      '0' => 0 ,
      '1' => 0 ,
      '2' => 0 ,
      '3' => 0 ,
      '4' => 0 ,
      '5' => 0 ,
      '6' => 0 ,
      '7' => 0 ,
      '8' => 0 ,


    );



    $this->listOfJoueur = array(

       '0' => new Joueur($listOfJoueurString['0'],$this,$listOfCardJ1) ,
       '1' => new Joueur($listOfJoueurString['1'],$this,$listOfCardJ2) ,
     );


    }
  }


  public function getJoueur($index){
    return $this->$listOfJoueur["$index"];
  }

  public function isFinished(){

    for ($i=0; $i <9 ; $i++) {
      if(empty($this->plateau[$i])){
        return false;
      }
    }
    return true;


  }

  public function run(){
    require_once("Carte.php");
      if(!$this->isFinished()){
          $this->listOfJoueur[$this->currentPlayer]->playTurn();
          for ($i=0; $i <9 ; $i++) {
            if($this->plateau[$i] instanceof Carte){
              echo "la case $i à pour carte ";$this->plateau[$i]->afficher2();
           }
          }
          if($this->currentPlayer==0){
            $this->currentPlayer=1;
          }
          else{
            $this->currentPlayer=0;
          }

          $this->plateau;

      }
      echo "GG";

  }




}
