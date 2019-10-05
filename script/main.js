

function allowDrop(ev) {
  ev.preventDefault();
}
let g1 = new Game('Rick', 'Morty', 1);
let j1 = new Joueur("moi");
request(readData); // appelle la fonction request et reçoit toute les 10 cartes de la BD prit au hasard

let g2;

function initialisation() {
  var joueurUn = document.getElementById('joueur1');
  var joueurDeux = document.getElementById('joueur2');
  g2 = new Game(joueurUn, joueurDeux, 2);
  document.getElementById('formgame').setAttribute('display', 'none');
  document.getElementById('plateaujeu').setAttribute('display', 'block');
}

function drag(ev) {
  ev.dataTransfer.setData('text', ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData('text');
  var img = ev.target.appendChild(document.getElementById(data));
  ev.target.removeAttribute('ondrop');
  ev.target.removeAttribute('ondragover');
  img.setAttribute('pointer-events', 'none');
  img.removeAttribute('draggable');
  img.removeAttribute('ondragstart');
  img.removeAttribute('id');
  confrontation(img.className, ev.target.classList[1]);
  j1.ajouter(img.className);

}



function confrontation(carteJoue, caseJoue){
  var findCard = function(carteJoue){
    for(var i=0;i<allCards.length;i++){
      if(allCards[i].donneNom()==carteJoue){
        return allCards[i];

      }
    }
  }
  let c = findCard(carteJoue);

  caseN = Number(caseJoue[4])-3;
  caseE = Number(caseJoue[4])+1;
  caseS = Number(caseJoue[4])+3;
  caseO = Number(caseJoue[4])-1;
  if(caseN>=1&&(caseN<=6)){ // Nord(VPN)
    let N = document.getElementsByClassName('case'+caseN)[0].firstElementChild;
    if(N!==null){
      let cartN = findCard(N.className);
      if(cartN.donneCouleur() != c.donneCouleur()){
          N.setAttribute("src","css/cartes/FF8/"+cartN.donneNom()+"."+c.donneCouleur()+".jpg")
        }

      console.log(cartN);
    }
  }
  if((caseS>=4)&&(caseS<=9)){ // Sud
    let S = document.getElementsByClassName('case'+caseS)[0].firstElementChild;
    if(S!==null){
      let cartS = findCard(S.className);
      if(cartS.donneCouleur() != c.donneCouleur()){
          S.setAttribute("src","css/cartes/FF8/"+cartS.donneNom()+"."+c.donneCouleur()+".jpg")
        }
      console.log(cartS);
    }
  }
  if((caseE-1)%3!==0){ // Est
    let E = document.getElementsByClassName('case'+caseE)[0].firstElementChild;
    if(E!==null){
      let cartE = findCard(E.className);
      if(cartE.donneCouleur() != c.donneCouleur()){
          E.setAttribute("src","css/cartes/FF8/"+cartE.donneNom()+"."+c.donneCouleur()+".jpg")
        }
      console.log(cartE);
    }
  }
  if(caseO%3!==0){ // Ouest
    let O = document.getElementsByClassName('case'+caseO)[0].firstElementChild;
    if(O!==null){
      let cartO = findCard(O.className);
      if(cartO.donneCouleur() != c.donneCouleur()){
          O.setAttribute("src","css/cartes/FF8/"+cartO.donneNom()+"."+c.donneCouleur()+".jpg")
        }
      console.log(cartO);
    }
  }
}
