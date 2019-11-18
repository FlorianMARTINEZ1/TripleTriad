// Game minimaliste pour IA Experte
class GameMinim {
  constructor(deck1, deck2, terrainP, dureeP, currentPlay, idCard, idCase, colorg) {
    this.deckJ1 = deck1;
    this.deckJ2 = deck2;
    this.terrainLibre = terrainP;
    this.duree = dureeP;
    this.currentP = currentPlay;
    this.idCarteJoue = idCard;
    this.idCaseJoue = idCase;
    this.colorGrid = colorg;
    this.childs = [];
    if (this.duree > 1) {
      this.generateChilds();
    }
  }
  getIdCaseJoue() {
    return this.idCaseJoue;
  }

  getIdCarteJoue() {
    return this.idCarteJoue;
  }
  genListWithout(index, list) {
    return list.slice(0, index).concat(list.slice(index + 1));

  }

  generateChilds() {
    console.log('Please work');
    for (var i = 0; i < this.terrainLibre.length; i++) {

      var x = this.terrainLibre[i];
      var newTerrain = this.genListWithout(i, this.terrainLibre);
      if (this.currentP == 0) {
        for (var j = 0; j < this.deckJ1.length; j++) {
          this.childs.push(new GameMinim(this.genListWithout(j, this.deckJ1), this.deckJ2, newTerrain, this.duree - 1, 1, x, this.deckJ1[j], this.colorGrid.slice()));
          //On met dans Childs une new GameMinim constitué de :
          /*
          deckJ1 - la carte jouée
          deckJ2
          terrainLibre - case jouée
          duree -1
          l'autre joueur qui doit jouer
          la carte jouée
          la case jouée
          la grille de couleur actuelle
          */
        }
      } else {
        for (var j = 0; j < this.deckJ2.length; j++) {
          this.childs.push(new GameMinim(this.deckJ1, this.genListWithout(j, this.deckJ2), newTerrain, this.duree - 1, 0, x, this.deckJ2[j], this.colorGrid.slice()));
          //On met dans Childs une new GameMinim constitué de :
          /*
          deckJ1
          deckJ2 - la carte jouée
          terrainLibre - case jouée
          duree -1
          l'autre joueur qui doit jouer
          la carte jouée
          la case jouée
          */
        }
      }
    }
  }

  updateColorGrid() {
    if (this.idCarteJoue != -1) {
      console.log("Je fonctionne ?" + this.idCarteJoue);
      this.colorGrid[this.idCaseJoue - 1] = (this.currentP == 1 ? 0 : 1) + 1;
      if (this.idCaseJoue === 8 || this.idCaseJoue === 5 || this.idCaseJoue === 2) {
        var w = this.idCaseJoue + 3;
        var x = this.idCaseJoue - 3;
        var y = this.idCaseJoue + 1;
        var z = this.idCaseJoue - 1;

      } else if (this.idCaseJoue === 7 || this.idCaseJoue === 4 || this.idCaseJoue === 1) {
        var w = this.idCaseJoue + 3;
        var x = this.idCaseJoue - 3;
        var y = this.idCaseJoue + 1;
        var z = 0;
      } else {
        var w = this.idCaseJoue + 3;
        var x = this.idCaseJoue - 3;
        var y = 10
        var z = this.idCaseJoue - 1;
      }
      var cj = findCard(document.getElementsByClassName('case' + this.idCaseJoue)[0]);
      if (!(w > 10 || w < 1) && findCard(document.getElementsByClassName('case' + w)[0]) && findCard(document.getElementsByClassName('case' + w)[0]).donneValN() < cj.donneValS()) {
        this.colorGrid[w - 1] = (this.currentP == 1 ? 0 : 1) + 1;
      }
      if (!(x > 10 || x < 1) && findCard(document.getElementsByClassName('case' + x)[0]) && findCard(document.getElementsByClassName('case' + x)[0]).donneValS() < cj.donneValN()) {
        this.colorGrid[x - 1] = (this.currentP == 1 ? 0 : 1) + 1;
      }
      if (!(y > 10 || y < 1) && findCard(document.getElementsByClassName('case' + y)[0]) && findCard(document.getElementsByClassName('case' + y)[0]).donneValO() < cj.donneValE()) {
        this.colorGrid[y - 1] = (this.currentP == 1 ? 0 : 1) + 1;
      }
      if (!(z > 10 || z < 1) && findCard(document.getElementsByClassName('case' + z)[0]) && findCard(document.getElementsByClassName('case' + z)[0]).donneValE() < cj.donneValO()) {
        this.colorGrid[z - 1] = (this.currentP == 1 ? 0 : 1) + 1;
      }
    }
  }

  calcScore(indexPlayer) {
    this.updateColorGrid();
    var score = 0;
    for (var i = 0; i < this.colorGrid.length; i++) {
      if (this.colorGrid[i] == indexPlayer - 1) {
        score++;
      }
    }
    return score;
  }

  haveChild() {
    return this.childs.length > 0;
  }

  calcMoyChild(indexPlayer) {
    this.updateColorGrid();
    if (!this.haveChild()) {
      return this.calcScore(indexPlayer);
    }
    var sum = 0;
    for (var i = 0; i < this.childs.length; i++) {
      sum += this.childs[i].calcMoyChild(indexPlayer);
    }
    return sum / this.childs.length;
  }

  bestChild(indexPlayer) {
    var besti = 0;
    var bestMoy = 0;
    for (var i = 0; i < this.childs.length; i++) {
      let moy = this.childs[i].calcMoyChild(indexPlayer);
      if (moy > bestMoy) {
        bestMoy = moy;
        besti = i;
      }
    }
    return this.childs[besti];
  }

  miseAJour() {
    if (this.idCarteJoue == -1) {
      return this;
    }
    var tabCartepuisCase = [];
    var carteJoue;
    for (var i = 1; i <= 5; i++) {
      if (document.getElementById('drag' + i)) {
        tabCartepuisCase.push(i);
      }
    }
    if (tabCartepuisCase.length < this.deckJ1.length) {
      for (var i = 0; i < this.deckJ1.length; i++) {
        if (tabCartepuisCase.indexOf(this.deckJ1[i]) == -1) {
          carteJoue = this.deckJ1[i];
        }
      }
    } else {
      tabCartepuisCase = [];
      for (var i = 6; i <= 10; i++) {
        if (document.getElementById('drag' + i)) {
          tabCartepuisCase.push(i);
        }
      }
      for (var i = 0; i < this.deckJ2.length; i++) {
        if (tabCartepuisCase.indexOf(this.deckJ2[i]) == -1) {
          carteJoue = this.deckJ2[i];
        }
      }
    }
    var idCaseJoue;
    tabCartepuisCase = [];
    for (var i = 1; i <= 9; i++) {
      if (document.querySelector("[ondrop].case" + i)) {
        tabCartepuisCase.push(i);
      }
    }
    for (var i = 0; i < this.terrainLibre.length; i++) {
      if (tabCartepuisCase.indexOf(this.terrainLibre[i]) == -1) {
        idCaseJoue = this.terrainLibre[i];
      }
    }

    for (var i = 0; i < this.childs.length; i++) {
      if (this.childs[i].getIdCaseJoue() == idCaseJoue && this.childs[i].getIdCarteJoue() == idCarteJoue) {
        return this.childs[i];
      }
    }
  }



}