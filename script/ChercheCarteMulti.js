// On renvoie un entier aléatoire entre une valeur min (incluse)
// et une valeur max (incluse).
// Attention : si on utilisait Math.round(), on aurait une distribution
// non uniforme !
var allCards;
var tabCartes;

function request(callback) {
  var xhr = new XMLHttpRequest(); // créer une requête HTTP

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
      allCards = callback(xhr.responseText); // on récupère les données.
    }
  };
  let id = parseInt(document.getElementById("id").innerHTML);
  xhr.open("GET", "api/recieveCartes.php?id="+id, true); // on les cherche dans le fichier php/test.php
  xhr.send(null);
}

function readData(sData) {
  var cartes = JSON.parse(sData);

  let currentP = parseInt(document.getElementById("choix").innerHTML);
  /*var carte1 , carte2 , carte3, carte4, carte5, carte6, carte7, carte8, carte9, carte10 ;*/

  tabCartes = [10];
  for(let i=0;i<10;i++){
    if(i<5){
      tabCartes[i] = new Card(parseInt(cartes[i]['id']),cartes[i]['nomCarte'], cartes[i]['valN'], cartes[i]['valS'],cartes[i]['valO'], cartes[i]['valE'], "bleue"); //  => créer une carte
    }
    else{
      tabCartes[i] = new Card(parseInt(cartes[i]['id']),cartes[i]['nomCarte'], cartes[i]['valN'], cartes[i]['valS'],cartes[i]['valO'], cartes[i]['valE'], "rouge"); //  => créer une carte
    }
  }

  if(currentP == 1){
    for(let i=0;i<10;i++){
      if(i<5){
        tabCartes[i].couleur = "rouge";
      }
      else{
        tabCartes[i].couleur = "bleue";
      }
    }
  }


  //afficher les cartes sur le tableau de jeu
  var tabElement = [10];
  for(let i=0;i<10;i++){
      if(i<5 && currentP == 0){
        tabElement[i] = document.getElementById("drag"+(i+1));
        tabElement[i].setAttribute("src","css/cartes/FF8/" + tabCartes[i].donneNom() + ".bleue.jpg");
        tabElement[i].setAttribute("class", tabCartes[i].donneID());
      }
      else if(i<5 && currentP == 1){
        tabElement[i] = document.getElementById("drag"+(i+6));
        tabElement[i].setAttribute("src","css/cartes/FF8/" + tabCartes[i].donneNom() + ".bleue.jpg");
        tabElement[i].setAttribute("class", tabCartes[i].donneID());
      }
      else if(i<10 && currentP == 0){
        tabElement[i] = document.getElementById("drag"+(i+1));
        tabElement[i].setAttribute("src","css/cartes/FF8/DosDeCarte.jpg");
        tabElement[i].setAttribute("class", tabCartes[i].donneID());
      }
      else{
        tabElement[i] = document.getElementById("drag"+(i-4));
        tabElement[i].setAttribute("src","css/cartes/FF8/" + tabCartes[i].donneNom() + ".bleue.jpg");
        tabElement[i].setAttribute("class", tabCartes[i].donneID());
      }

  }

  if(currentP == 1){
    for(let i=0;i<10;i++){
      if(i<5){
        tabElement[i].setAttribute("src","css/cartes/FF8/DosDeCarte.jpg");
      }
      else{
        tabElement[i].setAttribute("src","css/cartes/FF8/" + tabCartes[i].donneNom() + ".bleue.jpg");
      }
    }
  }

  return tabCartes; // return un tableau des 10 carte au hasard;
}
