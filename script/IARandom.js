class IARandom extends Joueur {
  constructor(game) {
    super("IA Random");
    this.game = game;
    this.index = game.getIndexPlayer(this);
    this.cards = [];
    cards.push(allCards[index * 5]);
    cards.push(allCards[index * 5 + 1]);
    cards.push(allCards[index * 5 + 2]);
    cards.push(allCards[index * 5 + 3]);
    cards.push(allCards[index * 5 + 4]);
    this.casesVides = [];
  }

  setCasesVides() {
    casesVides = [];
    var i;
    for (i = 0; i < 9; i++) {
      let N = document.getElementsByClassName('case' + i)[0].firstElementChild;
      if (N === null) {
        casesVides.push(i)
      }
    }

  }
  play() {
    setCasesVides(); //Regarder les cases vides et les récuperer dans la variable casesVides
    var x = getRandomIntInclusive(0, casesVides.length - 1); //aléatoire pour sélectionner une case
    var y = getRandomIntInclusive(0, cards.length - 1); //aléatoire pour sélectionner une carte
    var card = document.getElementById('drag' + cards[y].donneID()); // récupère la carte.
    var droptarget = casesVides[x]; //récupère la case
    var lienImage = card.getAttribute(src); //on choppe le lien de l'image.
    droptarget.appendChild(lienImage);
    droptarget.removeAttribute('ondrop');
    droptarget.removeAttribute('ondragover');
    confrontation(img.className, cardPlayed);
    cards.remove(cardPlayed);
    g2.setTurn();
    g2.endGame();
  }





}