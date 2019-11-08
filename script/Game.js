//Class GAME

class Game {
  constructor(joueur1, joueur2, ids,etat,choixjoueur) {
    var j1 = new Joueur(joueur1);
    //var j2 = new Joueur(joueur2);
    var j2 = new Joueur(joueur2);
    this.listPlayer = [j1, j2];

    /*this.currentPlayer = getRandomIntInclusive(0, 1);*/
    this.currentPlayer =parseInt(choixjoueur);
    this.id = ids;
    this.ajoue = 0;
    this.type = etat;
    this.dureeGame = 0;
    if (this.currentPlayer == 1 && this.type=="multi") { // si c'est au rouge de jouer, on désactive le bleu
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

    }
    else if(this.currentPlayer == 1 ){

      document.getElementById('drag1').setAttribute('draggable', 'false');
      document.getElementById('drag2').setAttribute('draggable', 'false');
      document.getElementById('drag3').setAttribute('draggable', 'false');
      document.getElementById('drag4').setAttribute('draggable', 'false');
      document.getElementById('drag5').setAttribute('draggable', 'false');
      document.getElementById('drag6').setAttribute('draggable', 'true');
      document.getElementById('drag7').setAttribute('draggable', 'true');
      document.getElementById('drag8').setAttribute('draggable', 'true');
      document.getElementById('drag9').setAttribute('draggable', 'true');
      document.getElementById('drag10').setAttribute('draggable', 'true');
      document.getElementById('deux').classList.add('tonTour');
    }



    else
     { // sinon on désactive le rouge
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

  endGame() { // regarde si la partie est finie

    if (this.dureeGame == 9) {
      document.getElementById("fingame").removeAttribute("display");
      document.getElementById("fingame").setAttribute("style", "display:fixed;");
      document.getElementById('plateaujeu').style.display = 'none';
      var sound = document.getElementById("sound");
      sound.muted = true;
      var joueurUn = document.getElementById('joueur1').value;
      var joueurDeux = document.getElementById('joueur2').value;
      console.log(this.listPlayer[0].getName());
      if(document.getElementById("id")){
        supprimeGame(0);
      }
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

    xhr.open("GET", "php/historiqueAjax.php?func=addToHistorique&nomJ1="+document.getElementById('joueur1').value+"&nomJ2="+document.getElementById('joueur2').value+"&scoreJ1="+this.listPlayer[0].getScore()+"&scoreJ2="+this.listPlayer[1].getScore()+"&action=solo", true);
    xhr.send();
  }
  
  supprimeGame(etat) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
      }
    };

    xhr.open("GET", "api/supprimeGame.php?id="+idG, true);
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

    if (this.currentPlayer == 0 && this.type=='multi') {
      for (var i = 0; i <= 5; i++) {
        if (document.getElementById('drag' + i) !== null) {
          document.getElementById('drag' + i).setAttribute('draggable', 'false');
        }
      }
      this.currentPlayer = 1;
    } else if(this.currentPlayer == 0){
      for (var i = 0; i <= 5; i++) {
        if (document.getElementById('drag' + i) !== null) {
          document.getElementById('drag' + i).setAttribute('draggable', 'false');
        }
        if (document.getElementById('drag' + (i + 5)) !== null) {
          document.getElementById('drag' + (i + 5)).setAttribute('draggable', 'true');
        }
      }
      this.currentPlayer = 1;

    }
    else {
      for (var i = 0; i <= 5; i++) {
        if (document.getElementById('drag' + i) !== null) {
          document.getElementById('drag' + i).setAttribute('draggable', 'true');
        }
        if (document.getElementById('drag' + (i + 5))) {
          document.getElementById('drag' + (i + 5)).setAttribute('draggable', 'false');
        }
      }
      this.currentPlayer = 0;
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
