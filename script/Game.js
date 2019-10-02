//Class GAME

class Game {
  constructor(id) {
    j1 = new Joueur("Joueur 1");
    j2 = new Joueur("Joueur 2");
    this.listJoueur = [j1, j2];
    this.currentPlayer=0;
    this.id = id;
  }
}
