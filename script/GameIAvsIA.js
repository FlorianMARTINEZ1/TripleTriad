//Class GAME

class Game {
  constructor(joueur1, joueur2, ids) {
    var j2;
    var j1 = new IAForte(this);
    var joueurDeux = document.getElementById('joueur2').value; // cherche quel IA Joue
    if (joueurDeux == "IA Forte") {
      j2 = new IAForte(this);
    } else if (joueurDeux == "IA Moyen") {
      j2 = new IAMoyen(this);
    } else if (joueurDeux == "IA Faible") {
      j2 = new IARandom(this);
    }
    this.listPlayer = [j1, j2];
    this.currentPlayer = document.getElementById("choix").innerHTML;
    j2.setIndex();
    j1.setIndex();
    this.id = ids;
    this.dureeGame = 0;

    this.idDeck1 = 0;
    this.idDeck2 = 0;

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

  playIA1() {
    this.listPlayer[1].play();
  }
  playIA0() {
    this.listPlayer[0].play();
  }

  endGame() {
    if (this.dureeGame == 9) {
      this.idDeck1 = 0;
      this.getDeck(0, this.readDeck);
      this.idDeck2 = 0;
      this.getDeck(5, this.readDeck);

      function end() {
        g2.endGamePrint()
      }
      setTimeout(end, 3000);
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
      if (this.listPlayer[0].getScore() > this.listPlayer[1].getScore()) {
        if (this.listPlayer[0].getName() == joueurUn) {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurUn;
          this.addHistorique();
        } else {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurDeux;
          this.addHistorique();
        }

      } else if (this.listPlayer[0].getScore() < this.listPlayer[1].getScore()) {
        if (this.listPlayer[1].getName() == joueurUn) {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " + joueurUn;
          this.addHistorique();
        } else {
          document.getElementById("gagnant").innerHTML = "bravo au joueur " +joueurDeux;
          this.addHistorique();
        }
      } else {
        document.getElementById("gagnant").innerHTML = "bravo aux 2 joueurs pour cette égalité ! ";
        this.addHistorique();
      }

    } else {

    }
  }
  getDeck(increment, callback) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        var id = callback(xhr.responseText);
        if (increment === 0) {
          g2.idDeck1 = id;
          console.log(g2.idDeck1);
        } else {
          g2.idDeck2 = id;
          console.log(g2.idDeck2);
        }

      }
    };

    let tabID = [];
    for (let i = 0; i <= 4; i++) {
      tabID.push(allCards[i + increment].donneID());

    }
    tabID.sort(function(a, b) {
      return a - b
    });
    console.log(tabID);

    xhr.open("GET", "php/historiqueAjax.php?func=getDeck&idC1=" + tabID[0] + "&idC2=" + tabID[1] + "&idC3=" + tabID[2] + "&idC4=" + tabID[3] + "&idC5=" + tabID[4], true);
    xhr.send();
  }

  readDeck(sData) {
    return sData;
  }


  addHistorique() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {}
    };

    xhr.open("GET", "php/historiqueAjax.php?func=addToHistorique&nomJ1=" + document.getElementById('joueur1').value + "&nomJ2=" + document.getElementById('joueur2').value + "&scoreJ1=" + this.listPlayer[0].getScore() + "&scoreJ2=" + this.listPlayer[1].getScore() + "&deckJ1=" + this.idDeck1 + "&deckJ2=" + this.idDeck2, true);
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
    if (this.currentPlayer == 0 && this.dureeGame < 9) { // Si le joueur est L'IA et que la partie n'est pas fini , l'IA joue
      setTimeout(function() {
        g2.playIA0()
      }, 1500); // joué après 0.7 sec
    }
    if (this.currentPlayer == 1 && this.dureeGame < 9) { // Si le joueur est L'IA et que la partie n'est pas fini , l'IA joue
      setTimeout(function() {
        g2.playIA1()
      }, 1500); // joué après 0.7 sec
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
  getCurrentPlayer() {
    return this.currentPlayer;
  }

  testVal(casePlateau,c) {
      let C = document.getElementsByClassName('case' + casePlateau)[0].firstElementChild; /**On récupère l'image qui contient en classe le nom de la carte */
      if (C !== null) { // Si la case n'est pas vide
        let carte = findCard(C.className); // Objet carte, carte posé
        if (this.currentPlayer == 0) { // joueur bleu
          if (this.listPlayer[1].possede(carte)) { // Si l'ennemi possède la carte
            if (carte.donneValS() < c.donneValN()) { // Si notre carte gagne, on rentre dans la condition
              C.style.width = "0px";
              C.style.marginLeft = "50px";
              let coul = carte.donneCouleurInv();
              setTimeout(function() {
                carte.retourne(C, coul);
              }, 300);
              this.listPlayer[0].ajouter(this.listPlayer[1].retrieveCard(carte)); // On déplace la carte de liste (on donne donc la carte à l'autre joueur)
              carte.setCouleurInv();
            }
          }
        }
        else { // joueur rouge
          if (this.listPlayer[0].possede(carte)) {
            if (carte.donneValS() < c.donneValN()) {
              C.style.width = "0px";
              C.style.marginLeft = "50px";
              let coul = carte.donneCouleurInv();
              setTimeout(function() {
                carte.retourne(C, coul);
              }, 300);
              this.listPlayer[1].ajouter(this.listPlayer[0].retrieveCard(carte));
              carte.setCouleurInv();
            }
          }
        }
      }
  }

  confrontation(carteJoue, caseJoue) {
    var c = findCard(carteJoue); /** c : la carte ayant été jouée */
    this.listPlayer["" + this.currentPlayer].ajouter(c);
    var caseN = Number(caseJoue[4]) - 3; /** On récupère le numéro des cases */
    var caseE = Number(caseJoue[4]) + 1;
    var caseS = Number(caseJoue[4]) + 3;
    var caseO = Number(caseJoue[4]) - 1;
    this.listPlayer[this.currentPlayer].score--;
    if (caseN >= 1 && (caseN <= 6)) { // Nord(VPN) Condition permettant de savoir si la carte courante peut avoir une carte au nord
      this.testVal(caseN,c);
    }
    if ((caseS >= 4) && (caseS <= 9)) { // Sud
      this.testVal(caseS,c);
    }
    if ((caseE - 1) % 3 !== 0) { // Est
      this.testVal(caseE,c);
    }
    if (caseO % 3 !== 0) { // Ouest
      this.testVal(caseO,c);
    }
    console.log(this.listPlayer[0].score);
    console.log(this.listPlayer[1].score);
    document.getElementById('score-un').innerHTML = this.listPlayer[0].score;
    document.getElementById('score-deux').innerHTML = this.listPlayer[1].score;
  }


}
