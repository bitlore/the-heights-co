/*
Custom Functionality for The Heights Theme
*/

/////////////////////////////////////
// Age Gate //
////////////////////////////////////

var ageGateOverlay = document.getElementById('age-gate-overlay');
var ageGate = document.getElementById('age-gate');


function showAgeGate() {
    if (Cookies.get('ageVerified')) {
        // do nothing
    } else {
        ageGateOverlay.classList.add('show');
        ageGate.classList.add('show');
    }
}

function hideAgeGate() {
    Cookies.set('ageVerified', 'true', { expires: 365, sameSite: 'lax' });
    ageGateOverlay.classList.add('fade-out');
    ageGate.classList.add('fade-out');
    setTimeout(function() {
        ageGateOverlay.classList.remove('show');
        ageGate.classList.remove('show');
    }, 500);
}

/////////////////////////////////////
// Mobile Menu Button Click Event //
////////////////////////////////////

var mobileMenuBtn = document.getElementById('mobile-menu-button');
var mainNav = document.getElementById('main-nav');

mobileMenuBtn.addEventListener('click', function() {
    mobileMenuBtn.classList.toggle('open');
    mainNav.classList.toggle('open');
})


////////////////////////////////////
// Sticky Nav Bar //
////////////////////////////////////


var navbar = document.getElementById("navbar");


if(document.body.classList.contains('logged-in') && window.innerWidth < 600 ) {
    var sticky = navbar.offsetTop + 92;
} else {
    var sticky = navbar.offsetTop + 46;
}


function stickNav() {
  if (window.pageYOffset >= sticky && window.innerWidth < 768 ) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}



////////////////////////////////////
// Window Events //
////////////////////////////////////

window.onscroll = function() {
	if(timer) { window.clearTimeout(timer); }

	var timer = window.setTimeout(function() {
		stickNav();
	}, 100);
};

window.onresize = function() {
	if(timer) { window.clearTimeout(timer); }

	var timer = window.setTimeout(function() {
		stickNav();
	}, 100);
};


window.onload = function() {
    showAgeGate();
    stickNav();
};
