$(document).ready(function() {

	showFileNumber();

	var i = 0;
	$('.js-open-mobile-menu').click(function(e) {
		e.preventDefault();

		if (i % 2 !== 0) {
			$(this).removeClass('active');
		}
		else {
			$(this).addClass('active');
		}

		$('.mobile-header-menu').fadeToggle();
		i++;
	});

	// Init form
    $('.ajax-form').submit(function(e) {
		initForm(e, $(this));
    });

    $('form').on('click', '.error', function() {
    	$(this).val('');
    	$(this).removeClass('error');
    });

	$("#slideshow > div:gt(0)").hide();

	setInterval(function() {
	  $('#slideshow > div:first')
	    .fadeOut(1000)
	    .next()
	    .fadeIn(1000)
	    .end()
	    .appendTo('#slideshow');
	}, 10000);
});