var caseEnvoie = 10;
var idCarteJoue = 0;
var donnée = 0;
var idG = document.getElementById("id").innerHTML;
var idG = parseInt(idG);

setTimeout(function(){
  initialisation();
},5000);

function allowDrop(ev) {
  ev.preventDefault();

}

setInterval(function () {
  requete(lireDonnee);
}, 200);

function  requete(callback){
  var xhr = new XMLHttpRequest(); // créer une requête HTTP

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
      donnée = callback(xhr.responseText); // on récupère les données.
    }
  };

  xhr.open("GET", "api/miseAjourJeu.php?id="+idG, true); // on les cherche dans le fichier php/test.php
  xhr.send(null);
}
function removeCaseCard(etat) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
    }
  };
  xhr.open("GET", "api/removeTour.php?id="+idG, true);
  xhr.send();
}


function lireDonnee(sData) {
  var donnes = JSON.parse(sData);
  if(donnes[0]['casejoue'] != null && g2.currentPlayer==1 && g2.ajoue!=1){
    console.log("en attent de réponse, le joueur en face a joué");
    let jouecase = "case"+donnes[0]['casejoue'];
    let img = donnes[0]['idcartejoue'];
    removeCaseCard(1);
    var newimg = document.getElementsByClassName(img)[0];
    let idC = newimg.className;
    let CarteRetourne = findCard(idC);
    newimg.setAttribute("src","css/cartes/FF8/" + CarteRetourne.donneNom() + ".rouge.jpg");
    var immage = document.getElementsByClassName(jouecase)[0].appendChild(newimg);
    newimg.removeAttribute('ondrop');
    newimg.removeAttribute('ondragover');
    newimg.setAttribute('pointer-events', 'none');
    newimg.setAttribute('draggable', 'false');
    newimg.removeAttribute('ondragstart');
    newimg.removeAttribute('id');
    var casee = document.getElementsByClassName(jouecase)[0];
    casee.removeAttribute('ondrop');
    casee.removeAttribute('ondragover');
    confrontation(img,jouecase);
    g2.setTurn();
    /*g2.currentPlayer==0;*/
    document.getElementById('score-un').innerHTML = g2.listPlayer[0].score;
    document.getElementById('score-deux').innerHTML = g2.listPlayer[1].score;
    var sound = document.getElementById("sound");
    if (sound.muted == false) {
      /*var sound = document.getElementById("soundcarte");
      sound.autoplay = true;
      /*sound.load();*/
    }
    g2.endGame();
  }
  else if(donnes[0]['casejoue'] != null){
    console.log("en attente de réponse, currentPlayer ="+g2.currentPlayer);
    if(temps==4){
        g2.ajoue = g2.currentPlayer-1;
        temps = 0;
    }
    else{
      temps = temps + 1 ;
    }


  }
  else{
    console.log("en attente de jeu, currentPlayer ="+g2.currentPlayer);
  }
}

var temps = 0;

function afficheMenu() {
  let menu = document.getElementById("menu");
  let plateau = document.getElementById('plateaujeu');
  if (plateau.style.opacity == 0.4) {
    if (menu.classList.contains("ma-transition")) {
      menu.classList.remove("ma-transition")
    } else {
      menu.classList.add("ma-transition")
    }
    plateau.style.opacity = '1';
  } else {
    if (menu.classList.contains("ma-transition")) {
      menu.classList.remove("ma-transition")
    } else {
      menu.classList.add("ma-transition")
    }
    plateau.style.opacity = '0.4';

  }
}


function stopMusic() {
  let bouton = document.getElementById("volume");
  var sound = document.getElementById("sound");
  if (sound.muted == true) {
    sound.muted = false;
    sound.autoplay = true;
    bouton.innerHTML = "volume_off";
  } else {
    sound.muted = true;
    bouton.innerHTML = "volume_up";

  }

}
var choixjoueur = document.getElementById("choix").innerHTML;
var g2 = new Game('j1', 'j2', 1,'multi',choixjoueur);
// permet de simuler une partie comme on a pas
//récuperer la game dans le fonction initialisation.

request(readData); // appelle la fonction request et reçoit toutes les 10 cartes de la BD prit au hasard


//Test initialisation partie (Entrer deux pseudo + affichage plateau)
function initialisation() {
  var sound = document.getElementById("sound");
  /*sound.autoplay = true;
  sound.load();*/
  sound.volume = 0.2;
  var joueurUn = document.getElementById('joueur1').value;
  var joueurDeux = document.getElementById('joueur2').value;
  document.getElementById('formgame').style.display = 'none';
  document.getElementById('plateaujeu').style.display = 'block';
  document.getElementById('un').innerHTML =  joueurUn;
  document.getElementById('deux').innerHTML =  joueurDeux;
  document.getElementById('score-un').innerHTML = 5;
  document.getElementById('score-deux').innerHTML = 5;

}

function drag(ev) {
  ev.dataTransfer.setData('text', ev.target.draggable);
  var data = ev.dataTransfer.getData('text');
  if (data == "true") {
    ev.dataTransfer.setData('text', ev.target.id);
    var sound = document.getElementById("sound");
    if (sound.muted == false) {
      /*var sound = document.getElementById("soundcartepose");
      sound.autoplay = true;
      /*sound.load();*/
    }
  } else {
    ev.preventDefault()
    throw new Error("Va te faire sale tricheur");
  }

}

