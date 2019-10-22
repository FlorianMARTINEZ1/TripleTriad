class IARandom extends Joueur {
  constructor(game) {
    super("IA Random");
    this.game = game;
    this.index = 1;
    this.cards = [];
    var i;
    for (i = 1; i < 6; i++) {
      this.cards.push(index*5+i);
    }
    this.casesVides = [];
  }

  setCasesVides() {
    this.casesVides = [];
    var i;
    for (i = 1; i < 11; i++) {
      let N = document.getElementsByClassName('case' + i).firstElementChild;
      if (N === null) {
        this.casesVides.push(i)
      }
    }

  }
  play() {
    this.setCasesVides(); //Regarder les cases vides et les récuperer dans la variable casesVides
    var x = getRandomIntInclusive(0, this.casesVides.length - 1); //aléatoire pour sélectionner une case
    var y = getRandomIntInclusive(0, this.cards.length - 1); //aléatoire pour sélectionner une carte
    // récupère la carte.
    //récupère la case
    //var lienImage = card.getAttribute(src); //on choppe le lien de l'image.
    document.getElementsByClassName('case'+casesVides[x])[0].appendChild(document.getElementById('drag3'));
    document.getElementById('drag3').removeAttribute('ondrop');
    document.getElementById('drag3').removeAttribute('ondragover');
    confrontation(document.getElementById('drag3'), cardPlayed);
    this.cards.remove(cardPlayed);
    g2.setTurn();
    g2.endGame();
  }





}
