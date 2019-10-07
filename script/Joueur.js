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

  possede(carte){
    for(var i= 0; i < this.carteJoue.length; i++){
      if(this.carteJoue[i]===carte.donneNom()) return true;
    }
    return false
  }

  retrieveCard(carte) {
    for(var i= 0; i < this.carteJoue.length; i++){
      if(this.carteJoue[i]==carte.donneNom()) {
        let a = this.carteJoue[i];
        this.carteJoue[i]= null;
        return a;
      }
    }
  }

  afficher(){
    for (const carte of this.carteJoue) {
      console.log(carte);
    }
  }

  toString() {
    return `${this.pseudo}`;
  }
}
// FIN CLASS JOUEUR
