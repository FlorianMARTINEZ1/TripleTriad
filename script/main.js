function allowDrop(ev) {
  ev.preventDefault();
}

let j1 = new Joueur('babou');


function request(callback)
        {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                    callback(xhr.responseText);
                }
            };

            xhr.open("GET", "php/test.php", true);
            xhr.send(null);
        }

function readData(sData)
{
   var carte = JSON.parse(sData);
   let carte1 = new Card;
   for (var i = 0; i < 5; i++) {

   }
   carte1 = carte[0];
   alert(carte1);
}

request(readData);


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
