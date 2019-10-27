class IARandom extends IA {
  constructor(game) {
    super(game, "IA Random");
  }

  setCasesVides() {
    super.setCasesVides();
  }

  setNumDragCardOfDeckIA() {
    super.setNumDragCardOfDeckIA();
  }

  play() {
    this.setCasesVides(); //Regarde les cases vides et les récupere dans la variable casesVides
    this.setNumDragCardOfDeckIA(); // Regarde les case ou il ya une carte dans le deck de l'IA
    var idCase = getRandomIntInclusive(0, this.casesVides.length - 1); //aléatoire pour sélectionner une case
    var idDragCard = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte
    super.play(idDragCard, idCase);
  }



}