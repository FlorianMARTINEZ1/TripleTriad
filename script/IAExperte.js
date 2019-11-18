class IAExperte extends IA {
  constructor(game) {
    super(game, "IAExperte");
    this.gameMinim;
  }

  setIndex() {
    super.setIndex();
    this.initialize();
  }
  initialize() {
    var deck1 = [1, 2, 3, 4, 5];
    var deck2 = [6, 7, 8, 9, 10];
    /*for (let i = 1; i <= 10; i++) {
      if (document.getElementById('drag' + i)) {
        if (i <= 5) {
          deck1.push(i);
        } else {
          deck2.push(i);
        }
      }
    }*/
    var terrainP = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    /*for (let i = 1; i <= 9; i++) {
      if (document.querySelector("[ondrop].case" + i)) {
        terrainP.push(i);
      }
    }*/
    var dureeP = 4; //- terrainP.length;
    var currentPlay = this.game.getCurrentPlayer();
    var idCarteJoue = -1;
    var idCaseJoue = -1;
    var couleurg = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    this.gameMinim = new GameMinim(deck1, deck2, terrainP, dureeP, currentPlay, idCarteJoue, idCaseJoue, couleurg);
  }

  mettreAJourGame() {
    this.gameMinim = this.gameMinim.miseAJour();
  }

  play() {
    this.setCasesVides();
    this.mettreAJourGame();
    this.gameMinim = this.gameMinim.bestChild();
    console.log(this.gameMinim.getIdCarteJoue() + ", " + this.gameMinim.getIdCaseJoue());
    super.play(this.gameMinim.getIdCarteJoue(), this.gameMinim.getIdCaseJoue());
  }

}