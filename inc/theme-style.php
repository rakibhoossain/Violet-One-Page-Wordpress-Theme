<?php
/**
 * @package violet
 * Theme style css output
 */

//Dynamic styles
function violet_custom_styles() {
	$menu_bg_color = esc_attr(get_theme_mod('menu_bg_color','rgba(0,45,96,0.88)'));
	$color = esc_attr(get_theme_mod('violet_primary_color','#7f56fd'));
    $preloader_color = esc_attr(get_theme_mod('violet_preloader_color','#7f56fd'));
	$custom = '';
	  if ( is_front_page() ) {
	  	$custom = "
		#header {
		  	left: 0;
		  	position: absolute;
		  	top: 0;
		  	width: 100%;
		  	padding-top: 15px;
		  	background-color: transparent;
	  }";

	}else{
		$custom = "
		#header {
			background-color: {$menu_bg_color};
		}";
	}

	$custom .= "
	#header.header-fix {
		background-color: {$menu_bg_color};
	}
	/*Violet Theme Style*/
	.wpcf7-form-control-wrap input:focus,
	.wpcf7-form-control-wrap textarea:focus,
	h2.comments-title,
	      #respond h3,
	input.search-btn,
	.not-found-btn,
	.about .about-btn,
	.btn-custom:hover,
	.btn-custom.active,
	.blog_latest_post a.read_more:hover,
	.reply a:hover, .comment-metadata .edit-link a:hover,
	.about .about-photo .photo .bottom-right-border {
		border-color: {$color};
	}

	.hero-content .slide-btn:hover,
	.news .news-summery a.read-more-btn,
	.hero-content .slide-btn,
	.call-to-action .call-to-btn {
		color: {$color};
	}

	input.wpcf7-form-control.wpcf7-submit:hover,
	      #respond .form-submit input,
	.blog_latest_post a.read_more,
	.reply a,
	.comment-metadata .edit-link a,
	.nav-previous a,
	.nav-next a,
	.archive_pagination a,
	.archive_pagination span.current,
	input.search-btn,

	.page-numbers.current,
	a.page-numbers:hover,

	.blog_latest_post a.read_more, .reply a,
	.comment-metadata .edit-link a,
	.not-found-btn,
	.btn-custom:hover,
	.btn-custom.active,
	.about .about-btn,
	.hero-content .slide-btn:hover,
	.title h2:before,
	.title h2:after,
	.widget_calendar table th{
		background: {$color};
	}
	.home-preloder {
		background: {$preloader_color};
	}
	
	";

	wp_add_inline_style( 'violet-main-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'violet_custom_styles' );