function drop(ev) {
  ev.preventDefault();
  console.log(g2.currentPlayer);
  var data = ev.dataTransfer.getData('text');
  var img = ev.target.appendChild(document.getElementById(data));
  ev.target.removeAttribute('ondrop');
  ev.target.removeAttribute('ondragover');
  img.setAttribute('pointer-events', 'none');
  img.setAttribute('draggable', 'false');
  img.removeAttribute('ondragstart');
  img.removeAttribute('id');
  caseEnvoie = ev.target.classList[1];
  idCarteJoue = img.className;
  envoieDonner(1);
  confrontation(img.className, ev.target.classList[1]);
  g2.setTurn();
  g2.ajoue = g2.currentPlayer;
  document.getElementById('score-un').innerHTML = g2.listPlayer[0].score;
  document.getElementById('score-deux').innerHTML = g2.listPlayer[1].score;
  var sound = document.getElementById("sound");
  if (sound.muted == false) {
    /*var sound = document.getElementById("soundcarte");
    sound.autoplay = true;
    /*sound.load();*/
  }
  g2.endGame();

}

function envoieDonner(etat) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
    }
  };
  let casejouer = caseEnvoie.substr(4);
  casejouer = parseInt(casejouer);
  xhr.open("GET", "api/envoieDonner.php?case="+casejouer+"&carte="+idCarteJoue+"&id="+idG,true);
  xhr.send();
}

/**
 * Test en haut, en bas, a droite et à gauche si il y a des cartes
 * si oui, on compare les valeurs pour ensuite changer la couleur si le joueur gagne
 */
var findCard = function(carteJoue) {

  for (var i = 0; i < allCards.length; i++) {
    if (allCards[i].donneID() === Number(carteJoue)) {
      return allCards[i];
    }
  }
}
function action(C,Cart,couleur){
    C.setAttribute("src", "css/cartes/FF8/" + Cart.donneNom() + "." + couleur + ".jpg"); // On change la couleur
    C.style.width="100px";
    C.style.marginLeft="0px";
}

function confrontation(carteJoue, caseJoue) {


  var c = findCard(carteJoue); /** c : la carte ayant été jouée */
  g2.listPlayer[""+g2.currentPlayer].ajouter(c);
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
            N.style.width="0px";
            N.style.marginLeft="50px";
            let coul = cartN.donneCouleurInv();
            setTimeout(function(){action(N,cartN,coul)},300);
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartN)); // On déplace la carte de liste (on donne donc la carte à l'autre joueur)
            cartN.setCouleurInv();
          }
        }
      } else { // joueur rouge
        if (g2.listPlayer[0].possede(cartN)) {
          if (cartN.donneValS() < c.donneValN()) {
            N.style.width="0px";
            N.style.marginLeft="50px";
            let coul = cartN.donneCouleurInv();
            setTimeout(function(){action(N,cartN,coul)},300);
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartN));
            cartN.setCouleurInv();
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
            S.style.width="0px";
            S.style.marginLeft="50px";
            let coul = cartS.donneCouleurInv();
            setTimeout(function(){action(S,cartS,coul)},300);
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartS));
            cartS.setCouleurInv();
          }
        }
      } else {
        if (g2.listPlayer[0].possede(cartS)) {
          if (cartS.donneValN() < c.donneValS()) {
            S.style.width="0px";
            S.style.marginLeft="50px";
            let coul = cartS.donneCouleurInv();
            setTimeout(function(){action(S,cartS,coul)},300);
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartS));
            cartS.setCouleurInv();
          }
        }
      }
    }
  }
  if ((caseE - 1) % 3 !== 0) { // Est
    console.log('case' + caseE);
    let E = document.getElementsByClassName('case' + caseE)[0].firstElementChild;
    if (E !== null) {
      let cartE = findCard(E.className);
      if (g2.currentPlayer == 0) {
        if (g2.listPlayer[1].possede(cartE)) {
          if (cartE.donneValO() < c.donneValE()) {
            E.style.width="0px";
            E.style.marginLeft="50px";
            let coul = cartE.donneCouleurInv();
            setTimeout(function(){action(E,cartE,coul)},300);
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartE));
            cartE.setCouleurInv();
          }
        }
      } else {
        if (g2.listPlayer[0].possede(cartE)) {
          if (cartE.donneValO() < c.donneValE()) {
            E.style.width="0px";
            E.style.marginLeft="50px";
            let coul = cartE.donneCouleurInv();
            setTimeout(function(){action(E,cartE,coul)},300);
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartE));
            cartE.setCouleurInv();
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
            O.style.width="0px";
            O.style.marginLeft="50px";
            let coul = cartO.donneCouleurInv();
            setTimeout(function(){action(O,cartO,coul)},300);
            g2.listPlayer[0].ajouter(g2.listPlayer[1].retrieveCard(cartO));
            cartO.setCouleurInv();
          }
        }
      } else {
        if (g2.listPlayer[0].possede(cartO)) {
          if (cartO.donneValE() < c.donneValO()) {
            O.style.width="0px";
            O.style.marginLeft="50px";
            let coul = cartO.donneCouleurInv();
            setTimeout(function(){action(O,cartO,coul)},300);
            g2.listPlayer[1].ajouter(g2.listPlayer[0].retrieveCard(cartO));
            cartO.setCouleurInv();
          }
        }
      }
    }
  }
  console.log(g2.listPlayer[0].score);
  console.log(g2.listPlayer[1].score);
  document.getElementById('score-un').innerHTML = g2.listPlayer[0].score;
  document.getElementById('score-deux').innerHTML = g2.listPlayer[1].score;
}
