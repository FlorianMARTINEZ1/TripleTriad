function getProd(value){
  var motsRecherche = document.getElementById("search").value.toLowerCase();
  var recherches = document.querySelectorAll('.recherche');
  Array.prototype.forEach.call(recherches, function(recherche) {
    // On a bien trouvé les termes de recherche.

      if(motsRecherche.length == 0){ // pas d'entrer dans la searchbar
        recherche.style.display ='block';
      }
      else if (recherche.id.toLowerCase().indexOf(motsRecherche) > -1) { // si il y a plus de caractère on affiche les joueurs correspondant aux caractères
        recherche.style.display = 'block';

      } else {
        recherche.style.display = 'none';
      }

  });
}
