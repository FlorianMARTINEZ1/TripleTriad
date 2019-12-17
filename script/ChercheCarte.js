// On renvoie un entier aléatoire entre une valeur min (incluse)
// et une valeur max (incluse).
// Attention : si on utilisait Math.round(), on aurait une distribution
// non uniforme !
var allCards;
var tabCartes;

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function request(callback) {
  var xhr = new XMLHttpRequest(); // créer une requête HTTP

  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
      allCards = callback(xhr.responseText); // on récupère les données.
    }
  };
  let deck = document.getElementById("deck");
  xhr.open("GET", "php/test.php?deck="+deck.innerHTML, true); // on les cherche dans le fichier php/test.php
  xhr.send(null);
}

function findCard(carteJoue) {

  for (var i = 0; i < allCards.length; i++) {
    if (allCards[i].donneID() === Number(carteJoue)) {
      return allCards[i];
    }
  }
}

function readData(sData) {
  var cartes = JSON.parse(sData);

  let valeurJ1 = 0;
  let valeurJ2 = 0;

  do {
    var tabId = [];
    valeurJ1 = 0;
    valeurJ2 = 0;
    for (var i = 0; i < 10; i++) {
      tabId.push(getRandomIntInclusive(0, cartes.length-1)); // choisie une carte entre 0 et la taille de toutes les cartes
    }
    var carte1 = new Card(parseInt(cartes[tabId[0]]['id']), cartes[tabId[0]]['nomCarte'], cartes[tabId[0]]['valN'], cartes[tabId[0]]['valS'],
      cartes[tabId[0]]['valO'], cartes[tabId[0]]['valE'], "bleue",cartes[tabId[0]]['source']); //  => créer une carte
    var carte2 = new Card(parseInt(cartes[tabId[1]]['id']), cartes[tabId[1]]['nomCarte'], cartes[tabId[1]]['valN'], cartes[tabId[1]]['valS'],
      cartes[tabId[1]]['valO'], cartes[tabId[1]]['valE'], "bleue",cartes[tabId[1]]['source']); //  => créer une carte
    var carte3 = new Card(parseInt(cartes[tabId[2]]['id']), cartes[tabId[2]]['nomCarte'], cartes[tabId[2]]['valN'], cartes[tabId[2]]['valS'],
      cartes[tabId[2]]['valO'], cartes[tabId[2]]['valE'], "bleue",cartes[tabId[2]]['source']); //  => créer une carte
    var carte4 = new Card(parseInt(cartes[tabId[3]]['id']), cartes[tabId[3]]['nomCarte'], cartes[tabId[3]]['valN'], cartes[tabId[3]]['valS'],
      cartes[tabId[3]]['valO'], cartes[tabId[3]]['valE'], "bleue",cartes[tabId[3]]['source']); //  => créer une carte
    var carte5 = new Card(parseInt(cartes[tabId[4]]['id']), cartes[tabId[4]]['nomCarte'], cartes[tabId[4]]['valN'], cartes[tabId[4]]['valS'],
      cartes[tabId[4]]['valO'], cartes[tabId[4]]['valE'], "bleue",cartes[tabId[4]]['source']); //  => créer une carte
    var carte6 = new Card(parseInt(cartes[tabId[5]]['id']), cartes[tabId[5]]['nomCarte'], cartes[tabId[5]]['valN'], cartes[tabId[5]]['valS'],
      cartes[tabId[5]]['valO'], cartes[tabId[5]]['valE'], "rouge",cartes[tabId[5]]['source']); //  => créer une carte
    var carte7 = new Card(parseInt(cartes[tabId[6]]['id']), cartes[tabId[6]]['nomCarte'], cartes[tabId[6]]['valN'], cartes[tabId[6]]['valS'],
      cartes[tabId[6]]['valO'], cartes[tabId[6]]['valE'], "rouge",cartes[tabId[6]]['source']); //  => créer une carte
    var carte8 = new Card(parseInt(cartes[tabId[7]]['id']), cartes[tabId[7]]['nomCarte'], cartes[tabId[7]]['valN'], cartes[tabId[7]]['valS'],
      cartes[tabId[7]]['valO'], cartes[tabId[7]]['valE'], "rouge",cartes[tabId[7]]['source']); //  => créer une carte
    var carte9 = new Card(parseInt(cartes[tabId[8]]['id']), cartes[tabId[8]]['nomCarte'], cartes[tabId[8]]['valN'], cartes[tabId[8]]['valS'],
      cartes[tabId[8]]['valO'], cartes[tabId[8]]['valE'], "rouge",cartes[tabId[8]]['source']); //  => créer une carte
    var carte10 = new Card(parseInt(cartes[tabId[9]]['id']), cartes[tabId[9]]['nomCarte'], cartes[tabId[9]]['valN'], cartes[tabId[9]]['valS'],
      cartes[tabId[9]]['valO'], cartes[tabId[9]]['valE'], "rouge",cartes[tabId[9]]['source']); //  => créer une carte

    tabCartes = [carte1, carte2, carte3, carte4, carte5, carte6, carte7, carte8, carte9, carte10];

    for (var i = 0; i < 10; i++) {
      if (i < 5) {
        valeurJ1 = valeurJ1 + tabCartes[i].donneValE() + tabCartes[i].donneValS() + tabCartes[i].donneValO() + tabCartes[i].donneValN();
      } else {
        valeurJ2 = valeurJ2 + tabCartes[i].donneValE() + tabCartes[i].donneValS() + tabCartes[i].donneValO() + tabCartes[i].donneValN();
      }
    }
  } while (Math.abs(valeurJ2 - valeurJ1) > equilibre);

  console.log(valeurJ1);
  console.log(valeurJ2);

  //afficher les cartes sur le tableau de jeu
  var tabElement = [10];
  for (let i = 0; i < 10; i++) {
    if (i < 5) {
      tabElement[i] = document.getElementById("drag" + (i + 1));
      tabElement[i].setAttribute("src", "css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".bleue.jpg");
      tabElement[i].setAttribute("class", tabCartes[i].donneID());
    } else if (document.getElementById("IA")) {
      tabElement[i] = document.getElementById("drag" + (i + 1));
      tabElement[i].setAttribute("src", "css/cartes/"+tabCartes[i].donneSource()+"/DosDeCarte.jpg");
      tabElement[i].setAttribute("class", tabCartes[i].donneID());
    } else {
      tabElement[i] = document.getElementById("drag" + (i + 1));
      tabElement[i].setAttribute("src", "css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".rouge.jpg");
      tabElement[i].setAttribute("class", tabCartes[i].donneID());
    }
  }

  return tabCartes; // return un tableau des 10 carte au hasard;
}
