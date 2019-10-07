function allowDrop(ev) {
  ev.preventDefault();
}

var g1 = new Game('Rick', 'Morty', 1);
//var j1 = new Joueur('moi');

request(readData); // appelle la fonction request et reçoit toutes les 10 cartes de la BD prit au hasard

var g2;

//Test initialisation partie (Entrer deux pseudo + affichage plateau)
function initialisation() {
  var joueurUn = document.getElementById('joueur1').value;
  var joueurDeux = document.getElementById('joueur2').value;
  g2 = new Game(joueurUn, joueurDeux, 2);
  document.getElementById('formgame').style.display = 'none';
  document.getElementById('plateaujeu').style.display = 'block';
  document.getElementById('un').innerHTML = g2.getJun();
  document.getElementById('deux').innerHTML = g2.getDeux();

  //mise en avant premier joueur
  if (g2.getIdCurrent() == 0) {
    document.getElementById('un').classList.add('tonTour');
  } else {
    document.getElementById('deux').classList.add('tonTour');
  }

  g2.description();
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
  if (g2.getIdCurrent() === 0) {
    document.getElementById('un').classList.remove('tonTour');
    document.getElementById('deux').classList.add('tonTour');
  } else {
    document.getElementById('deux').classList.remove('tonTour');
    document.getElementById('un').classList.add('tonTour');
  }

  g2.setTurn();

  //Test tour Tour
  //j1.ajouter(img.className);
}

function confrontation(carteJoue, caseJoue) {
  var findCard = function(carteJoue) {
    for (var i = 0; i < allCards.length; i++) {
      if (allCards[i].donneNom() == carteJoue) {
        return allCards[i];
      }
    }
  };

  var c = findCard(carteJoue);

  caseN = Number(caseJoue[4]) - 3;
  caseE = Number(caseJoue[4]) + 1;
  caseS = Number(caseJoue[4]) + 3;
  caseO = Number(caseJoue[4]) - 1;
  if (caseN >= 1 && (caseN <= 6)) { // Nord(VPN)
    var N = document.getElementsByClassName('case' + caseN)[0].firstElementChild;
    if (N !== null) {
      var cartN = findCard(N.className);
      if (cartN.donneCouleur() != c.donneCouleur()) {
        N.setAttribute('src', 'css/cartes/FF8/' + cartN.donneNom() + '.' + c.donneCouleur() + '.jpg')
      }

      console.log(cartN);
    }
  }
  if ((caseS >= 4) && (caseS <= 9)) { // Sud
    var S = document.getElementsByClassName('case' + caseS)[0].firstElementChild;
    if (S !== null) {
      var cartS = findCard(S.className);
      if (cartS.donneCouleur() != c.donneCouleur()) {
        S.setAttribute('src', 'css/cartes/FF8/' + cartS.donneNom() + '.' + c.donneCouleur() + '.jpg')
      }
      console.log(cartS);
    }
  }
  if ((caseE - 1) % 3 !== 0) { // Est
    var E = document.getElementsByClassName('case' + caseE)[0].firstElementChild;
    if (E !== null) {
      var cartE = findCard(E.className);
      if (cartE.donneCouleur() != c.donneCouleur()) {
        E.setAttribute('src', 'css/cartes/FF8/' + cartE.donneNom() + '.' + c.donneCouleur() + '.jpg')
      }
      console.log(cartE);
    }
  }
  if (caseO % 3 !== 0) { // Ouest
    var O = document.getElementsByClassName('case' + caseO)[0].firstElementChild;
    if (O !== null) {
      var cartO = findCard(O.className);
      if (cartO.donneCouleur() != c.donneCouleur()) {
        O.setAttribute('src', 'css/cartes/FF8/' + cartO.donneNom() + '.' + c.donneCouleur() + '.jpg')
      }
      console.log(cartO);
    }
  }
}
