function allowDrop(ev) {
  ev.preventDefault();
}
let g1 = new Game('Rick', 'Morty', 1);
let j1 = new Joueur("moi");
request(readData); // appelle la fonction request et reçoit toute les 10 cartes de la BD prit au hasard





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
  console.log(allCards);
  confrontation(img.classList[0]);
  j1.ajouter(img.classList[0]);
    j1.afficher();

}

function confrontation(carteJoue){
  let c;
  for(var i=0;i<allCards.length;i++){
    if(allCards[i].donneNom()==carteJoue){
      c = allCards[i];
      break;
    }
  }
  c.donneNom();
}
