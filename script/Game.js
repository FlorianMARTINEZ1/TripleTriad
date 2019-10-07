//Class GAME

class Game {
  constructor(joueur1, joueur2, ids) {
    let j1 = new Joueur(joueur1);
    let j2 = new Joueur(joueur2);
    this.listPlayer = [j1, j2];
    this.currentPlayer= getRandomIntInclusive(0,1);
    this.id = ids;
    if(this.currentPlayer==1){
      document.getElementById('drag1').setAttribute('draggable','false');
      document.getElementById('drag2').setAttribute('draggable','false');
      document.getElementById('drag3').setAttribute('draggable','false');
      document.getElementById('drag4').setAttribute('draggable','false');
      document.getElementById('drag5').setAttribute('draggable','false');
    }else{
      document.getElementById('drag6').setAttribute('draggable','false');
      document.getElementById('drag7').setAttribute('draggable','false');
      document.getElementById('drag8').setAttribute('draggable','false');
      document.getElementById('drag9').setAttribute('draggable','false');
      document.getElementById('drag10').setAttribute('draggable','false');
    }

  }

  setTurn() {
      this.currentPlayer == 1 ? this.currentPlayer = 0 : this.currentPlayer = 1;
      for(var i=1;i<=10;i++){
        if(document.getElementById('drag'+i)!==null){
          if(document.getElementById('drag'+i).getAttribute('draggable')=='false'){
            document.getElementById('drag'+i).setAttribute('draggable','true');
          }else{
            document.getElementById('drag'+i).setAttribute('draggable','false');
          }
       }
      }
  }

}
