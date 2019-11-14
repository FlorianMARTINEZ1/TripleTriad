var sec = 0;
var min = 0;
var nbr = 0;
setInterval(function(){
    getJoueurInFileDattente(lectureDonnee);
    ++sec;
    if(sec==60){
      sec=0;
      ++min;
    }
    if(min==0){
      document.getElementById("h4").innerHTML = "Temps d'attente ... "+sec+" sec.";
    }
    else if(min==1){
            document.getElementById("h4").innerHTML = "Temps d'attente ... "+min+" minute et "+sec+" sec.";
    }
    else{
      document.getElementById("h4").innerHTML = "Temps d'attente ... "+min+" minutes et "+sec+" sec.";
    }
}, 1000);


function  getJoueurInFileDattente(callback){
  var xhr = new XMLHttpRequest(); // créer une requête HTTP

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
      donnée = callback(xhr.responseText); // on récupère les données.
    }
  };

  xhr.open("GET", "api/joueursAttente.php", true); // on les cherche dans le fichier php/test.php
  xhr.send(null);
}


function lectureDonnee(sData) {
    var donnes = JSON.parse(sData);
    nbr = donnes[0]["nb"];
    document.getElementsByTagName("h5")[0].innerHTML = "Joueurs dans la file d'attente : "+nbr+".";
    if(nbr>=2){
      
    }


}
