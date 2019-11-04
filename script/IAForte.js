class IAForte extends IA {
  constructor(game) {
    super(game, "IA Forte");


  }

  setCasesVides() {
    super.setCasesVides();
  }

  setNumDragCardOfDeckIA() {
    super.setNumDragCardOfDeckIA();
  }

  setCasesNonVidesAvecCarteBleue() {
    super.setCasesNonVidesAvecCarteBleue();
  }

  setCasesVisees() {
    super.setCasesVisees();
  }

  getNumberCardReturned(position, indexDragCard) {
    var casesAutour = super.getCasesAutour(position);
    var casesViseesBleue = [];
    for (var i = 0; i < casesAutour.length; i++) {
      for (var j = 0; j < this.casesNonVides.length; j++) {
        if (this.casesNonVides[j] === casesAutour[i]) {
          casesViseesBleue.push(casesAutour[i]);
        }
      }
    }

    var CardReturned = 0;
    var c = findCard(document.getElementById('drag' + indexDragCard).className);
    for (var i = 0; i < casesViseesBleue.length; i++) {
      if (position - casesViseesBleue[i] == 3) {
        if (c.donneValN() > findCard(document.getElementsByClassName('case' + casesViseesBleue[i])[0].firstChild.className).donneValS()) {
          CardReturned += 1;
        }
      } else if (position - casesViseesBleue[i] == -3) {
        if (c.donneValS() > findCard(document.getElementsByClassName('case' + casesViseesBleue[i])[0].firstChild.className).donneValN()) {
          CardReturned += 1;
        }
      } else if (position - casesViseesBleue[i] == 1) {
        if (c.donneValO() > findCard(document.getElementsByClassName('case' + casesViseesBleue[i])[0].firstChild.className).donneValE()) {
          CardReturned += 1;
        }
      } else if (position - casesViseesBleue[i] == -1) {
        if (c.donneValE() > findCard(document.getElementsByClassName('case' + casesViseesBleue[i])[0].firstChild.className).donneValO()) {
          CardReturned += 1;
        }
      }
    }
    return CardReturned;
  }

  getMeilleurPos(indexDragCard) {
    var cardReturned = -1;
    var position;
    for (var i = 0; i < this.casesVisees.length; i++) {
      console.log(indexDragCard);
      let x = this.getNumberCardReturned(this.casesVisees[i], indexDragCard);
      if (x > cardReturned) {
        cardReturned = x;
        position = this.casesVisees[i];
      }
    }
    console.log(cardReturned);
    if (cardReturned == 0 || cardReturned == -1) {
      return this.casesVides[getRandomIntInclusive(0, this.casesVides.length - 1)];
    }
    return position;
  }
  getMeilleurCarteRetourne(indexDragCard) {
    var cardReturned = -1;

    for (var i = 0; i < this.casesVisees.length; i++) {
      let x = this.getNumberCardReturned(this.casesVisees[i], indexDragCard);
      if (x > cardReturned) {
        cardReturned = x;
      }
    }
    return cardReturned;
  }

  getMeilleurCarte() {
    var idCard = 0;
    var bestNbr = -1;

    for (var i = 0; i < this.cards.length; i++) {
      let x = this.getMeilleurCarteRetourne(this.cards[i]);

      if (x > bestNbr) {
        bestNbr = x;
        idCard = this.cards[i];
      }
    }
    if (bestNbr == 0 || bestNbr == -1) {
      return this.cards[getRandomIntInclusive(0, this.cards.length - 1)];
    }
    return idCard;
  }

  ajouter(carte) {
      super.ajouter(carte);
  }




  play() {
    this.setCasesVides(); //Regarde les cases vides et les récupere dans la variable casesVides
    this.setNumDragCardOfDeckIA(); // Regarde les case ou il ya une carte dans le deck de l'IA
    this.setCasesNonVidesAvecCarteBleue();
    this.setCasesVisees();
    /*console.log(this.casesNonVides);
    console.log(this.casesVisees);*/
    var idCard = this.getMeilleurCarte();
    var idDragCard = this.cards.indexOf(idCard);
    var idCase = this.getMeilleurPos(idCard);
    var idCaseAPlacer = this.casesVides.indexOf(idCase);
    /*console.log(this.casesVisees);
    console.log(this.cards);
    console.log(this.casesVides);
    console.log(idCard);
    console.log(idCase);
    console.log(idDragCard);
    console.log(idCaseAPlacer);*/
    super.play(idDragCard, idCaseAPlacer);


  }
}
