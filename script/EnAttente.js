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

setInterval(function(){
  let element = document.getElementById("back");
  if(element.classList.contains("transitionloader")){
    element.classList.remove("transitionloader");
  }else{
  element.classList.add("transitionloader");}
},5000);


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

function  challenge(callback){
 var xhr = new XMLHttpRequest(); // créer une requête HTTP

 xhr.onreadystatechange = function () {
   if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
     donnée = callback(xhr.responseText); // on récupère les données.
   }
 };
 xhr.open("GET", "api/challenge.php?loginChallenger=loginChallenged=", true); // on les cherche dans le fichier php/test.php
 xhr.send(null);
}

function Data(sData){
  var game = sData;
  /*alert("demande envoyé");*/

}




function lectureDonnee(sData) {
    var donnes = JSON.parse(sData);
    let papa = document.getElementById("papa");
    let CountChild = papa.childElementCount +1 ;
    let p = document.querySelector("#papa div");
    let Total = donnes.length;
    document.getElementsByTagName("h5")[0].innerHTML = "Joueurs dans la file d'attente : "+Total;
    let i = 0;
    while(parseInt(i)<Total){
      console.log(donnes[i]["login"]);
      if(p!==null){
        if(donnes[i] && p[i] && donnes[i]['login']!=document.getElementById("joueurActu").innerHTML){
            p[i].innerHTML = donnes[i]["login"];
        }
      }
      else if(donnes[i] && donnes[i]['login']!=document.getElementById("joueurActu").innerHTML){
        var newDiv = document.createElement("div");
        newDiv.innerHTML = donnes[i]["login"];
        papa.appendChild(newDiv);
      }
      i=parseInt(""+i)+1;
    }
    if(Total<CountChild){
      let nbr = CountChild - Total;
      while(nbr != 0 ){
          papa.removeChild(papa.lastChild);
          nbr--;
      }
    }
    if(Total>=2){
      challenge(Data);
    }


}
