var donnée;

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function createGame(etat) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
    }
  };
  let log = document.getElementById("footer").innerHTML;
  let code = document.getElementById("code").innerHTML;
  xhr.open("GET", "api/createGame.php?log="+log+"&code="+code, true);
  xhr.send();
}

function joinGame(callback) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
      donnée = callback(xhr.responseText);
    }
  };
  let log = document.getElementById("footer").innerHTML;
  let code = document.getElementById("codeRentrer").value;
  xhr.open("GET", "api/joinGame.php?log="+log+"&code="+code, true);
  xhr.send();
}

function attente(callback){
  var xhr = new XMLHttpRequest(); // créer une requête HTTP

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
      donnée = callback(xhr.responseText); // on récupère les données.
    }
  };
  xhr.open("GET", "api/AttenteConfirmation.php?code="+document.getElementById("code").innerHTML, true); // on les cherche dans le fichier php/test.php
  xhr.send(null);
}

function afficherPanneau(){
  let panneau = document.getElementById("panneau");
  if(panneau.style.display == "block"){
    panneau.style.display = "none";
  }else{
    panneau.style.display = "block";
    document.getElementById("marquer").style.display="none";
    let i = 0
    let code = document.getElementById("code");
    while(i<100000){
      setTimeout(function(){
        code.innerHTML = getRandomIntInclusive(1,9999);
      },1000);
      i++;
    }
    if(document.getElementById("footer").innerHTML=="Automgen" || document.getElementById("footer").innerHTML=="automgen"){
      code.innerHTML = 4269;
    }
    setTimeout(function(){
        createGame(1);
    },1000);
  }

}

function relocation(sData){
  if(sData.length!=0){
    var donnes = JSON.parse(sData);
    if(donnes.length != 0){
      if(donnes[0]["etat"] == "accepte"){
        window.location ="./?action=EnLigne&controller=game";
    }
  }
 }
}

function envoyer(){
  joinGame(join);
}

function join(Data){
  var donnes = JSON.parse(Data);
  if(donnes == ""){
    alert("Aucune partie n'a ce code");
  }
  else{
    if(donnes[0]["etat"] == "accepte"){
      alert("Cette partie a déjà été rejointe");
    }
    else{
      setTimeout(function(){
        window.location ="./?action=EnLigne&controller=game";
      },500);
    }
  }
}

setInterval(function () {
  attente(relocation);
}, 2000);

function afficherRejoindre(){
  let panneau = document.getElementById("marquer");
  if(panneau.style.display == "block"){
    panneau.style.display = "none";
  }else{
    panneau.style.display = "block";
    document.getElementById("panneau").style.display="none";
  }
}
