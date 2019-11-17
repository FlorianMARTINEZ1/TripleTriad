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
    setTimeout(function(){
        createGame(1);
    },1000);
  }

}


function afficherRejoindre(){
  let panneau = document.getElementById("marquer");
  if(panneau.style.display == "block"){
    panneau.style.display = "none";
  }else{
    panneau.style.display = "block";
    document.getElementById("panneau").style.display="none";
  }
}
