<?php
// All scripts that needs by theme

function violet_admin_scripts()
{
	wp_enqueue_media();
	wp_enqueue_script('violet_team_widget_script', get_template_directory_uri() . '/inc/widgets/js/widgets.js', false, '1.0', true);
}
add_action('admin_enqueue_scripts', 'violet_admin_scripts');


function violet_scripts()
{
	wp_enqueue_style('violet-fonts', violet_fonts_url() , array());
	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/font-awesome.min.css'));
	wp_enqueue_style('animate', get_theme_file_uri('/assets/css/animate.css'));
	wp_enqueue_style('owl', get_theme_file_uri('/assets/css/owl.carousel.min.css'));
	wp_enqueue_style('owl-theme', get_theme_file_uri('/assets/css/owl.theme.default.css'));
	wp_enqueue_style('owl-style', get_theme_file_uri('/assets/css/owl.style.css'));
	wp_enqueue_style('fancybox', get_theme_file_uri('/assets/css/jquery.fancybox.min.css'));
	wp_enqueue_style('violet', get_stylesheet_uri());

  	// JQuery
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js', array('jquery') , true));

  	// For Data short filtering
	wp_enqueue_script('mixitup', get_theme_file_uri('/assets/js/jquery.mixitup.js', array('jquery') , true));

  	// For carosul
	wp_enqueue_script('owl', get_theme_file_uri('/assets/js/owl.carousel.min.js', array('jquery') , true));

  	// For wow animate.css effects
	wp_enqueue_script('wow', get_theme_file_uri('/assets/js/wow.min.js', array('jquery') , true));

  	// For Countring
	wp_enqueue_script('waypoints', get_theme_file_uri('/assets/js/waypoints.min.js', array('jquery') , true));
	wp_enqueue_script('counterup', get_theme_file_uri('/assets/js/jquery.counterup.min.js', array('jquery','waypoints') , true));

  	// For Photo Gallery
	wp_enqueue_script('fancybox', get_theme_file_uri('/assets/js/jquery.fancybox.min.js', array('jquery') , true));

  	// For TO TOP Scrolling
  	wp_enqueue_script('easing', get_theme_file_uri('/assets/js/easing.js', array('jquery') , true));
	wp_enqueue_script('move-top', get_theme_file_uri('/assets/js/move-top.js', array('jquery','easing') , true));


  	// Theme na cript
	wp_enqueue_script('nav-js', get_theme_file_uri('/assets/js/nav.js', array('jquery') , '1.12.4', true));

	// Template specefic scripts
	if ( is_page_template( 'template-front-page.php' ) ) {
		wp_enqueue_script('one-page-nav-scroll', get_theme_file_uri('/assets/js/one-page-nav-scroll.js', array('jquery') , true));
	}

	// Theme main Javascript
	wp_enqueue_script('violet-js', get_theme_file_uri('/assets/js/main.js', array('jquery') , '1.12.4', true));

	if (is_singular() && comments_open() && get_option('thread_comments'))
	{
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'violet_scripts');