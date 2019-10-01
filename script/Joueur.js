class Joueur {
<<<<<<< HEAD
    constructor(pseudo) {
      this.pseudo = pseudo;
      this.case = [];
    }
    test(){
      console.log("test");
    }

    ajouter(numcase) {
      this.case.push(numcase);
    }

    afficher() {
      for (const ncase of this.case) {
        console.log(ncase);
      }
    }

    toString() {
      return `${this.pseudo}`;
    }
}

export {Joueur};
=======

  constructor(pseudo) {
    this.pseudo = pseudo;
    this.case = [];
  }

  test() {
    console.log('test');
  }

  ajouter(numcase) {
    this.case.push(numcase);
  }

  afficher() {
    for (const ncase of this.case) {
      console.log(ncase);
    }
  }

  toString() {
    return `${this.pseudo}`;
  }
}

export {
  Joueur
};
>>>>>>> d269b38b2cc46f4aa04b9a6f5bf84c9c503402a2
