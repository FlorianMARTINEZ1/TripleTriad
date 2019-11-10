function deconnecte(etat) {
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
//*window.unload =deconnecte(1);*/

window.onbeforeunload = function()
{
    // Un petit script
    // ...
    deconnecte(1);
    if(document.getElementById("footer")){

    }else{
    return "vous allez être rediriger";
   }

    // Pour proposer de ne pas quitter la page

}
