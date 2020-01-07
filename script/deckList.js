$(function() {

    var decks = $(":checkbox");
    
    decks.change(function(){ // dés qu'on modifier la valeur du check
         $("."+this.id).slideToggle(); // cache/affiche
    });

});
