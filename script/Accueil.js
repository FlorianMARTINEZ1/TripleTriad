$(function () {
    var local = $("#local");
    var iA = $("#IA");
    var multi = $("#Multijoueur");
    var lienpartie;
    var classemode;
    var anciendeck;
    var tabDeck = [$(".deck").length];
    $(".deck").each(function(index){
      tabDeck[index] = $(this).attr("href");
    });

    $('<div />').attr({
      id : "retour",
    }).html('<a href="#" style="color : white"><i class="material-icons">keyboard_backspace </i></a>').appendTo($(".regle"));

    var retour = $("#retour");

    local.on("click",function(e){
      e.preventDefault();
      if( $(".noneLocal").css("display") == "none"){
        $(".noneLocal").css({display : "block"});
        $(".row:first").css({display : "none"});
        retour.css({display : "block"});
      }
    });

    iA.on("click",function(e){
      e.preventDefault();
      if( $(".noneIA").css("display") == "none"){
        $(".noneIA").css({display : "block"});
        $(".row:first").css({display : "none"});
        retour.css({display : "block"});
      }
    });

    multi.on("click",function(e){
      e.preventDefault();
      if( $(".noneMulti").css("display") == "none"){
        $(".noneMulti").css({display : "block"});
        $(".row:first").css({display : "none"});
        retour.css({display : "block"});
      }
    });




    $(".mode").on("click",function(e){
      e.preventDefault();
      lienpartie = $(this).attr('href');
      $(".deck").each(function(index){
        $(this).attr({
          href : lienpartie+tabDeck[index]
        })
      });
      classemode = $(this).attr('class');
      if(classemode.indexOf("IA") != -1){
        classemode = ".noneIA";
      }
      else{
        classemode = ".noneLocal";
      }
      $(".noneIA, .noneLocal").css({display : "none"});
      $(".decknone:first").css({display : "block"});
    });

    retour.on("click",function(e){
      e.preventDefault();
      if($(".decknone:first").css("display") == "block"){
          $(".decknone:first").css({display : "none"});
          $(classemode).css({display : "block"});
      }
      else {
        if($(".noneLocal").css("display") == "block"){
            $(".noneLocal").css({display : "none"});
        }
        if($(".noneIA").css("display") == "block"){
            $(".noneIA").css({display : "none"});
        }
        if($(".noneMulti").css("display") == "block"){
            $(".noneMulti").css({display : "none"});
        }
        retour.css({display : "none"});
        $(".row:first").css({display : "block"});
      }
    });

});
