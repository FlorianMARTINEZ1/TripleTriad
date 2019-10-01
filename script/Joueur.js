class Joueur {
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
