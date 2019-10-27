class IA extends Joueur {
  constructor(game, name) {
    super(name);
    this.game = game;
    this.index = 1;
    this.cards = []; // tableau des cartes cas l'IA : contient le num du drag
    this.casesVides = []; // tableau des cases vides du plateau : contiene le num de la case
    var i;
    for (i = 1; i < 6; i++) {
      this.cards.push(this.index * 5 + i);
    }
    this.casesVides = [];
    this.casesNonVides = [];
    this.casesVisees = [];
  }

  setCasesVides() {
    var i;
    this.casesVides = []
    let N;
    for (i = 1; i <= 9; i++) { // pour toutes les cases du plateau
      N = document.getElementsByClassName('case' + i)[0]; // on récupère la case
      if (!N.childElementCount > 0) // sinon on le met dans le tableau des case vide
        this.casesVides.push(i); // on met l'index de la case
    }
  }



  setNumDragCardOfDeckIA() {
    this.cards = [];
    var i;
    let N;
    for (i = 1; i < 4; i++) { // pour la première ranger de carte ( les 3 en haut)
      N = document.querySelector(".droite .case:nth-child(" + i + ")"); // on prend les case de nos cartes une après l'autre
      if (N.childElementCount > 0) { // si elle a un enfant , (donc une carte pas encore joué) on la met dans le tableau
        this.cards.push(this.index * 5 + i); // on met le drag de la carte dans le tableau (de 6 à 8)
      }
    }
    for (i = 1; i < 3; i++) { // pour la deuxème ranger de carte ( les 2 en bas)
      N = document.querySelector(".droite div.last.cards1 .case:nth-child(" + i + ")"); // on prend les case de nos cartes une après l'autre
      if (N.childElementCount > 0) { // pareil que pour les 3 première cases
        this.cards.push(this.index * 5 + i + 3);
      }
    }

  }

  setCasesNonVidesAvecCarteBleue() {
    this.casesNonVides = [];
    for (var i = 1; i <= 9; i++) {
      var c = document.getElementsByClassName('case' + i)[0].firstChild;
      if (c != null && findCard(c.className).donneCouleur() === "bleue") {
        this.casesNonVides.push(i);
      }
    }
  }



  getCasesAutour(position) {
    var casesAutour = [];
    if (position === 8 || position === 5 || position === 2) {
      var w = position + 3;
      var x = position - 3;
      var y = position + 1;
      var z = position - 1;

    } else if (position === 7 || position === 4 || position === 1) {
      var w = position + 3;
      var x = position - 3;
      var y = position + 1;
      var z = 0;
    } else {
      var w = position + 3;
      var x = position - 3;
      var y = 10
      var z = position - 1;
    }


    if (w < 10) {
      casesAutour.push(w);
    }

    if (x > 0) {
      casesAutour.push(x);
    }

    if (y < 10) {
      casesAutour.push(y);
    }

    if (z > 0) {
      casesAutour.push(z);
    }
    return casesAutour;
  }

  setCasesVisees() {
    this.casesVisees = [];
    console.log(this.casesNonVides);
    if (this.casesNonVides.length != 0) {
      for (var i = 0; i < this.casesNonVides.length; i++) {
        let casesAutour = this.getCasesAutour(this.casesNonVides[i]);
        console.log(this.casesNonVides[i]);
        console.log(casesAutour);
        for (var j = 0; j < casesAutour.length; j++) {
          if (this.casesVides.indexOf(casesAutour[j]) != -1) {
            this.casesVisees.push(casesAutour[j]);
          }

        }
      }
    }
  }

  play(idDragCard, idCase) {
    var newimg = document.getElementById('drag' + this.cards[idDragCard]);
    var img = document.getElementsByClassName('case' + this.casesVides[idCase])[0].appendChild(newimg);
    this.carteJoue.push(newimg);
    newimg.removeAttribute('ondrop');
    newimg.removeAttribute('ondragover');
    newimg.setAttribute('pointer-events', 'none');
    newimg.setAttribute('draggable', 'false');
    newimg.removeAttribute('ondragstart');
    newimg.removeAttribute('id');
    var casee = document.getElementsByClassName('case' + this.casesVides[idCase])[0];
    casee.removeAttribute('ondrop');
    casee.removeAttribute('ondragover');
    confrontation(newimg.className, 'case' + this.casesVides[idCase]);
    g2.setTurn();
    g2.endGame();
  }

}