
function initMyTemplate() {
	console.log("Init main.js");
}

initMyTemplate();

// Initialisation des fonctions
window.onscroll = function () {
	checkOnScroll();
};

// Menu mobile const
const toggleMenu = document.getElementById("toggleMenu");
const dropdownNav = document.getElementById("menu-wrapper-mobile");
const menuLinks = document.querySelectorAll(".menu-item");
const socialPictos = document.querySelectorAll(".social-picto");

// Search form
const searchToggle = document.getElementById("show-searchform");
const searchForm = document.getElementById("search-form");

// Search Form
searchToggle.addEventListener("click", function () {
	console.log('Clic sur la loupe');
	if (!searchForm.classList.contains("show-search")) {
		gsap.to(searchForm, { duration: 0.3, ease: "power1.out", right: 0 });
		searchForm.classList.add("show-search");
	} else {
		gsap.to(searchForm, { duration: 0.3, ease: "power1.out", right: "-200%" });
		searchForm.classList.remove("show-search");
	}
});

// Language switcher const
// const languageToggles = document.querySelectorAll('.js-language-toggle');
// const languageDropdown = document.querySelector('#bc-language-switcher');

function toggleDropdownNav() {
	toggleMenu.classList.toggle("active-toggle");
	if (!dropdownNav.classList.contains("show-menu")) {
		gsap.to(dropdownNav, { duration: 0.3, ease: "power1.out", right: 0 });
		dropdownNav.classList.add("show-menu");
	} else {
		gsap.to(dropdownNav, { duration: 0.3, ease: "power1.out", right: "-200%" });
		dropdownNav.classList.remove("show-menu");
	}
}

// Menu mobile
toggleMenu.addEventListener("click", function () {
	console.log("on click");
	toggleDropdownNav();
});

// On Scroll
const myNav = document.querySelector("#main-navigation");
const toggleMenuWrapper = document.querySelector("#toggle-menu-wrapper");
const navLogo = document.querySelector("#nav-logo");

const addStickyArray = [myNav, toggleMenuWrapper, navLogo];

const activateAtY = 50;

function checkOnScroll() {
	if (
		document.body.scrollTop > activateAtY ||
		document.documentElement.scrollTop > activateAtY
	) {
		addSticky();
	} else {
		removeSticky();
	}
}

function addSticky() {
	addStickyArray.forEach((item) => {
		if (!item.classList.contains("sticky")) {
			item.classList.add("sticky");
		}
	});
	socialPictos.forEach((picto) => {
		if (!picto.classList.contains("sticky")) {
			picto.classList.add("sticky");
		}
	});
}

function removeSticky() {
	addStickyArray.forEach((item) => {
		if (item.classList.contains("sticky")) {
			item.classList.remove("sticky");
		}
	});
	socialPictos.forEach((picto) => {
		if (picto.classList.contains("sticky")) {
			picto.classList.remove("sticky");
		}
	});
}

// Language switcher

// if (languageDropdown) {
// 	languageDropdown.addEventListener('click', function(e) {
// 		console.log('Clic sur un le switcher');
// 		if (languageDropdown.classList.contains('langOpened')) {
// 			languageDropdown.classList.remove('langOpened');
// 		} else {
// 			languageDropdown.classList.add('langOpened');
// 		}
// 	});
// }

// if (languageToggles) {
// 	languageToggles.forEach(function(toggle) {
// 		toggle.addEventListener('click', function(e) {
// 			console.log('Clic sur un drapeau');
// 			// e.preventDefault();
// 			languageDropdown.classList.remove('langOpened');
// 		});
// 	});
// }
