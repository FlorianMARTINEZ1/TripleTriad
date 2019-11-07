// On renvoie un entier aléatoire entre une valeur min (incluse)
// et une valeur max (incluse).
// Attention : si on utilisait Math.round(), on aurait une distribution
// non uniforme !
var allCards;

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

  var carte1 = new Card(parseInt(cartes[0]['id']),cartes[0]['nomCarte'], cartes[0]['valN'], cartes[0]['valS'],
    cartes[0]['valO'], cartes[0]['valE'], "bleue"); //  => créer une carte
  var carte2 = new Card(parseInt(cartes[1]['id']),cartes[1]['nomCarte'], cartes[1]['valN'], cartes[1]['valS'],
    cartes[1]['valO'], cartes[1]['valE'], "bleue"); //  => créer une carte
  var carte3 = new Card(parseInt(cartes[2]['id']),cartes[2]['nomCarte'], cartes[2]['valN'], cartes[2]['valS'],
    cartes[2]['valO'], cartes[2]['valE'], "bleue"); //  => créer une carte
  var carte4 = new Card(parseInt(cartes[3]['id']),cartes[3]['nomCarte'], cartes[3]['valN'], cartes[3]['valS'],
    cartes[3]['valO'], cartes[3]['valE'], "bleue"); //  => créer une carte
  var carte5 = new Card(parseInt(cartes[4]['id']),cartes[4]['nomCarte'], cartes[4]['valN'], cartes[4]['valS'],
    cartes[4]['valO'], cartes[4]['valE'], "bleue"); //  => créer une carte
  var carte6 = new Card(parseInt(cartes[5]['id']),cartes[5]['nomCarte'], cartes[5]['valN'], cartes[5]['valS'],
    cartes[5]['valO'], cartes[5]['valE'], "rouge"); //  => créer une carte
  var carte7 = new Card(parseInt(cartes[6]['id']),cartes[6]['nomCarte'], cartes[6]['valN'], cartes[6]['valS'],
    cartes[6]['valO'], cartes[6]['valE'], "rouge"); //  => créer une carte
  var carte8 = new Card(parseInt(cartes[7]['id']),cartes[7]['nomCarte'], cartes[7]['valN'], cartes[7]['valS'],
    cartes[7]['valO'], cartes[7]['valE'], "rouge"); //  => créer une carte
  var carte9 = new Card(parseInt(cartes[8]['id']),cartes[8]['nomCarte'], cartes[8]['valN'], cartes[8]['valS'],
    cartes[8]['valO'], cartes[8]['valE'], "rouge"); //  => créer une carte
  var carte10 = new Card(parseInt(cartes[9]['id']),cartes[9]['nomCarte'], cartes[9]['valN'], cartes[9]['valS'],
    cartes[9]['valO'], cartes[9]['valE'], "rouge"); //  => créer une carte

  var tabCartes = [carte1, carte2, carte3, carte4, carte5, carte6, carte7, carte8, carte9, carte10];


  //afficher les cartes sur le tableau de jeu

  var element1 = document.getElementById("drag1");
  element1.setAttribute("src", "css/cartes/FF8/" + carte1.donneNom() + ".bleue.jpg")
  element1.setAttribute("class", carte1.donneID());
  var element2 = document.getElementById("drag2");
  element2.setAttribute("src", "css/cartes/FF8/" + carte2.donneNom() + ".bleue.jpg")
  element2.setAttribute("class", carte2.donneID());
  var element3 = document.getElementById("drag3");
  element3.setAttribute("src", "css/cartes/FF8/" + carte3.donneNom() + ".bleue.jpg")
  element3.setAttribute("class", carte3.donneID());
  var element4 = document.getElementById("drag4");
  element4.setAttribute("src", "css/cartes/FF8/" + carte4.donneNom() + ".bleue.jpg")
  element4.setAttribute("class", carte4.donneID());
  var element5 = document.getElementById("drag5");
  element5.setAttribute("src", "css/cartes/FF8/" + carte5.donneNom() + ".bleue.jpg")
  element5.setAttribute("class", carte5.donneID());
  var element6 = document.getElementById("drag6");
  element6.setAttribute("src", "css/cartes/FF8/" + carte6.donneNom() + ".rouge.jpg")
  element6.setAttribute("class", carte6.donneID());
  var element7 = document.getElementById("drag7");
  element7.setAttribute("src", "css/cartes/FF8/" + carte7.donneNom() + ".rouge.jpg")
  element7.setAttribute("class", carte7.donneID());
  var element8 = document.getElementById("drag8");
  element8.setAttribute("src", "css/cartes/FF8/" + carte8.donneNom() + ".rouge.jpg")
  element8.setAttribute("class", carte8.donneID());
  var element9 = document.getElementById("drag9");
  element9.setAttribute("src", "css/cartes/FF8/" + carte9.donneNom() + ".rouge.jpg")
  element9.setAttribute("class", carte9.donneID());
  var element10 = document.getElementById("drag10");
  element10.setAttribute("src", "css/cartes/FF8/" + carte10.donneNom() + ".rouge.jpg")
  element10.setAttribute("class", carte10.donneID());

  return tabCartes; // return un tableau des 10 carte au hasard;
}
