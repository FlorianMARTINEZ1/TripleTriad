class IARandom extends Joueur {
  constructor(game) {
    super("IA Random");
    this.game = game;
    this.index = 1;
    this.cards = []; // tableau des cartes cas l'IA : contient le num du drag
    this.casesVides = []; // tableau des cases vides du plateau : contiene le num de la case
    this.tailleTab =9 ; // taille du plateau
    this.tailleCar =5; // taille du deck de l'IA
    var i;
    for (i = 1; i < 6; i++) {
      this.cards.push(this.index * 5 + i);
    }
    this.casesVides = [];
  }

  setCasesVides() {
    this.tailleTab=0; // met la taille à 0
    var i;var j =1;
    let N;
    for (i = 1; i <= 9; i++) { // pour toutes les cases du plateau
      N = document.getElementsByClassName('case' + i)[0]; // on récupère la case
      if (N.childElementCount >0) { // s'il a un enfant ( donc une carte dans une case) on fait rien
      }
      else{ // sinon on le met dans le tableau des case vide
        this.casesVides[j] = i; // on met l'index de la case
        j++;//on augmente les index du tableau
        this.tailleTab++;// on augmente la taille du tableau
      }
    }

  }

  setCasesPleineCard() {
    this.tailleCar=0; // met la taille à 0
    var i;var j =1;
    let N;
    for (i = 1; i < 4; i++) { // pour la première ranger de carte ( les 3 en haut)
    N = document.querySelector(".droite .case:nth-child("+i+")"); // on prend les case de nos cartes une après l'autre

      if (N.childElementCount >0) { // si elle a un enfant , (donc une carte pas encore joué) on la met dans le tableau
        this.cards[j] = this.index * 5 + i; // on met le drag de la carte dans le tableau (de 6 à 8)
        j++; // on augmente l'index du tableau
        this.tailleCar++; // on augmente la taille du tableau
      }
    }
    for (i = 1; i < 3; i++) {// pour la deuxème ranger de carte ( les 2 en bas)
    N = document.querySelector(".droite div.last.cards1 .case:nth-child("+i+")");// on prend les case de nos cartes une après l'autre

      if (N.childElementCount >0) { // pareil que pour les 3 première cases
        this.cards[j] = this.index * 5 + i+3;
        j++;
        this.tailleCar++;
      }
    }

  }
  play() {
    this.setCasesVides(); //Regarde les cases vides et les récupere dans la variable casesVides
    this.setCasesPleineCard(); // Regarde les case ou il ya une carte dans le deck de l'IA
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
    confrontation(newimg.className, 'case' + this.casesVides[x]);
    this.cards.splice[y];
    g2.setTurn();
    g2.endGame();
  }





}
