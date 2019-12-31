var allCards; // tous les cartes du deck choisie
var tabCartes = [10]; // tableaux des 10 cartes

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
  if(multi){ // si le jeu est en mutlijoueur
    let id = parseInt(document.getElementById("id").innerHTML);
    xhr.open("GET", "api/recieveCartes.php?id="+id, true); // on les cherche dans le fichier api/recieveCartes.php
  }
  else{
    let deck = document.getElementById("deck");
    xhr.open("GET", "api/recieveCartes.php?deck="+deck.innerHTML, true); // on les cherche dans le fichier api/recieveCartes.php
  }
  xhr.send(null);
}

function findCard(carteJoue) { // permet de retrouver une carte

  for (var i = 0; i < allCards.length; i++) {
    if (allCards[i].donneID() === Number(carteJoue)) {
      return allCards[i];
    }
  }
}

function readData(sData) { // initalise les cartes pour le jeu
  var cartes = JSON.parse(sData);
  allCards = cartes;

  let valeurJ1 = 0;
  let valeurJ2 = 0;
  let currentP;

  do {
    var tabId = [];
    if(multi){
      currentP = parseInt(document.getElementById("choix").innerHTML);
      console.log("test = "+currentP)
    }
    valeurJ1 = 0;
    valeurJ2 = 0;
    if(!multi){
      for (var i = 0; i < 10; i++) {
          tabId.push(getRandomIntInclusive(0, cartes.length-1)); // choisie une carte entre 0 et la taille de toutes les cartes
      }
    }
    for(let i=0;i<10;i++){
      if(i<5){
        if(multi){ // JEU MULTI
          tabCartes[i] = new Card(parseInt(cartes[i]['id']),cartes[i]['nomCarte'], cartes[i]['valN'], cartes[i]['valS'],cartes[i]['valO'], cartes[i]['valE'], "bleue", cartes[i]["source"]); //  => créer une carte bleue
        }
        else{
          tabCartes[i] = new Card(parseInt(cartes[tabId[i]]['id']),cartes[tabId[i]]['nomCarte'],cartes[tabId[i]]['valN'],cartes[tabId[i]]['valS'],cartes[tabId[i]]['valO'],cartes[tabId[i]]['valE'],"bleue",cartes[tabId[i]]['source']); //  => créer une carte
        }
      }
      else{
        if(multi){ // JEU MULTI
          tabCartes[i] = new Card(parseInt(cartes[i]['id']),cartes[i]['nomCarte'], cartes[i]['valN'], cartes[i]['valS'],cartes[i]['valO'], cartes[i]['valE'], "rouge",cartes[i]["source"]); //  => créer une carte bleue
        }
        else{
          tabCartes[i] = new Card(parseInt(cartes[tabId[i]]['id']), cartes[tabId[i]]['nomCarte'], cartes[tabId[i]]['valN'], cartes[tabId[i]]['valS'],cartes[tabId[i]]['valO'], cartes[tabId[i]]['valE'], "rouge",cartes[tabId[i]]['source']); //  => créer une carte
        }
      }
    }

    for (var i = 0; i < 10; i++) {
      if (i < 5) {
        valeurJ1 = valeurJ1 + tabCartes[i].donneValE() + tabCartes[i].donneValS() + tabCartes[i].donneValO() + tabCartes[i].donneValN();
      } else {
        valeurJ2 = valeurJ2 + tabCartes[i].donneValE() + tabCartes[i].donneValS() + tabCartes[i].donneValO() + tabCartes[i].donneValN();
      }
    }

  } while (Math.abs(valeurJ2 - valeurJ1) > equilibre && !multi);

  if(multi && currentP == 1){ // JEU MULTI
    for(let i=0;i<10;i++){
      if(i<5){
        tabCartes[i].couleur = "rouge";
      }
      else{
        tabCartes[i].couleur = "bleue";
      }
    }
  }

  console.log(valeurJ1);
  console.log(valeurJ2);


  //afficher les cartes sur le tableau de jeu
  var tabElement = [10];
  for (let i = 0; i < 10; i++) {
    if (i < 5) { // PREMIERE PARTIE = DECK J1
      if(multi){ // JEU MULTI
        if(currentP == 1){
          tabElement[i] = document.getElementById("drag"+(i+6));
          tabElement[i].setAttribute("src","css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".bleue.jpg");
          tabElement[i].setAttribute("class", tabCartes[i].donneID());
        }
        else{
          tabElement[i] = document.getElementById("drag"+(i+1));
          tabElement[i].setAttribute("src","css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".bleue.jpg");
          tabElement[i].setAttribute("class", tabCartes[i].donneID());
        }
      }
      else{ // JEU IA/LOCAL
        tabElement[i] = document.getElementById("drag" + (i + 1));
        tabElement[i].setAttribute("src", "css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".bleue.jpg");
        tabElement[i].setAttribute("class", tabCartes[i].donneID());
      }
    }
    else if (document.getElementById("IA")) { // // DEUXIEME PARTIE = DECK IA
      tabElement[i] = document.getElementById("drag" + (i + 1));
      tabElement[i].setAttribute("src", "css/cartes/"+tabCartes[i].donneSource()+"/DosDeCarte.jpg");
      tabElement[i].setAttribute("class", tabCartes[i].donneID());
    }
    else { // DEUXIEME PARTIE = DECK J2
      if(multi){ // JEU MULTI
        console.log(currentP);
        console.log(" currenP == 1 ? : "+currentP==1);
        if(currentP == 1){
          console.log("je suis pas rentrer mdr");
          tabElement[i] = document.getElementById("drag"+(i-4));
          tabElement[i].setAttribute("src","css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".bleue.jpg");
          tabElement[i].setAttribute("class", tabCartes[i].donneID());
        }
        else{
          tabElement[i] = document.getElementById("drag"+(i+1));
          tabElement[i].setAttribute("src","css/cartes/"+tabCartes[i].donneSource()+"/DosDeCarte.jpg");
          tabElement[i].setAttribute("class", tabCartes[i].donneID());
        }
      }
      else{ // JEU LOCAL
        tabElement[i] = document.getElementById("drag" + (i + 1));
        tabElement[i].setAttribute("src", "css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".rouge.jpg");
        tabElement[i].setAttribute("class", tabCartes[i].donneID());
      }
    }
  }

  if(multi && currentP == 1){
      for(let i=0;i<10;i++){
        if(i<5){
          tabElement[i].setAttribute("src","css/cartes/"+tabCartes[i].donneSource()+"/DosDeCarte.jpg");
        }
        else{
          tabElement[i].setAttribute("src","css/cartes/"+tabCartes[i].donneSource()+"/" + tabCartes[i].donneNom() + ".bleue.jpg");
        }
      }
  }

  return tabCartes; // return un tableau des 10 carte au hasard;
}
