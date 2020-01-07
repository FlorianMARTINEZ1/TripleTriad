caseEnvoie = 10;
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

  xhr.open("GET", "api/miseAjourJeu.php?id="+idG, true); // on les cherche dans le fichier api/miseAjourJeu
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
  if(donnes[0] && donnes[0]['casejoue'] != null && (( donnes[0]["etat"]=="joueur1" && donnes[0]["challenger"] != document.getElementById("joueur1").value ) || (donnes[0]["etat"]=="joueur2"  && donnes[0]["challenger"] == document.getElementById("joueur1").value))){
    console.log("en attent de réponse, le joueur en face a joué");
    console.log("current = "+g2.currentPlayer);
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
    console.log("current = "+g2.currentPlayer);
    /*g2.currentPlayer==0;*/
    document.getElementById('score-un').innerHTML = g2.listPlayer[0].score;
    document.getElementById('score-deux').innerHTML = g2.listPlayer[1].score;
    var sound = document.getElementById("sound");
    if (sound.muted == false) {
      var sound = document.getElementById("soundcarte");
      sound.autoplay = true;
      sound.load();
    }
    g2.endGame();
  }
  else if(donnes[0]['casejoue'] != null){
    console.log("en attente de réponse, currentPlayer ="+g2.currentPlayer);
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
    bouton.innerHTML = "volume_up";
  } else {
    sound.muted = true;
    bouton.innerHTML = "volume_off";

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
  sound.autoplay = true;
  sound.load();
  sound.volume = 0.2;
  var joueurUn = document.getElementById('joueur1').value;
  var joueurDeux = document.getElementById('joueur2').value;
  document.getElementById('formgame').style.display = 'none';
  document.getElementById('plateaujeu').style.display = 'block';
  document.getElementById('un').innerHTML =  joueurUn;
  document.getElementById('deux').innerHTML =  joueurDeux;
  document.getElementById('score-un').innerHTML = 5;
  document.getElementById('score-deux').innerHTML = 5;
  addDeck(0);
  addDeck(5);

}

function addDeck(increment) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {

    }
  };
  let tabID = [];
  for (let i = 0; i < 5; i++) {
    tabID.push(allCards[i + increment].donneID());

  }
  tabID.sort(function(a, b) {
    return a - b
  });

  xhr.open("GET", "api/historiqueAjax.php?func=addNewDeck&idC1=" + tabID[0] + "&idC2=" + tabID[1] + "&idC3=" + tabID[2] + "&idC4=" + tabID[3] + "&idC5=" + tabID[4]);
  xhr.send();
}

function drag(ev) {
  ev.dataTransfer.setData('text', ev.target.draggable);
  var data = ev.dataTransfer.getData('text');
  if (data == "true") {
    ev.dataTransfer.setData('text', ev.target.id);
    var sound = document.getElementById("sound");
    if (sound.muted == false) {
      var sound = document.getElementById("soundcartepose");
      sound.autoplay = true;
      sound.load();
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
  g2.confrontation(img.className, ev.target.classList[1]);
  g2.setTurn();
  g2.ajoue = g2.currentPlayer;
  document.getElementById('score-un').innerHTML = g2.listPlayer[0].score;
  document.getElementById('score-deux').innerHTML = g2.listPlayer[1].score;
  var sound = document.getElementById("sound");
  if (sound.muted == false) {
    var sound = document.getElementById("soundcarte");
    sound.autoplay = true;
    sound.load();
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
  let log = document.getElementById("joueur1").value;
  xhr.open("GET", "api/envoieDonner.php?case="+casejouer+"&carte="+idCarteJoue+"&id="+idG+"&log="+log,true);
  xhr.send();
}
