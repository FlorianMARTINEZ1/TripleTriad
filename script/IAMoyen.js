class IAMoyen extends IA {
  constructor(game) {
    super(game, "IA Moyen");
    this.casesNonVides = [];
  }

  setCasesVides() {
    super.setCasesVides();
  }

  setNumDragCardOfDeckIA() {
    super.setNumDragCardOfDeckIA();
  }

  setCasesNonVidesAvecCarteBleu() {
    this.casesNonVides = [];
    for (var i = 1; i <= 9; i++) {
      var c = document.getElementsByClassName('case' + i)[0].firstChild;
      if (c != null && findCard(c.className).donneCouleur() === "bleue") {
        this.casesNonVides.push(i);
      }
    }
  }

  play() {
    this.setCasesVides(); //Regarde les cases vides et les récupere dans la variable casesVides
    this.setNumDragCardOfDeckIA(); // Regarde les case ou il ya une carte dans le deck de l'IA
    this.setCasesNonVidesAvecCarteBleu();
    console.log(this.casesNonVides);
    var casesVisees = [];

    if (this.casesNonVides.length != 0) {
      for (var i = 0; i < this.casesNonVides.length; i++) {
        if (i == 8 || i == 5 || i == 3) {
          var w = this.casesNonVides[i] + 3;
          var x = this.casesNonVides[i] - 3;
          var y = this.casesNonVides[i] + 1;
          var z = this.casesNonVides[i] - 1;

        } else if (i == 7 || i == 4 || i == 1) {
          var w = this.casesNonVides[i] + 3;
          var x = this.casesNonVides[i] - 3;
          var y = this.casesNonVides[i] + 1;
          var z = 0;
        } else {
          var w = this.casesNonVides[i] + 3;
          var x = this.casesNonVides[i] - 3;
          var y = 10
          var z = this.casesNonVides[i] - 1;
        }


        if (w < 10 && this.casesVides.indexOf(w) != -1) {
          casesVisees.push(w);
        }

        if (x > 0 && this.casesVides.indexOf(x) != -1) {
          casesVisees.push(x);
        }

        if (y < 10 && this.casesVides.indexOf(y) != -1) {
          casesVisees.push(y);
        }

        if (z > 0 && this.casesVides.indexOf(z) != -1) {
          casesVisees.push(z);
        }
      }
      if (casesVisees.length != 0) {
        var idCase = getRandomIntInclusive(0, casesVisees.length - 1); //aléatoire pour sélectionner une case
        var idDragCard = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte
      } else {
        var idCase = getRandomIntInclusive(0, this.casesVides.length - 1); //aléatoire pour sélectionner une case
        var idDragCard = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte
      }

    } else {
      var idCase = getRandomIntInclusive(0, this.casesVides.length - 1); //aléatoire pour sélectionner une case
      var idDragCard = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte

    }
    super.play(idDragCard, idCase);


  }


}