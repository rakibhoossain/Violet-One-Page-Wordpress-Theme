<?php
// All scripts that needs by theme


/****************** ADMIN CSS & JS ******************/
//Load ADMIN CSS & JS SCRIPTS
function violet_admin_scripts($hook) {
	//WIDGETS
	if( 'widgets.php' == $hook || 'post.php' == $hook ){
		wp_enqueue_script('violet-widgets', get_template_directory_uri() . '/inc/widgets/js/widgets.js', false, '1.0', true);
		}
}
add_action( 'admin_enqueue_scripts', 'violet_admin_scripts' );


function violet_scripts()
{
	wp_enqueue_style('violet-fonts', violet_fonts_url() , array());
	wp_enqueue_style('violet-bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('violet-fontawesome', get_theme_file_uri('/assets/css/font-awesome.min.css'));
	wp_enqueue_style('violet-animate', get_theme_file_uri('/assets/css/animate.css'));
	wp_enqueue_style('violet-owl', get_theme_file_uri('/assets/css/owl.carousel.min.css'));
	wp_enqueue_style('violet-owl-theme', get_theme_file_uri('/assets/css/owl.theme.default.css'));
	wp_enqueue_style('violet-owl-style', get_theme_file_uri('/assets/css/owl.style.css'));
	wp_enqueue_style('violet-fancybox', get_theme_file_uri('/assets/css/jquery.fancybox.min.css'));
	wp_enqueue_style('violet-main-style', get_stylesheet_uri());
	if ( is_rtl() ) { 
		wp_enqueue_style('violet-rtl-css',get_theme_file_uri('/rtl.css')); 
	}

  	// JQuery
	wp_enqueue_script('jquery');

	// Bootstrap
	wp_enqueue_script('violet-bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js', array('jquery') , true));

  	// For Data short filtering
	wp_enqueue_script('violet-mixitup', get_theme_file_uri('/assets/js/jquery.mixitup.js', array('jquery') , true));

  	// For carosul
	wp_enqueue_script('violet-owl', get_theme_file_uri('/assets/js/owl.carousel.min.js', array('jquery') , true));

  	// For wow animate.css effects
	wp_enqueue_script('violet-wow', get_theme_file_uri('/assets/js/wow.min.js', array('jquery') , true));

  	// For Countring
	wp_enqueue_script('violet-waypoints', get_theme_file_uri('/assets/js/waypoints.min.js', array('jquery') , true));
	wp_enqueue_script('violet-counterup', get_theme_file_uri('/assets/js/jquery.counterup.min.js', array('jquery','waypoints') , true));

  	// For Photo Gallery
	wp_enqueue_script('violet-fancybox', get_theme_file_uri('/assets/js/jquery.fancybox.min.js', array('jquery') , true));

  	// For TO TOP Scrolling
  	wp_enqueue_script('violet-easing', get_theme_file_uri('/assets/js/easing.js', array('jquery') , true));
	wp_enqueue_script('violet-move-top', get_theme_file_uri('/assets/js/move-top.js', array('jquery','easing') , true));

  	// Theme nav script
	wp_enqueue_script('violet-nav-js', get_theme_file_uri('/assets/js/nav.js', array('jquery') , '1.12.4', true));

	// Frontpage scripts
	if ( is_front_page() ) {
		wp_enqueue_script('violet-one-page-nav-scroll', get_theme_file_uri('/assets/js/one-page-nav-scroll.js', array('jquery') , true));

		if (is_violet_plugin_active()) {
			$portfolio_query = new WP_Query( get_query_args_portfolio());
			wp_register_script( 'violet-loadmore', get_theme_file_uri() . '/assets/js/violet-loadmore.js', array('jquery') );
			// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
			// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
			wp_localize_script( 'violet-loadmore', 'violet_loadmore_params', array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
				'posts' => json_encode( $portfolio_query->query_vars), // everything about your loop is here
				'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
				'max_page' => $portfolio_query->max_num_pages
			) );
			wp_enqueue_script( 'violet-loadmore' );
		}
	}
	
	// Theme main Javascript
	wp_enqueue_script('violet-js', get_theme_file_uri('/assets/js/main.js', array('jquery') , '1.12.4', true));

	if (is_singular() && comments_open() && get_option('thread_comments'))
	{
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'violet_scripts');