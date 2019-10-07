

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
  ev.target.removeAttribute('ondragover');
  img.setAttribute('pointer-events', 'none');
  img.setAttribute('draggable','false');
  img.removeAttribute('ondragstart');
  img.removeAttribute('id');
  g1.listPlayer[g1.currentPlayer].ajouter(img.className);
  confrontation(img.className, ev.target.classList[1]);
  g1.setTurn();
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
      if(g1.currentPlayer==0){
        if(g1.listPlayer[1].possede(cartN)){
          if(cartN.donneValS()<c.donneValN()){
            N.setAttribute("src","css/cartes/FF8/"+cartN.donneNom()+".bleue.jpg");
            g1.listPlayer[0].ajouter(g1.listPlayer[1].retrieveCard(cartN));
          }
        }
      }else{
        if(g1.listPlayer[0].possede(cartN)){
          if(cartN.donneValS()<c.donneValN()){
            N.setAttribute("src","css/cartes/FF8/"+cartN.donneNom()+".rouge.jpg");
            g1.listPlayer[1].ajouter(g1.listPlayer[0].retrieveCard(cartN));
          }
        }
      }
    }
  }
  if((caseS>=4)&&(caseS<=9)){ // Sud
    let S = document.getElementsByClassName('case'+caseS)[0].firstElementChild;
    if(S!==null){
      let cartS = findCard(S.className);
      if(g1.currentPlayer==0){
        if(g1.listPlayer[1].possede(cartS)){
          if(cartS.donneValN()<c.donneValS()){
            S.setAttribute("src","css/cartes/FF8/"+cartS.donneNom()+".bleue.jpg");
            g1.listPlayer[0].ajouter(g1.listPlayer[1].retrieveCard(cartS));
          }
        }
      }else{
        if(g1.listPlayer[0].possede(cartS)){
          if(cartS.donneValN()<c.donneValS()){
            S.setAttribute("src","css/cartes/FF8/"+cartS.donneNom()+".rouge.jpg");
            g1.listPlayer[1].ajouter(g1.listPlayer[0].retrieveCard(cartS));
          }
        }
      }
    }
  }
  if((caseE-1)%3!==0){ // Est
    let E = document.getElementsByClassName('case'+caseE)[0].firstElementChild;
    if(E!==null){
      let cartE = findCard(E.className);
      if(g1.currentPlayer==0){
        if(g1.listPlayer[1].possede(cartE)){
          if(cartE.donneValO()<c.donneValE()){
            E.setAttribute("src","css/cartes/FF8/"+cartE.donneNom()+".bleue.jpg");
            g1.listPlayer[0].ajouter(g1.listPlayer[1].retrieveCard(cartE));
          }
        }
      }else{
        if(g1.listPlayer[0].possede(cartE)){
          if(cartE.donneValO()<c.donneValE()){
            E.setAttribute("src","css/cartes/FF8/"+cartE.donneNom()+".rouge.jpg");
            g1.listPlayer[1].ajouter(g1.listPlayer[0].retrieveCard(cartE));
          }
        }
      }
    }
  }
  if(caseO%3!==0){ // Ouest
    let O = document.getElementsByClassName('case'+caseO)[0].firstElementChild;
    if(O!==null){
      let cartO = findCard(O.className);
      if(g1.currentPlayer==0){ //bleu
        if(g1.listPlayer[1].possede(cartO)){
          if(cartO.donneValE()<c.donneValO()){
            O.setAttribute("src","css/cartes/FF8/"+cartO.donneNom()+".bleue.jpg");
            g1.listPlayer[0].ajouter(g1.listPlayer[1].retrieveCard(cartO));
          }
        }
      }else{  //rouge
        if(g1.listPlayer[0].possede(cartO)){
          if(cartO.donneValE()<c.donneValO()){
            O.setAttribute("src","css/cartes/FF8/"+cartO.donneNom()+".rouge.jpg");
            g1.listPlayer[1].ajouter(g1.listPlayer[0].retrieveCard(cartO));
          }
        }
      }
    }
  }
}
