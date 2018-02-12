<?php
/**
 * @package violet
 */

//Dynamic styles
function violet_custom_styles($custom) {
	$menu_bg_color = esc_attr(get_theme_mod('menu_bg_color','#7b50fc'));

	$custom = '';
	//Header background-color: transparent!important;
	  if ( is_page_template( 'template-front-page.php' ) ) {
		$custom = "
			#header {
				left: 0;
				position: absolute;
				top: 0;
				width: 100%;
				z-index: 99;
				padding-top: 15px;
			}

		";

	}else{
		$custom = "
			#header {
				background-color: ".$menu_bg_color.";
			}

		";
	}


	$custom .= "
		#header.header-fix {
			background-color: ".$menu_bg_color.";
		}

	";

	wp_add_inline_style( 'violet', $custom );	
}
add_action( 'wp_enqueue_scripts', 'violet_custom_styles' );