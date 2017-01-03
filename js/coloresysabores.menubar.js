function collapseMenubar() {
    if ($("#menubar").offset().top > 50) {
        $("#menubar").addClass('navbar-custom');
    } else {
        $("#menubar").removeClass('navbar-custom');
    }
}

$(window).scroll(collapseMenubar);
$(document).ready(function(){
    $(".navbar-nav li a").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
  collapseMenubar();
 $(".y").css("color", "#D4145A");
 $(".y").css("font-size", "55px");
});