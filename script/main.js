function allowDrop(ev) {
  ev.preventDefault();
}

let g1 = new Game('Rick', 'Morty', 1);
let toutCartes = alert(request(readData));
 // appelle la fonction request et reçoit toute les 10 cartes de la BD prit au hasard

/*console.log(toutCartes);*/

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

}
