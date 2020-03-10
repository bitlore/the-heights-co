/*
Custom Functionality for The Heights Theme
*/



window.onscroll = function() { myFunction() };

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

=
function myFunction() {
  if (window.pageYOffset >= sticky && window.innerWidth < 768 ) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}


jQuery('#mobile-menu-button').on('click', function() {
    jQuery('#main-nav').toggleClass('open');
});
