$(function () {
    var local = $("#local");
    var iA = $("#IA");
    var multi = $("#Multijoueur");
    var titre = $("#titre");
    var lienpartie;
    var classemode;
    var anciendeck;
    var nomMode;
    var tabDeck = [$(".deck").length];
    $(".deck").each(function(index){
      tabDeck[index] = $(this).attr("href");
    });

    $('<div />').attr({
      id : "retour",
    }).html('<a href="#" style="color : white"><i class="material-icons">keyboard_backspace </i></a>').appendTo($(".regle"));

    var retour = $("#retour");

    function anime(elem1,elem2){
      elem1.animate({'opacity': 0}, 500, function () {
        elem1.css({display : "none", opacity : "1"});
        elem2.css({display : "block", opacity : "0"}).animate({'opacity': 1}, 500);
      });
    }

    function retourAppartion(){
      retour.css({display : "block",opacity : "0"}).animate({'opacity': 1}, 500);
    }

    local.on("click",function(e){
      e.preventDefault();
      if( $(".noneLocal").css("display") == "none"){
        anime($(".row:first"), $(".noneLocal"));
        retourAppartion()
      }
    });

    iA.on("click",function(e){
      e.preventDefault();
      if( $(".noneIA").css("display") == "none"){
        anime($(".row:first"), $(".noneIA"));
        retourAppartion()
      }
    });

    multi.on("click",function(e){
      e.preventDefault();
      if( $(".noneMulti").css("display") == "none"){
        anime($(".row:first"), $(".noneMulti"));
        retourAppartion()
      }
    });




    $(".mode").on("click",function(e){
      e.preventDefault();
      nomMode = $(this).text();
      titre.animate({'opacity': 0}, 500, function () {
          $(this).text('Choix du deck pour le mode de jeux : '+nomMode);
      }).animate({'opacity': 1}, 500);
      lienpartie = $(this).attr('href');
      $(".deck").each(function(index){
        $(this).attr({
          href : lienpartie+tabDeck[index]
        })
      });
      classemode = $(this).attr('class');
      if(classemode.indexOf("IA") != -1){
        classemode = ".noneIA";
        anime($(".noneIA"), $(".decknone:first"));
      }
      else{
        classemode = ".noneLocal";
        anime($(".noneLocal"), $(".decknone:first"));
      }
    });

    retour.on("click",function(e){
      e.preventDefault();
      if($(".decknone:first").css("display") == "block"){
          anime($(".decknone:first"), $(classemode));
          titre.animate({'opacity': 0}, 500, function () {
              $(this).text('Mode de jeux');
          }).animate({'opacity': 1}, 500);
      }
      else {
        if($(".noneLocal").css("display") == "block"){
            anime($(".noneLocal"), $(".row:first"));
        }
        if($(".noneIA").css("display") == "block"){
            anime($(".noneIA"), $(".row:first"));
        }
        if($(".noneMulti").css("display") == "block"){
            anime($(".noneMulti"), $(".row:first"));
        }
        retour.animate({'opacity': 0}, 500, function () {retour.css({display : "none", opacity : "1"});});
      }
    });

});
