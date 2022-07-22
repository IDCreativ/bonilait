var images = document.querySelectorAll(".big-item");
var thumbs = document.querySelectorAll(".thumb-item");

thumbs.forEach((element) => {
	element.addEventListener("click", function (e) {
		currentSlide(element.dataset.thumb);
        thumbs.forEach((element) => {
            element.classList.remove("active");
        });
        element.classList.add("active");
	});
});

function currentSlide(n) {
	showSlides((slideIndex = n));
}

function showSlides(n) {
	console.log('On affiche l\'image "' + n + '"');

    images.forEach((element) => {
        element.classList.remove('active');
        if (element.dataset.image == n) {
            element.classList.add('active');
        }
    });
}
