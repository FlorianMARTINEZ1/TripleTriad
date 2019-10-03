function allowDrop(ev) {
  ev.preventDefault();
}

let j1 = new Joueur('babou');


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
  /* let carte1 = new Card(carte[0]['nomCarte'],carte[0]['valN'],carte[0]['valS'],
   carte[0]['valO'],carte[0]['valE']);  => créer une carte */
   return cartes; // return un tableau de toute les carte;
}

let toutCartes = request(readData); // appelle la fonction request et reçoit toute les cartes de la BD


function drag(ev) {
  ev.dataTransfer.setData('text', ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData('text');
  var img = ev.target.appendChild(document.getElementById(data));
  ev.target.removeAttribute('ondrop');
  img.setAttribute('pointer-events', 'none');
  img.removeAttribute('draggable');
  img.removeAttribute('ondragstart');
  j1.ajouter(ev.target.classList[1]);
  console.log(j1.toString());
  j1.afficher();
}
