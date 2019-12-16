function getProd(value){
  var recherche = document.getElementById("search").value.toLowerCase();
  var joueurs = document.querySelectorAll('.joueur');
  Array.prototype.forEach.call(joueurs, function(joueur) {
    // On a bien trouvé les termes de recherche.

      if(recherche.length <= 1){ // pas assez d'élément pour la recherche (~1 caractère)
        joueur.style.display = 'none';
      }
      else if (joueur.id.toLowerCase().indexOf(recherche) > -1) { // si il y a plus de caractère on affiche les joueurs correspondant aux caractères
        joueur.style.display = 'block';
        
      } else {
        joueur.style.display = 'none';
      }

  });
}
