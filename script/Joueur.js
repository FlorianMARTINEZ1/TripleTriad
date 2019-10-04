// Class Joueur
class Joueur {
  constructor(pseudo) {
    this.pseudo = pseudo;
    this.carteJoue = [];
  }

  test() {
    console.log('test');
  }

  ajouter(carte) {
    this.carteJoue.push(carte);
  }

  afficher() {
    for (const carte of this.carteJoue) {
      console.log(carte);
    }
  }

  toString() {
    return `${this.pseudo}`;
  }
}
// FIN CLASS JOUEUR
