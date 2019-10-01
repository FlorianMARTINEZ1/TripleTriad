//import * as joueur from './Joueur.js';
<<<<<<< HEAD
//include("./Joueur.js");
=======
include('./Joueur.js');

>>>>>>> d269b38b2cc46f4aa04b9a6f5bf84c9c503402a2
function allowDrop(ev) {
  ev.preventDefault();
}

//let j1 = new Joueur('babou');
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

function include(fileName){
  document.write("<script type='text/html' src='"+fileName+"'></script>" );
}
