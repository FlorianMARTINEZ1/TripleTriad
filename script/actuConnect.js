$(function () {
    var donnée;
    var idGame = $("#idGame").val();
    var nom;

    $.get(
        './api/userList.php', // Le fichier cible côté serveur.
        "false",// Nous utilisons false, pour dire que nous n'envoyons pas de données.
        affichage, // Nous renseignons uniquement le nom de la fonction de retour.
        'json' // Format des données reçues.
    );
    setInterval(function () {
      $.get(
              './api/userList.php', // Le fichier cible côté serveur.
              "false",// Nous utilisons false, pour dire que nous n'envoyons pas de données.
              affichage, // Nous renseignons uniquement le nom de la fonction de retour.
              'json' // Format des données reçues.
          );
      $.get(
              './api/AttenteConfirmation.php?id='+idGame, // Le fichier cible côté serveur.
              "true",// Nous utilisons true, pour dire que nous envoyons des données.
              relocation, // Nous renseignons uniquement le nom de la fonction de retour.
              'json' // Format des données reçues.
          );
    }, 2000);

    activeLien();

    function activeLien(){
      $(".bleue").on("click",function(e) {
          e.preventDefault();
          nom = e.target.innerHTML;
          $.post(
                "./api/challenge.php",
                {
                    loginChallenger : $("#session").val(),
                    loginChallenged : nom,
                },
                function(data){
                    console.log(data);
                    if(data.search( 'Success' ) != -1){
                        alert("requete envoyé avec succés !");
                    }
                    else{
                        alert("requete non envoyé (erreur)");
                    }
                },
                "text"
            );
      });

      $(".accepte").on("click",function(e){
        e.preventDefault();
        accepter();
      });

      $(".refuse").on("click",function(e){
        e.preventDefault();
        refuser();
      });



    }

    function accepter() {
        $.post(
              "./api/accepte.php",
              {
                  id : idGame,
              },
              function(data){
                  console.log(data);
                  if(data.search( 'Success' ) != -1){
                    alert("demande accepté");
                    window.location = './?action=EnLigne&controller=game';
                  }
                  else{
                    alert("requete non envoyé (erreur)");
                  }
              },
              "text"
        );
    }

    function refuser() {
        $.post(
              "./api/refuse.php",
              {
                  id : idGame,
              },
              function(data){
                  console.log(data);
                  if(data.search( 'Success' ) != -1){
                    alert("demande refusé");
                  }
                  else{
                    alert("requete non envoyé (erreur)");
                  }
              },
              "text"
        );
    }

    function relocation(Data){
      if(Data.length!=0){
        var donnes = Data;
        if(donnes.length != 0){
          if(donnes[0]["etat"] == "accepte"){
            window.location ="./?action=EnLigne&controller=game";
          }
        }
      }
    }

  function affichage(Data) {
    var donnes = Data;
    let p = document.getElementsByTagName("p");
    let papa = document.getElementById("papa");
    let CountChild = papa.childElementCount;
    let Total = donnes.length;
    let i = 1;
    while(parseInt(""+i)<Total){
      if(donnes[i-1] && p[i]){
        if(document.getElementById("session") && donnes[i-1]['login']==document.getElementById("session").value&&donnes[i-1]['joue']&&donnes[i-1]['challenged']==donnes[i-1]['login']){
          p[i].innerHTML = 'Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='+donnes[i-1]['login']+'">'+donnes[i-1]['login']+'</a> est connecté ! (c\'est vous) et vous êtes invité dans une partie par <strong style="color:red;"> '+donnes[i-1]["challenger"]+'</strong>)! -- <a style="color:blue;" href="#" class="accepte"> Accepter ? </a> --<a style="color:red" href="#" class="refuse"> Refuser ?</a>';
          idGame=donnes[i-1]['joue'];
          document.getElementById("idGame").value=donnes[i-1]['joue'];
        }
        else if(document.getElementById("session") && donnes[i-1]['login']==document.getElementById("session").value){
          p[i].innerHTML = 'Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='+donnes[i-1]['login']+'">'+donnes[i-1]['login']+'</a> est connecté ! (c\'est vous)';
          if(p[i-1]){
            if(p[i].innerHTML == p[i-1].innerHTML){
              papa.removeChild(p[i]);
            }
          }
          idGame=donnes[i-1]['joue'];
          document.getElementById("idGame").value=donnes[i-1]['joue'];
        }
        else if(donnes[i-1]['joue']&&donnes[i-1]['challenged']==donnes[i-1]['login']){
          p[i].innerHTML = 'Utilisateur de login <a style="color:red;" href="#">'+donnes[i-1]['login']+'</a> est connecté ( il est invité dans une partie par <a style="color:red;" href="#"> '+donnes[i-1]["challenger"]+'</a>)!';
        }
        else if(donnes[i-1]['joue']){
          p[i].innerHTML = 'Utilisateur de login <a style="color:red;" href="#">'+donnes[i-1]['login']+'</a> est connecté !';
        }
        else{
          p[i].innerHTML = 'Utilisateur de login <a class="bleue" style="color:blue;" href="#">'+donnes[i-1]['login']+'</a> est connecté !';
        }
      }
      else{
        var newP = document.createElement("p");
        if(document.getElementById("session") && donnes[i-1]['login']==document.getElementById("session").value&&donnes[i-1]['joue']&&donnes[i-1]['challenged']==donnes[i-1]['login']){
              newP.innerHTML = 'Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='+donnes[i-1]['login']+'">'+donnes[i-1]['login']+'</a> est connecté ! (c\'est vous) et vous êtes invité dans une partie par <strong style="color:red;"> '+donnes[i-1]["challenger"]+'</strong>)! -- <a style="color:blue;" href="#" onclick="accepter()"> Accepter ? </a> --<a style="color:red" href="#" onclick="refuse()"> Refuser ?</a>';
            idGame=donnes[i-1]['joue'];
        }
        else if(document.getElementById("session") && donnes[i-1]['login']==document.getElementById("session").value){
          newP.innerHTML = 'Utilisateur de login <a style="color:green;" href="./index.php?action=read&controller=joueur&login='+donnes[i-1]['login']+'">'+donnes[i-1]['login']+'</a> est connecté ! (c\'est vous)';
        }
        else if(donnes[i-1]['joue']&&donnes[i-1]['challenged']==donnes[i-1]['login']){
            newP.innerHTML = 'Utilisateur de login <a style="color:red;" href="#">'+donnes[i-1]['login']+'</a> est connecté ( il est invité dans une partie par <a style="color:red;" href="#"> '+donnes[i-1]["challenger"]+'</a>)!';
        }

        else if(donnes[i-1]['joue']){
          newP.innerHTML = 'Utilisateur de login <a style="color:red;" href="#">'+donnes[i-1]["login"]+'</a> est connecté ! ';

        }
        else{
          newP.innerHTML = 'Utilisateur de login <a class="bleue" style="color:blue;" href="#">'+donnes[i-1]["login"]+'</a> est connecté ! ';
        }
        papa.appendChild(newP);
      }
      i=parseInt(""+i)+1;
    }
    console.log("total "+Total);
    console.log("CountChild "+CountChild);
    if(Total<CountChild){
      let nbr = CountChild - Total;
      while(nbr != 0 ){
          papa.removeChild(papa.lastChild);
          nbr--;
      }
    }
    i=0;
    activeLien();
  }


});
