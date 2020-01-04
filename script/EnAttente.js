var sec = 0;
var min = 0;
var nbr = 0;
var challenger = "";

function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

setInterval(function() {
    getJoueurInFileDattente(lectureDonnee);
    ++sec;
    if (sec == 60) {
        sec = 0;
        ++min;
    }
    if (min == 0) {
        document.getElementById("h4").innerHTML = "Temps d'attente ... " + sec + " sec.";
    } else if (min == 1) {
        document.getElementById("h4").innerHTML = "Temps d'attente ... " + min + " minute et " + sec + " sec.";
    } else {
        document.getElementById("h4").innerHTML = "Temps d'attente ... " + min + " minutes et " + sec + " sec.";
    }
}, 1000);

function accepte(callback) {
    var xhr = new XMLHttpRequest(); // créer une requête HTTP

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
            donnée = callback(xhr.responseText); // on récupère les données.
        }
    };
    xhr.open("GET", "api/accepte.php?log=" + document.getElementById("joueurActu").innerHTML, true); // on les cherche dans le fichier php/test.php
    xhr.send(null);
}

function quitteFile(etat) {
    var xhr = new XMLHttpRequest(); // créer une requête HTTP

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
        }
    };
    xhr.open("GET", "./index.php?action=quitteFile&controller=joueur", true); // on les cherche dans le fichier php/test.php
    xhr.send(null);
}


function getJoueurInFileDattente(callback) {
    var xhr = new XMLHttpRequest(); // créer une requête HTTP

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
            donnée = callback(xhr.responseText); // on récupère les données.
        }
    };

    xhr.open("GET", "api/joueursAttente.php", true); // on les cherche dans le fichier php/test.php
    xhr.send(null);
}

function challenge(callback) {
    var xhr = new XMLHttpRequest(); // créer une requête HTTP

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) { // Si la requete fonctionne ( renvoie un code de 200 )
            donnée = callback(xhr.responseText); // on récupère les données.
        }
    };
    let log = document.getElementById("joueurActu").innerHTML;
    let chall = document.querySelector("#papa");
    let nbrchild = chall.childElementCount;
    let tabChild = chall.children;
    let choix = getRandomIntInclusive(0, nbrchild - 1)
    if (tabChild[choix]) {
        challenger = tabChild[choix].innerHTML;
    }
    xhr.open("GET", "api/challenge.php?loginChallenger=" + challenger + "&loginChallenged=" + log, true); // on les cherche dans le fichier php/test.php
    xhr.send(null);
}

function Data(sData) {
    var game = sData;
    if (typeof game === "string") {
        if (game.length == 66 || game.length == 67 || game.length == 68) {
            console.log("demande envoyé et/ou game déjà prise");
            accepte(DataAccepte);
        } else if (game.length == 4) {
            console.log("demande envoyé à un joueur");
        } else {
            console.log("erreur");
        }
    }
}

function DataAccepte(sData) {
    var donnes = JSON.parse(sData);
    if (donnes[0]) {
        // si la partie existe
        if (donnes[0]["challenger"] == document.getElementById("joueurActu").innerHTML || donnes[0]["challenged"] == document.getElementById("joueurActu").innerHTML) {
            // si le joueur fait partie de la game accepté
            alert("Partie trouvé ! ");
            quitteFile(1);
            window.location = './?action=EnLigne';
        }
    }
}


setInterval(function() {
    challenge(Data);
}, 3000);




function lectureDonnee(sData) {
    var donnes = JSON.parse(sData);
    let papa = document.getElementById("papa");
    let CountChild = papa.childElementCount + 1;
    let p = document.querySelector("#papa div");
    let Total = donnes.length;
    document.getElementsByTagName("h5")[0].innerHTML = "Joueurs dans la file d'attente : " + Total;
    let i = 0;
    while (parseInt(i) < Total) {
        /*console.log(donnes[i]["login"]);*/
        if (p !== null) {
            if (donnes[i] && p[i] && donnes[i]['login'] != document.getElementById("joueurActu").innerHTML) {
                p[i].innerHTML = donnes[i]["login"];
            }
        } else if (donnes[i] && donnes[i]['login'] != document.getElementById("joueurActu").innerHTML) {
            var newDiv = document.createElement("div");
            newDiv.innerHTML = donnes[i]["login"];
            papa.appendChild(newDiv);
        }
        i = parseInt("" + i) + 1;
    }
    if (Total < CountChild) {
        let nbr = CountChild - Total;
        while (nbr != 0) {
            papa.removeChild(papa.lastChild);
            nbr--;
        }
    }
    if (Total >= 2) {
        challenge(Data);
    }


}