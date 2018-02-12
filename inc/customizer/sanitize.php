<?php

/**
 * Sanitization for textarea field
 */
function violet_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}

/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function violet_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}

/**
 * validate int.
 */
function violet_sanitize_int( $input ) {
$return = absint($input);
    return $return;
}

/**
 * validate checkbox option.
 */
function violet_sanitize_checkbox( $input ) {
	return ( isset( $input ) && true == $input ? true : false );
}
/**
 *  Sanitize Radio Buttons
 */
if ( ! function_exists( 'violet_sanitize_radio_buttons' ) ) {
	function violet_sanitize_radio_buttons( $input, $setting ) {
		global $wp_customize;

		$control = $wp_customize->get_control( $setting->id );

		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}




if ( ! function_exists( 'violet_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function violet_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'violet_sanitize_dropdown_pages' ) ) :

	/**
	 * Sanitize dropdown pages.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $page_id Page ID.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function violet_sanitize_dropdown_pages( $page_id, $setting ) {

		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );

	}

endif;

if ( ! function_exists( 'violet_sanitize_image' ) ) :

	/**
	 * Sanitize image.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
	 *
	 * @param string               $image Image filename.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return string The image filename if the extension is allowed; otherwise, the setting default.
	 */
	function violet_sanitize_image( $image, $setting ) {

		/**
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types().
		*/
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );

	}

endif;


if ( ! function_exists( 'violet_sanitize_number_range' ) ) :

	/**
	 * Sanitize number range.
	 *
	 * @since 1.0.0
	 *
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 *
	 * @param int                  $input Number to check within the numeric range defined by the setting.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
	 */
	function violet_sanitize_number_range( $input, $setting ) {

		// Ensure input is an absolute integer.
		$input = absint( $input );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get min.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

		// Get max.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

		// Get Step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the input is within the valid range, return it; otherwise, return the default.
		return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'violet_sanitize_number' ) ) :
	
	function violet_sanitize_number( $input ) {
		return force_balance_tags( $input );
	}
endif;

if ( ! function_exists( 'violet_sanitize_post_id' ) ) :

	/**
	 * Sanitize post ID.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $post_id Post ID.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int|string Page ID if the post is published; otherwise, the setting default.
	 */
	function violet_sanitize_post_id( $post_id, $setting ) {

		// Ensure $input is an absolute integer.
		$post_id = absint( $post_id );

		// If $post_id is an ID of a published post, return it; otherwise, return the default.
		return ( 'publish' === get_post_status( $post_id ) ? $post_id : $setting->default );

	}

endif;

if ( ! function_exists( 'violet_sanitize_textarea_content' ) ) :

	/**
	 * Sanitize textarea content.
	 *
	 * @since 1.0.0
	 *
	 * @param string               $input Content to be sanitized.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return string Sanitized content.
	 */
	function violet_sanitize_textarea_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;


/**
 * Sanitize rgba color.
 *
 * @param string $value Color in rgba format.
 *
 * @return string
 */
if ( ! function_exists( 'violet_sanitize_rgba' ) ):
function violet_sanitize_rgba( $value ) {
	$red   = 'rgba(0,0,0,0)';
	$green = 'rgba(0,0,0,0)';
	$blue  = 'rgba(0,0,0,0)';
	$alpha = 'rgba(0,0,0,0)';   // If empty or an array return transparent
	if ( empty( $value ) || is_array( $value ) || $value === '' ) {
		return '';
	}
	if ( false === strpos( $value, 'rgba' ) ) {
        return sanitize_hex_color( $value );
    }

	// By now we know the string is formatted as an rgba color so we need to further sanitize it.
	$value = str_replace( ' ', '', $value );
	sscanf( $value, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
	return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}
endif;



?>