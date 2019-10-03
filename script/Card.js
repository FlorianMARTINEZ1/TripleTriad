//Class Card

class Card {
  constructor(pseudo,valN,valS,valO,valE) {
    this.pseudo = pseudo;
    this.valN=valN;
    this.valS=valS;
    this.valO=valO;
    this.valE=valE;


  }

  toString(){
    return "la carte "+this.pseudo;
  }
}
