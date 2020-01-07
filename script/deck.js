$(function() {

    var suppr = $(".delete");
    var menu = $("#menu");
    var back = $("#backgrndmenu");
    var lien;

    suppr.on("click", function(ev) {
        ev.preventDefault();
        menu.toggleClass("ma-transition");
        menu.css({ color: "white", height: "0%", "margin-left": "0%", "margin-top": "8%" });
        lien = $(this).attr("href");
        $("#oui").attr({ "href": lien }); // on met le lien dans le oui 
    })

    $("#non").on("click", function(ev) {
        ev.preventDefault();
        menu.toggleClass("ma-transition");
    })

});