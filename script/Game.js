//Class GAME

class Game {
  constructor(joueur1, joueur2, ids) {
    console.log(joueur1);
    var j1 = new Joueur(joueur1);
    var j2 = new Joueur(joueur2);
    this.listPlayer = [j1, j2];
    this.currentPlayer = getRandomIntInclusive(0, 1);
    this.id = ids;
  }

  setTurn() {
    if (this.currentPlayer === this.listPlayer[0]) {
      this.currentPlayer = this.listPlayer[1];
    } else {
      this.currentPlayer = this.listPlayer[0];
    }
  }

  getIdCurrent() {
    return this.currentPlayer;
  }

  description() {
    for (const joueur of this.listPlayer) {
      joueur.test();
    }
  }

  getJun() {
    return this.listPlayer[0].getName();
  }

  getDeux() {
    return this.listPlayer[1].getName();
  }

}
