//Class Card

class Card {
  constructor(id,nomCarte, valN, valS, valO, valE, couleur,source) {
    this.id = id;
    this.nomCarte = nomCarte;
    this.valN = valN;
    this.valS = valS;
    this.valO = valO;
    this.valE = valE
    this.source = source;
    this.couleur = couleur;
  }

  toString() {
    return "la carte " + this.nomCarte + " de valeurs N =" + this.valN + ", S=" + this.valS + ", O=" + this.valO + ", E=" + this.valE + ", de couleur " + this.couleur + ".";
  }

  donneID(){
    return this.id;
  }

  donneSource() {
    return this.source;
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

  retourne(C, couleur) {
    C.setAttribute("src", "css/cartes/"+this.donneSource()+"/" + this.donneNom() + "." + couleur + ".jpg"); // On change la couleur
    C.style.width = "100px";
    C.style.marginLeft = "0px";
    setTimeout(function() {
      safe(C, coul);
    }, 100);
  }

  safe(C, couleur)
  {
    C.setAttribute("src", "css/cartes/"+this.donneSource()+"/" + this.donneNom() + "." + couleur + ".jpg"); // On change la couleur
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
