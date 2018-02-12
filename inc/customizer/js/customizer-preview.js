/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#main-menu .logo a' ).text( to );
		} );
	} );
	// wp.customize( 'blogdescription', function( value ) {
	// 	value.bind( function( to ) {
	// 		$( '.site-description' ).text( to );
	// 	} );
	// } );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


	wp.customize( 'header_color', function( value ) {
		value.bind( function( newval ) {
			$( '.main .overlay' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'skill_color', function( value ) {
		value.bind( function( newval ) {
			$( '.skills .overlay' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'counter_color', function( value ) {
		value.bind( function( newval ) {
			$( '.finished .overlay' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'testimonial_color', function( value ) {
		value.bind( function( newval ) {
			$( '.testimonials .overlay' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'partner_color', function( value ) {
		value.bind( function( newval ) {
			$( '.partners .overlay' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'call-to-action_color', function( value ) {
		value.bind( function( newval ) {
			$( '.call-to-action .overlay' ).css( 'background-color', newval );
		} );
	} );


	wp.customize( 'menu_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '#header' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css( 'background-color', newval );
		} );
	});

	wp.customize( 'violet_primary_color', function( value ) {
		value.bind( function( newval ) {
			if (newval != '') {
				$( ".hero-content .slide-btn:hover,.news .news-summery a.read-more-btn,.hero-content .slide-btn,.call-to-action .call-to-btn" ).css( 'color', newval );
				$( ".wpcf7-form-control-wrap input:focus,.wpcf7-form-control-wrap textarea:focus,h2.comments-title,#respond h3,input.search-btn,.not-found-btn,.about .about-btn,.btn-custom:hover,.btn-custom.active,.blog_latest_post a.read_more:hover,.reply a:hover, .comment-metadata .edit-link a:hover,.about .about-photo .photo .bottom-right-border" ).css( 'border-color', newval );
				$( "input.wpcf7-form-control.wpcf7-submit:hover,#respond .form-submit input,.blog_latest_post a.read_more,.reply a,.comment-metadata .edit-link a,.nav-previous a,.nav-next a,.archive_pagination a,.archive_pagination span.current,input.search-btn,.blog_latest_post a.read_more, .reply a, .comment-metadata .edit-link a,.not-found-btn,.btn-custom:hover,.btn-custom.active,.about .about-btn,.title h2:before,.title h2:after,.hero-content .slide-btn:hover" ).css( 'background-color', newval );
			}
		});
	});

	// Main section 
	wp.customize( 'main_section_message', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-content .hero-cta' ).html(newval );
		});
	});
	wp.customize( 'main_section_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-content .slide-btn' ).text( newval );
		});
	});

	// About section 
	wp.customize( 'about_section_title', function( value ) {
		value.bind( function( newval ) {
			$( '#about .title h2' ).text( newval );
		});
	});
	wp.customize( 'about_section_desc', function( value ) {
		value.bind( function( newval ) {
			$( '#about .title .section-s-t' ).html( newval );
		});
	});
	wp.customize( 'about_section_button_cv_text', function( value ) {
		value.bind( function( newval ) {
			$( '#about #about_cv' ).text( newval );
		});
	});
	wp.customize( 'about_section_button_hire_text', function( value ) {
		value.bind( function( newval ) {
			$( '#about #about_hire' ).text( newval );
		});
	});

	// Profile section 
	wp.customize( 'user_photo', function( value ) {
		value.bind( function( newval ) {
			$( '#about .about-photo .photo img' ).attr( 'src', newval );
		});
	});
	wp.customize( 'user_address', function( value ) {
		value.bind( function( newval ) {
			$( '#about #about_addr' ).text( newval );
		});
	});
	wp.customize( 'user_job', function( value ) {
		value.bind( function( newval ) {
			$( '#about #about_job' ).text( newval );
		});
	});
	wp.customize( 'user_skill', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-content .hero-cat' ).html( newval );
		});
	});
	wp.customize( 'user_description', function( value ) {
		value.bind( function( newval ) {
			$( '#about .about-content .description' ).html( newval );
		});
	});
	wp.customize( 'user_age', function( value ) {
		value.bind( function( newval ) {
			$( '#about #about_age' ).text( newval );
		});
	});
	wp.customize( 'user_name', function( value ) {
		value.bind( function( newval ) {
			$( '#about #about_name' ).text( newval );
		});
	});

	// Skill section 
	wp.customize( 'violet_myskill_title', function( value ) {
		value.bind( function( newval ) {
			$( '#skill .title h2' ).text( newval );
		});
	});
	wp.customize( 'violet_myskill_description', function( value ) {
		value.bind( function( newval ) {
			$( '#skill .title .section-s-t-bg' ).html( newval );
		});
	});

	// Service section 
	wp.customize( 'violet_service_title', function( value ) {
		value.bind( function( newval ) {
			$( '#service .title h2' ).text( newval );
		});
	});
	wp.customize( 'violet_service_description', function( value ) {
		value.bind( function( newval ) {
			$( '#service .title .section-s-t' ).html( newval );
		});
	});

	// Portfolio section 
	wp.customize( 'violet_portfolio_title', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio .title h2' ).text( newval );
		});
	});
	wp.customize( 'violet_portfolio_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio .title .section-s-t' ).html( newval );
		});
	});

	// Team section 
	wp.customize( 'violet_ourteam_title', function( value ) {
		value.bind( function( newval ) {
			$( '#team .title h2' ).text( newval );
		});
	});
	wp.customize( 'violet_ourteam_subtitle', function( value ) {
		value.bind( function( newval ) {
			$( '#team .title .section-s-t' ).html( newval );
		});
	});

	// Blog section 
	wp.customize( 'blog_title', function( value ) {
		value.bind( function( newval ) {
			$( '#blog .title h2' ).text( newval );
		});
	});
	wp.customize( 'blog_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#blog .title .section-s-t' ).html( newval );
		});
	});

	// Contact section 
	wp.customize( 'violet_contact_title', function( value ) {
		value.bind( function( newval ) {
			$( '#contact .title h2' ).text( newval );
		});
	});
	wp.customize( 'violet_contact_sub_title', function( value ) {
		value.bind( function( newval ) {
			$( '#contact .title .section-s-t' ).html( newval );
		});
	});

	// footer section 
	wp.customize( 'footer_credits', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .copyright-text' ).text( newval );
		});
	});
	
	wp.customize( 'user_phone', function( value ) {
		value.bind( function( newval ) {
			$( '#footer #tel' ).text(newval );
		});
	});
	wp.customize( 'user_email', function( value ) {
		value.bind( function( newval ) {
			$( '#footer #mailto' ).text(newval );
		});
	});

	// Call to section 
	wp.customize( 'violet_call_to_message', function( value ) {
		value.bind( function( newval ) {
			$( '#call-to-action .call-to-action-message' ).html( newval );
		});
	});
	wp.customize( 'violet_call_to_btn', function( value ) {
		value.bind( function( newval ) {
			$( '#call-to-action .call-to-btn' ).text( newval );
		});
	});
	

})( jQuery );
