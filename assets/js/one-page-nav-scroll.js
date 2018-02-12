//=========Smoth Scrolling=============
jQuery(document).ready(function($){

	$("#menu-navigation > li > a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	        // Prevent default anchor click behavior
	        event.preventDefault();

	        // Store hash
	        var hash = this.hash;

            // Check hash not exist
            if($(hash).length == 0) return;

	        // Using jQuery's animate() method to add smooth page scroll
	        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
	            scrollTop: $(hash).offset().top
	        }, 800, function() {
	            // Add hash (#) to URL when done scrolling (default click behavior)
	            window.location.hash = hash;
	        });
	    } // End if
	});

    
    $(window).scroll(function() {
        onepageScroller();
    });
	onepageScroller();

    function onepageScroller() {       
        $('#menu-navigation').find('li').removeClass('active');
        $('#menu-navigation').find('a[href*="#' + onePageCurrentSection() + '"]').parent().addClass('active');
    }

    function onePageCurrentSection() {
        
        var currentOnePageSection = 'top';
        $('section').each(function(index) {
            var h = $(this).offset().top;
            var y = $(window).scrollTop();

            var offsetScroll = 100;

            if (y + offsetScroll >= h && y < h + $(this).height() && $(this).attr('id') != currentOnePageSection) {
                currentOnePageSection = $(this).attr('id');
            }
        });

        return currentOnePageSection;
    }
});