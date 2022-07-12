// AOS Animations

// Fade Up
const aosFadeUp = document.querySelectorAll(".aos-fade-up");
aosFadeUp.forEach(function (element) {
	element.dataset.aos = "fade-up";
});

const initAos = () => {
	AOS.init({
		delay: 200,
		offset: -100,
		anchorPlacement: 'top-top'
	});
	console.log("AOS initialized");
};

setTimeout(initAos, 500);