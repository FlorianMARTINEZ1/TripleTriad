//Class Card

class Card {
  constructor(nomCarte,valN,valS,valO,valE) {
    this.nomCarte = nomCarte;
    this.valN=valN;
    this.valS=valS;
    this.valO=valO;
    this.valE=valE;


  }

  toString(){
    return "la carte "+this.nomCarte+" de valeurs N ="+this.valN+", S="+this.valS+", O="+this.valO+", E="+this.valE;
  }

  donneNom(){
    return ""+this.nomCarte;
  }

  donneValN(){
    return this.valN;
  }

  donneValE(){
    return this.valE;
  }

  donneValS(){
    return this.valS;
  }
  donneValO(){
    return this.valO;
  }

}
