function request(callback)
        {
            var xhr = new XMLHttpRequest(); // créer une requête HTTP

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne
                    callback(xhr.responseText); // on récupère les données.
                }
            };

            xhr.open("GET", "php/test.php", true); // on les cherche dans le fichier php/test.php
            xhr.send(null);
        }

function readData(sData)
{
   var cartes = JSON.parse(sData);
   /*

   FAIRE LE CHOIX DES 10 CARTES ICI AVEC MATH.RANDOM




   */
   let carte1 = new Card(cartes[0]['nomCarte'],cartes[0]['valN'],cartes[0]['valS'],
   cartes[0]['valO'],cartes[0]['valE']);//  => créer une carte


   return cartes; // return un tableau des 10 carte au hasard;
}
