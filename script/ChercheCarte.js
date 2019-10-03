function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}

function request(callback)
        {
            var xhr = new XMLHttpRequest(); // créer une requête HTTP

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
                    callback(xhr.responseText); // on récupère les données.
                }
            };

            xhr.open("GET", "php/test.php", true); // on les cherche dans le fichier php/test.php
            xhr.send(null);
        }

function readData(sData)
{
   var cartes = JSON.parse(sData);
   var tabId = [];

   for (var i = 0; i < 10; i++) {
     tabId.push(getRandomIntInclusive(0,112));// choisie une carte entre 0 et 112
   }

   let carte1 = new Card(cartes[0]['nomCarte'],cartes[0]['valN'],cartes[0]['valS'],
   cartes[0]['valO'],cartes[0]['valE']);//  => créer une carte
   let carte2 = new Card(cartes[1]['nomCarte'],cartes[1]['valN'],cartes[1]['valS'],
   cartes[1]['valO'],cartes[1]['valE']);//  => créer une carte
   let carte3 = new Card(cartes[2]['nomCarte'],cartes[2]['valN'],cartes[2]['valS'],
   cartes[2]['valO'],cartes[2]['valE']);//  => créer une carte
   let carte4 = new Card(cartes[3]['nomCarte'],cartes[3]['valN'],cartes[3]['valS'],
   cartes[3]['valO'],cartes[3]['valE']);//  => créer une carte
   let carte5 = new Card(cartes[4]['nomCarte'],cartes[4]['valN'],cartes[4]['valS'],
   cartes[4]['valO'],cartes[4]['valE']);//  => créer une carte
   let carte6 = new Card(cartes[5]['nomCarte'],cartes[5]['valN'],cartes[5]['valS'],
   cartes[5]['valO'],cartes[5]['valE']);//  => créer une carte
   let carte7 = new Card(cartes[6]['nomCarte'],cartes[6]['valN'],cartes[6]['valS'],
   cartes[6]['valO'],cartes[6]['valE']);//  => créer une carte
   let carte8 = new Card(cartes[7]['nomCarte'],cartes[7]['valN'],cartes[7]['valS'],
   cartes[7]['valO'],cartes[7]['valE']);//  => créer une carte
   let carte9 = new Card(cartes[8]['nomCarte'],cartes[8]['valN'],cartes[8]['valS'],
   cartes[8]['valO'],cartes[8]['valE']);//  => créer une carte
   let carte10 = new Card(cartes[9]['nomCarte'],cartes[9]['valN'],cartes[9]['valS'],
   cartes[9]['valO'],cartes[9]['valE']);//  => créer une carte

   let tabCartes = [carte1,carte2,carte3,carte4,carte5,carte6,carte7,carte8,carte9,carte10];


   return tabCartes; // return un tableau des 10 carte au hasard;
}
