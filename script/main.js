// Class Joueur
class Joueur {
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
// FIN CLASS JOUEUR


//Class GAME

class Game {
  constructor() {
    j1 = new Joueur("Joueur 1");
    j2 = new Joueur("Joueur 2");
    this.listJoueur = [j1, j2];
  }
}

function allowDrop(ev) {
  ev.preventDefault();
}

let j1 = new Joueur('babou');

function drag(ev) {
  ev.dataTransfer.setData('text', ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData('text');
  var img = ev.target.appendChild(document.getElementById(data));
  ev.target.removeAttribute('ondrop');
  img.setAttribute('pointer-events', 'none');
  img.removeAttribute('draggable');
  img.removeAttribute('ondragstart');
  j1.ajouter(ev.target.classList[1]);
  console.log(j1.toString());
  j1.afficher();
}
