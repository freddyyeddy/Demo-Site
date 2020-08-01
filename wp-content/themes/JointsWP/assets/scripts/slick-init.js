(function ($) {
// Initilizing Slick  and implementing back end preview as well
	var initializeBlock = function ($block) {
		$('.slider').slick({
			dots: true,
			infinite: true,
			arrows: true,
			// centerMode: true, 
			speed: 300,
			slidesToShow: 1,
		});
		console.log("Initilaized");
	}

	// Initialize each block on page load (front end).
	$(document).ready(function () {
		
			initializeBlock();
	});

	// Initialize dynamic block preview (editor).
	if (window.acf) {
		window.acf.addAction('render_block_preview', initializeBlock);
	}

})(jQuery);