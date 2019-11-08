//Class GAME

class Game {
  constructor(joueur1, joueur2, ids) {
    var j1 = new Joueur(joueur1);
    var j2;
    var joueurDeux = document.getElementById('joueur2').value; // cherche quel IA Joue
    if(joueurDeux == "IAForte"){
      j2 = new IAForte(this);
    }
    else if(joueurDeux == "IAMoyen"){
      j2 = new IAMoyen(this);
    }
    else if(joueurDeux == "IAFaible"){
      j2 = new IARandom(this);
    }
    this.listPlayer = [j1, j2];
    this.currentPlayer = document.getElementById("choix").innerHTML;
    this.id = ids;
    this.dureeGame = 0;
    
    if (this.currentPlayer == 1) { // si c'est au rouge de jouer, on désactive le bleu
      //carte rouge true
      document.getElementById('drag1').setAttribute('draggable', 'false');
      document.getElementById('drag2').setAttribute('draggable', 'false');
      document.getElementById('drag3').setAttribute('draggable', 'false');
      document.getElementById('drag4').setAttribute('draggable', 'false');
      document.getElementById('drag5').setAttribute('draggable', 'false');
      document.getElementById('drag6').setAttribute('draggable', 'false');
      document.getElementById('drag7').setAttribute('draggable', 'false');
      document.getElementById('drag8').setAttribute('draggable', 'false');
      document.getElementById('drag9').setAttribute('draggable', 'false');
      document.getElementById('drag10').setAttribute('draggable', 'false');
      document.getElementById('deux').classList.add('tonTour');

    } else { // sinon on désactive le rouge
      document.getElementById('drag1').setAttribute('draggable', 'true');
      document.getElementById('drag2').setAttribute('draggable', 'true');
      document.getElementById('drag3').setAttribute('draggable', 'true');
      document.getElementById('drag4').setAttribute('draggable', 'true');
      document.getElementById('drag5').setAttribute('draggable', 'true');
      document.getElementById('drag6').setAttribute('draggable', 'false');
      document.getElementById('drag7').setAttribute('draggable', 'false');
      document.getElementById('drag8').setAttribute('draggable', 'false');
      document.getElementById('drag9').setAttribute('draggable', 'false');
      document.getElementById('drag10').setAttribute('draggable', 'false');
      document.getElementById('un').classList.add('tonTour');
    }

  }



  getListPlayer() {
    return this.listPlayer;
  }

  playIA() {
    this.listPlayer[1].play();
  }

  endGame(){
    if (this.dureeGame == 9) {
      function end(){g2.endGamePrint()}
        setTimeout(end,3000);
    }
  }

  endGamePrint() { // regarde si la partie est finie

    if (this.dureeGame == 9) {

      document.getElementById("fingame").removeAttribute("display");
      document.getElementById("fingame").setAttribute("style", "display:fixed;");
      document.getElementById('plateaujeu').style.display = 'none';
      var sound = document.getElementById("sound");
      sound.muted = true;
      var joueurUn = document.getElementById('joueur1').value;
      var joueurDeux = document.getElementById('joueur2').value;
      console.log(this.listPlayer[0].getName());
      if (this.listPlayer[0].getScore() > this.listPlayer[1].getScore()) {
        if (this.listPlayer[0].getName() == "j1") {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurUn;
          this.addHistorique(1);
        } else {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurDeux;
          this.addHistorique(2);
        }

      } else if (this.listPlayer[0].getScore() < this.listPlayer[1].getScore()) {
        if (this.listPlayer[1].getName() == "j1") {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurUn;
          this.addHistorique(1);
        } else {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurDeux;
          this.addHistorique(2);
        }
      } else {
        document.getElementById("gagnant").innerHTML = "bravo aux 2 joueurs pour cette égalité ! ";
        this.addHistorique(0);
      }

    } else {

    }
  }

  addHistorique(etat) {
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
      }
    };
  
    xhr.open("GET", "php/historiqueAjax.php?func=addToHistorique&nomJ1="+document.getElementById('joueur1').value+"&nomJ2="+document.getElementById('joueur2').value+"&scoreJ1="+this.listPlayer[0].getScore()+"&scoreJ2="+this.listPlayer[1].getScore(), true);
    xhr.send();
  }
  

  setTurn() {
    //changement de couleur du joueur qui joue
    this.dureeGame++;
    if (this.currentPlayer == 0) {
      document.getElementById('un').classList.remove('tonTour');
      document.getElementById('deux').classList.add('tonTour');
    } else {
      document.getElementById('deux').classList.remove('tonTour');
      document.getElementById('un').classList.add('tonTour');
    }
    //  this.currentPlayer == 1 ? this.currentPlayer = 0 : this.currentPlayer = 1; // On alterne entre 0 et 1 le joueur courant
    //  for (var i = 1; i <= 10; i++) {
    //    if (document.getElementById('drag' + i) !== null) { // Pour toutes les cartes que le joueur à en main on inverse la valeur de draggable
    //      if (document.getElementById('drag' + i).getAttribute('draggable') == 'false') {
    //        console.log(i);
    //        document.getElementById('drag' + i).setAttribute('draggable', 'true');
    //      } else {
    //        document.getElementById('drag' + i).setAttribute('draggable', 'false');
    //        console.log(i);
    //      }
    //    }
    //}

    if (this.currentPlayer == 0) {
      for (var i = 0; i <= 5; i++) {
        if (document.getElementById('drag' + i) !== null) {
          document.getElementById('drag' + i).setAttribute('draggable', 'false');
        }
        /*if (document.getElementById('drag' + (i + 5)) !== null) {
          document.getElementById('drag' + (i + 5)).setAttribute('draggable', 'true');
        }*/
      }
      this.currentPlayer = 1;
    } else {
      for (var i = 0; i <= 5; i++) {
        if (document.getElementById('drag' + i) !== null) {
          document.getElementById('drag' + i).setAttribute('draggable', 'true');
        }
        /*if (document.getElementById('drag' + (i + 5))) {
          document.getElementById('drag' + (i + 5)).setAttribute('draggable', 'false');
        }*/
      }
      this.currentPlayer = 0;
    }

    if (this.currentPlayer == 1 && this.dureeGame < 9) { // Si le joueur est L'IA et que la partie n'est pas fini , l'IA joue
      setTimeout(function(){g2.playIA()},1500); // joué après 0.7 sec
    }
  }


  setTrue(drag) {
    if (drag !== null) {
      drag.setAttrivute('draggable', 'true');
    }
  }

  setFalse(drag) {
    if (drag !== null) {
      drag.setAttrivute('draggable', 'false');
    }
  }


}
