function allowDrop(ev) {
  ev.preventDefault();
}

var g2 = new Game('j1', 'j2', 1); // permet de simuler une partie comme on a pas
//récuperer la game dans le fonction initialisation. 
//var j1 = new Joueur('moi');

request(readData); // appelle la fonction request et reçoit toutes les 10 cartes de la BD prit au hasard


//Test initialisation partie (Entrer deux pseudo + affichage plateau)
function initialisation() {
  var joueurUn = document.getElementById('joueur1').value;
  var joueurDeux = document.getElementById('joueur2').value;
  var g2 = new Game(joueurUn, joueurDeux, 1);
  document.getElementById('formgame').style.display = 'none';
  document.getElementById('plateaujeu').style.display = 'block';
  /*document.getElementById('un').innerHTML = g2.listPlayer[0].getName();*/
  var listPlayer = g2.getListPlayer();
  document.getElementById('un').innerHTML = listPlayer[0].getName();
  document.getElementById('deux').innerHTML =  listPlayer[1].getName();
  document.getElementById('score-un').innerHTML = listPlayer[0].getScore();
  document.getElementById('score-deux').innerHTML = listPlayer[1].getScore();
  //mise en avant premier joueur
  if (g2.currentPlayer == 0) {
    document.getElementById('un').classList.add('tonTour');
  } else {
    document.getElementById('deux').classList.add('tonTour');
  }

}

function drag(ev) {
  ev.dataTransfer.setData('text', ev.target.id);
}

function drop(ev) {
  console.log(g2.currentPlayer);
  ev.preventDefault();
  var data = ev.dataTransfer.getData('text');
  var img = ev.target.appendChild(document.getElementById(data));
  ev.target.removeAttribute('ondrop');
  ev.target.removeAttribute('ondragover');
  img.setAttribute('pointer-events', 'none');
  img.setAttribute('draggable', 'false');
  img.removeAttribute('ondragstart');
  img.removeAttribute('id');
  g2.listPlayer[g2.currentPlayer].ajouter(img.className);
  confrontation(img.className, ev.target.classList[1]);
  g2.setTurn();
  document.getElementById('score-un').innerHTML = g2.listPlayer[0].score;
  document.getElementById('score-deux').innerHTML = g2.listPlayer[1].score;
}

/**
 * Test en haut, en bas, a droite et à gauche si il y a des cartes
 * si oui, on compare les valeurs pour ensuite changer la couleur si le joueur gagne
 */

function confrontation(carteJoue, caseJoue) {

  var findCard = function(carteJoue) {

    for (var i = 0; i < allCards.length; i++) {
      if (allCards[i].donneNom() == carteJoue) {
        return allCards[i];
      }
    }
  };

  var c = findCard(carteJoue); /** c : la carte ayant été jouée */

  caseN = Number(caseJoue[4]) - 3; /** On récupère le numéro des cases */
  caseE = Number(caseJoue[4]) + 1;
  caseS = Number(caseJoue[4]) + 3;
  caseO = Number(caseJoue[4]) - 1;
  g2.listPlayer[g2.currentPlayer].score--;
  if (caseN >= 1 && (caseN <= 6)) { // Nord(VPN) Condition permettant de savoir si la carte courante peut avoir une carte au nord
    let N = document.getElementsByClassName('case' + caseN)[0].firstElementChild; /**On récupère l'image qui contient en classe le nom de la carte */
    if (N !== null) { // Si la case n'est pas vide
      let cartN = findCard(N.className); // cartN : Objet carte, au nord de la carte courante
      if (g2.currentPlayer == 0) { // joueur bleu
        if (g2.listPlayer[1].possede(cartN)) { // Si l'ennemi possède la carte
          if (cartN.donneValS() < c.donneValN()) { // Si notre carte gagne, on rentre dans la condition
            N.setAttribute("src", "css/cartes/FF8/" + cartN.donneNom() + ".bleue.jpg"); // On change la couleur
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartN)); // On déplace la carte de liste (on donne donc la carte à l'autre joueur)
          }
        }
      } else { // joueur rouge
        if (g2.listPlayer[0].possede(cartN)) {
          if (cartN.donneValS() < c.donneValN()) {
            N.setAttribute("src", "css/cartes/FF8/" + cartN.donneNom() + ".rouge.jpg");
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartN));
          }
        }
      }
    }
  }
  if ((caseS >= 4) && (caseS <= 9)) { // Sud
    let S = document.getElementsByClassName('case' + caseS)[0].firstElementChild;
    if (S !== null) {
      let cartS = findCard(S.className);
      if (g2.currentPlayer == 0) {
        if (g2.listPlayer[1].possede(cartS)) {
          if (cartS.donneValN() < c.donneValS()) {
            S.setAttribute("src", "css/cartes/FF8/" + cartS.donneNom() + ".bleue.jpg");
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartS));
          }
        }
      } else {
        if (g2.listPlayer[0].possede(cartS)) {
          if (cartS.donneValN() < c.donneValS()) {
            S.setAttribute("src", "css/cartes/FF8/" + cartS.donneNom() + ".rouge.jpg");
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartS));
          }
        }
      }
    }
  }
  if ((caseE - 1) % 3 !== 0) { // Est
    let E = document.getElementsByClassName('case' + caseE)[0].firstElementChild;
    if (E !== null) {
      let cartE = findCard(E.className);
      if (g2.currentPlayer == 0) {
        if (g2.listPlayer[1].possede(cartE)) {
          if (cartE.donneValO() < c.donneValE()) {
            E.setAttribute("src", "css/cartes/FF8/" + cartE.donneNom() + ".bleue.jpg");
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartE));
          }
        }
      } else {
        if (g2.listPlayer[0].possede(cartE)) {
          if (cartE.donneValO() < c.donneValE()) {
            E.setAttribute("src", "css/cartes/FF8/" + cartE.donneNom() + ".rouge.jpg");
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartE));
          }
        }
      }
    }
  }
  if (caseO % 3 !== 0) { // Ouest
    let O = document.getElementsByClassName('case' + caseO)[0].firstElementChild;
    if (O !== null) {
      let cartO = findCard(O.className);
      if (g2.currentPlayer == 0) {
        if (g2.listPlayer[1].possede(cartO)) {
          if (cartO.donneValE() < c.donneValO()) {
            O.setAttribute("src", "css/cartes/FF8/" + cartO.donneNom() + ".bleue.jpg");
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartO));
          }
        }
      } else {
        if (g2.listPlayer[0].possede(cartO)) {
          if (cartO.donneValE() < c.donneValO()) {
            O.setAttribute("src", "css/cartes/FF8/" + cartO.donneNom() + ".rouge.jpg");
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartO));
          }
        }
      }
    }
  }
  console.log(g2.listPlayer[0].score);
  console.log(g2.listPlayer[1].score);
}
