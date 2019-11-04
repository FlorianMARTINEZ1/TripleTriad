class IAMoyen extends IA {
  constructor(game) {
    super(game, "IA Moyen");


  }

  setCasesVides() {
    super.setCasesVides();
  }

  setNumDragCardOfDeckIA() {
    super.setNumDragCardOfDeckIA();
  }

  setCasesNonVidesAvecCarteBleu() {
    super.setCasesNonVidesAvecCarteBleue();
  }

  setCasesVisees() {
    super.setCasesVisees();
  }

  ajouter(carte) {
      super.ajouter(carte);
  }

  play() {
    this.setCasesVides(); //Regarde les cases vides et les récupere dans la variable casesVides
    this.setNumDragCardOfDeckIA(); // Regarde les case ou il ya une carte dans le deck de l'IA
    this.setCasesNonVidesAvecCarteBleu();
    this.setCasesVisees();
    if (this.casesVisees.length != 0) {
      var idCase = this.casesVides.indexOf(this.casesVisees[getRandomIntInclusive(0, this.casesVisees.length - 1)]); //aléatoire pour sélectionner une case
      var idDragCard = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte
    } else {
      var idCase = getRandomIntInclusive(0, this.casesVides.length - 1); //aléatoire pour sélectionner une case
      var idDragCard = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte
    }
    super.play(idDragCard, idCase);


  }
}
