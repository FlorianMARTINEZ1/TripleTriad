class IARandom extends Joueur {
  constructor(game) {
    super("IA Random");
    this.game = game;
    this.index = 1;
    this.cards = [];
    this.casesVides = [];
    this.tailleTab =9 ;
    this.tailleCar =5;
    var i;
    for (i = 1; i < 6; i++) {
      this.cards.push(this.index * 5 + i);
    }
    this.casesVides = [];
  }

  setCasesVides() {
  /*  this.casesVides = [];*/
    this.tailleTab=0;
    var i;var j =1;
    let N;
    for (i = 1; i <= 9; i++) {
      N = document.getElementsByClassName('case' + i)[0];
      if (N.childElementCount >0) {
      }
      else{
        this.casesVides[j] = i;
        j++;
        this.tailleTab++;
      }
    }

  }

  setCasesVidesCard() {
  /*  this.casesVides = [];*/
    this.tailleCar=0;
    var i;var j =1;
    let N;let P;
    for (i = 1; i < 4; i++) {
    /*  N = document.getElementById('drag' + this.cards[i]);*/
    N = document.querySelector(".droite .case:nth-child("+i+")");

      if (N.childElementCount >0) {
        this.cards[j] = this.index * 5 + i;
        j++;
        this.tailleCar++;

      }
      else{

      }
    }
    for (i = 1; i < 3; i++) {
    /*  N = document.getElementById('drag' + this.cards[i]);*/
    N = document.querySelector(".droite div.last.cards1 .case:nth-child("+i+")");

      if (N.childElementCount >0) {
        this.cards[j] = this.index * 5 + i+3;
        j++;
        this.tailleCar++;

      }
      else{

      }
    }

  }
  play() {
    this.setCasesVides(); //Regarder les cases vides et les récuperer dans la variable casesVides
    this.setCasesVidesCard();
    var x = getRandomIntInclusive(1, this.tailleTab ); //aléatoire pour sélectionner une case
    var y = getRandomIntInclusive(1, this.tailleCar ); //aléatoire pour sélectionner une carte
    // récupère la carte.
    //récupère la case
    //var lienImage = card.getAttribute(src); //on choppe le lien de l'image.
    var img = document.getElementsByClassName('case' + this.casesVides[x])[0].appendChild(document.getElementById('drag' + this.cards[y]));
    var newimg = document.getElementById('drag'+ this.cards[y])
    newimg.removeAttribute('ondrop');
    newimg.removeAttribute('ondragover');
    newimg.setAttribute('pointer-events', 'none');
    newimg.setAttribute('draggable', 'false');
    newimg.removeAttribute('ondragstart');
    newimg.removeAttribute('id');
    var casee = document.getElementsByClassName('case' + this.casesVides[x])[0];
    casee.removeAttribute('ondrop');casee.removeAttribute('ondragover');
  /*  confrontation(document.getElementById('drag' + this.cards[y]), document.getElementsByClassName('case' + this.casesVides[x]));*/
    confrontation(newimg.className, 'case' + this.casesVides[x]);
    this.cards.splice[y];
    g2.setTurn();
    g2.endGame();
  }





}
