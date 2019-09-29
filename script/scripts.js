class Joueur {
  constructor(pseudo) {
    this.pseudo = pseudo;
    this.case = [];
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

var j1 = new Joueur('babou');

function allowDrop(ev) {
  ev.preventDefault();
}

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
  var j1 = new Joueur('babou');
  j1.ajouter(ev.target.classList[1]);
  console.log(j1.toString());
  j1.afficher();
}
