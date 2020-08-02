(function ($) {
// Initilizing Slick  and implementing back end preview as well
	$('.slider').on('init', function (event, slick, direction) {

		// check to see if there are enough Sliderimgs For Dots or arrows
		if ($('.slider img').length <= $('.slider').attr("data-cols") * $('.slider').attr("data-rows")) {
			// remove arrows and dots... well hide them
			$('.slick-prev').hide();
			$('.slick-next').hide();
			$('.slick-dots').hide();
			console.log("hiding dots");
			

		}
	});
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