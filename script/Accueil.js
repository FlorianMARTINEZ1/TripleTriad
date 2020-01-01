$(function () {
    var local = $("#local");
    var iA = $("#IA");
    var multi = $("#Multijoueur");

    $('<div type="submit" />').attr({
      id : "retour",
    }).html('<a href="#" style="color : white"><i class="material-icons">keyboard_backspace </i></a>').appendTo($(".regle"));

    var retour = $("#retour");

    local.on("click",function(e){
      e.preventDefault();
      if( $(".none:first").css("display") == "none"){
        $(".none:first").css({display : "block"});
        $(".row:first").css({display : "none"});
        retour.css({display : "block"});
      }
    });


    iA.on("click",function(e){
      e.preventDefault();
      if( $(".none:last").css("display") == "none"){
        $(".none:last").css({display : "block"});
        $(".row:first").css({display : "none"});
        retour.css({display : "block"});
      }
    });

    retour.on("click",function(e){
      e.preventDefault();
      if($(".none:first").css("display") == "block"){
          $(".none:first").css({display : "none"});
      }
      if($(".none:last").css("display") == "block"){
          $(".none:last").css({display : "none"});
      }
      retour.css({display : "none"});
      $(".row:first").css({display : "block"});

    });

});
