// Class Joueur
class Joueur {
  constructor(pseudo) {
    this.pseudo = pseudo;
    this.carteJoue = [];
  }

  test() {
    console.log(this.pseudo);
  }

  getName() {
    return this.pseudo;
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
