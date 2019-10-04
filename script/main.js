function allowDrop(ev) {
  ev.preventDefault();
}


let g1 = new Game('Rick', 'Morty', 1);
<<<<<<< HEAD
let toutCartes = request(readData);
// appelle la fonction request et reçoit toute les 10 cartes de la BD prit au hasard

/*console.log(toutCartes);*/
let j1 = new Joueur("moi");
=======
request(readData);
 // appelle la fonction request et reçoit toute les 10 cartes de la BD prit au hasard





>>>>>>> a822c7bf0f196041ef60ffbe108fedd027623a21
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
<<<<<<< HEAD
  j1.ajouter(img.classList[0]);
    j1.afficher();


}
=======
}
>>>>>>> a822c7bf0f196041ef60ffbe108fedd027623a21
