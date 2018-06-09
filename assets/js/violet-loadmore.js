(function($) {
    'use strict';

$(document).ready(function($){
	$('.portfolio_loadmore').click(function(){

		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': violet_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : violet_loadmore_params.current_page,
		};
 
		$.ajax({
			url : violet_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.addClass('loading');// change the button text, you can also add a preloader image
			},
			success : function( data ){
				button.addClass('loading').removeClass('loading');
				if( data ) { 
					$('.portfolio-post-parent').append(data); // insert new posts
					violet_loadmore_params.current_page++;
 
					if ( violet_loadmore_params.current_page == violet_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
					// you can also fire the "post-load" event here if you use a plugin that requires it
					$( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});

//jQuery ready end        
}(jQuery));