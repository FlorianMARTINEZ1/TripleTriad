var donnée;



 function  request(callback){
  var xhr = new XMLHttpRequest(); // créer une requête HTTP

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
      donnée = callback(xhr.responseText); // on récupère les données.
    }
  };

  xhr.open("GET", "api/userList.php", true); // on les cherche dans le fichier php/test.php
  xhr.send(null);
}

function readData(sData) {
  var donnes = JSON.parse(sData);
  let p = document.getElementsByTagName("p");
  let papa = document.getElementsByClassName("card-panel")[0];
  let CountChild = papa.childElementCount;
  let Total = donnes.length;
  let i = 0;
  while(parseInt(""+i)<Total){
    if(donnes[i] && p[i]){
      if(donnes[i]['joue']){
                p[i].innerHTML = 'Utilisateur de login <a style="color:red;" href="">'+donnes[i]['login']+'</a> est connecté !';
      }
      else{
        p[i].innerHTML = 'Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='+donnes[i]['login']+'">'+donnes[i]['login']+'</a> est connecté !';
      }
    }
    else{
      var newP = document.createElement("p");
      if(donnes[i]['joue']){
        newP.innerHTML = 'Utilisateur de login <a style="color:red;" href="#">'+donnes[i]["login"]+'</a> est connecté ! ';

      }
      else{
        newP.innerHTML = 'Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='+donnes[i]["login"]+'">'+donnes[i]["login"]+'</a> est connecté ! ';
      }
      papa.appendChild(newP);
    }
    i=parseInt(""+i)+1;
  }
  if(Total<CountChild){
    let nbr = CountChild - Total;
    while(nbr != 0 ){
        papa.removeChild(papa.firstChild);
        nbr--;
    }
  }
  i=0;


}
function actu(){
  setInterval(function(){ actualiser() },2000);
}

function actualiser() {
  request(readData);
}
