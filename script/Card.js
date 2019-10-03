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
    return "la carte "+this.pseudo+" de valeurs N ="+this.valN+", S="+this.valS+", O="+this.valO+", E="+this.valE;
  }


}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}
