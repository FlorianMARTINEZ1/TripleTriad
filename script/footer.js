/*function deconnecte(etat) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
    }
  };

  let login = document.getElementById("loginSession");
  xhr.open("GET", "api/Deconnexion.php?login="+login.innerHTML, true);
  xhr.send();
}

function connecte(etat) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
    }
  };

  let login = document.getElementById("loginSession");
  xhr.open("GET", "api/Connexion.php?login="+login.innerHTML, true);
  xhr.send();
}

connecte(1);
/*
window.unload = function(){

  return deconnecte(0);

}*/

  /*  function session(){
        if(document.getElementById("loginSession")){
        window.location="./index.php?action=deconnect&controller=joueur"; //page de déconnexion
      }
    }
    setTimeout("session()",10000); //ça fait bien 5min??? c'est pour le test

/*
window.onbeforeunload = function()
{
    // Un petit script
    // ...

    return deconnecte(0);

    // Pour proposer de ne pas quitter la page

}*/
