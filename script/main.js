function allowDrop(ev) {
  ev.preventDefault();

}

function afficheMenu() {
  let menu = document.getElementById("menu");
  let bckgrnd = document.getElementById("backgrndmenu");
  let plateau = document.getElementById('plateaujeu');
  if (plateau.style.opacity == 0.4) {
    if (menu.classList.contains("ma-transition")) {
      menu.classList.remove("ma-transition")
      bckgrnd.classList.remove("appear")
    } else {
      menu.classList.add("ma-transition")
      bckgrnd.classList.add("appear")
    }
    plateau.style.opacity = '1';
  } else {
    if (menu.classList.contains("ma-transition")) {
      menu.classList.remove("ma-transition")
      bckgrnd.classList.remove("appear")
    } else {
      menu.classList.add("ma-transition")
      bckgrnd.classList.add("appear")
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
    sound.play();
    bouton.innerHTML = "volume_up";
  } else {
    sound.muted = true;
    bouton.innerHTML = "volume_off";

  }

}


if(existeImage){ // si le deck à une image de fond on le charge
  document.getElementById("html").style.backgroundImage = "url(./css/img/"+document.getElementById("deck").innerHTML+".jpg)";
}
var choixjoueur = getRandomIntInclusive(0, 1); //choix du premier joueuer a jouer
document.getElementById("choix").innerHTML = choixjoueur;
request(readData); // appelle la fonction request et reçoit toutes les 10 cartes de la BD prit au hasard
var g2;
setTimeout(function() {
  g2 = new Game("j1", "j2 ", 1, 'solo', choixjoueur);
}, 500);
// permet de simuler une partie comme on a pas
//récuperer la game dans le fonction initialisation.




//Test initialisation partie (Entrer deux pseudo + affichage plateau)
function initialisation() {
  var sound = document.getElementById("sound");
  var bouton = document.getElementById("volume");
  if(bouton.innerHTML == "volume_up"){
    sound.autoplay = true;
    sound.muted = false;
    sound.load();
  }
  else{
    sound.muted = true;
    sound.load();
  }
  if(document.getElementById('deck').innerHTML == "lol"){
    sound.volume = 0.7;
  }
  else{
    sound.volume = 0.2;
  }
  var joueurUn = document.getElementById('joueur1').value;
  var joueurDeux = document.getElementById('joueur2').value;

  document.getElementById('formgame').style.display = 'none';
  document.getElementById('plateaujeu').style.display = 'block';

  document.getElementById('un').innerHTML = joueurUn;
  document.getElementById('deux').innerHTML = joueurDeux;
  document.getElementById('score-un').innerHTML = 5;
  document.getElementById('score-deux').innerHTML = 5;
  addDeck(0);
  addDeck(5);


  if (choixjoueur == 1 && document.getElementById("IA")) {
    g2.getListPlayer()[1].play();
  } else if (document.getElementById("IA0")) {
    g2.getListPlayer()[0].play();
  }



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

  //xhr.open("GET", "php/historiqueAjax.php?func=addNewDeck&idC1="+allCards[0+increment].donneID()+"&idC2="+allCards[1+increment].donneID()+"&idC3="+allCards[2+increment].donneID()+"&idC4="+allCards[3+increment].donneID()+"&idC5="+allCards[4+increment].donneID());
  xhr.open("GET", "php/historiqueAjax.php?func=addNewDeck&idC1=" + tabID[0] + "&idC2=" + tabID[1] + "&idC3=" + tabID[2] + "&idC4=" + tabID[3] + "&idC5=" + tabID[4]);
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
    throw new Error("pas bien de tricher");
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
  g2.confrontation(img.className, ev.target.classList[1]);
  g2.setTurn();
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
