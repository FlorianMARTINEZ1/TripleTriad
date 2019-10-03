//Class GAME

class Game {
  constructor(joueur1, joueur2, ids) {
    let j1 = new Joueur(joueur1);
    let j2 = new Joueur(joueur2);
    this.listPlayer = [j1, j2];
    this.currentPlayer= getRandomIntInclusive(0,1);
    this.id = ids;
  }

  setTurn() {
      this.currentPlayer == this.listPlayer[0] ? this.currentPlayer = this.listPlayer[1] : this.currentPlayer = this.listPlayer[0];
  }

}

// On renvoie un entier aléatoire entre une valeur min (incluse)
// et une valeur max (incluse).
// Attention : si on utilisait Math.round(), on aurait une distribution
// non uniforme !
function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}
