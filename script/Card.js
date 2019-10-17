//Class Card

class Card {
  constructor(nomCarte, valN, valS, valO, valE, couleur) {
    this.nomCarte = nomCarte;
    this.valN = valN;
    this.valS = valS;
    this.valO = valO;
    this.valE = valE
    this.couleur = couleur;
  }

  toString() {
    return "la carte " + this.nomCarte + " de valeurs N =" + this.valN + ", S=" + this.valS + ", O=" + this.valO + ", E=" + this.valE + ", de couleur " + this.couleur + ".";
  }

  donneNom() {
    return "" + this.nomCarte;
  }

  donneValN() {
    return parseInt(this.valN, 10);
  }

  donneValE() {
    return parseInt(this.valE, 10);
  }

  donneValS() {
    return parseInt(this.valS, 10);
  }
  donneValO() {
    return parseInt(this.valO, 10);
  }

  donneCouleur(){
    return this.couleur;
  }

  donneCouleurInv(){
    if(this.couleur=="bleue") return "rouge";
    else return "bleue";
  }

  setCouleurInv(){
    if(this.couleur=="bleue") this.couleur="rouge";
    else this.couleur="bleue";
  }
}
