//Class GAME

class Game {
  constructor(id) {
    j1 = new Joueur("Joueur 1");
    j2 = new Joueur("Joueur 2");
    this.listJoueur = [j1, j2];
    this.currentPlayer= getRandomIntInclusive(0,1);
    this.id = id;
  }

  getPlayer(){
      return this.currentPlayer;
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