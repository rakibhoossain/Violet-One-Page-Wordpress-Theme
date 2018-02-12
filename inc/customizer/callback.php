<?php
/**
 * Violet customizer callback
 *
 * @package violet
 */

if ( ! function_exists( 'violet_active_callback_cf7' ) ) {
    function violet_active_callback_cf7( $control ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

if ( ! function_exists( 'violet_is_active_callback_cf7' ) ) {
    function violet_is_active_callback_cf7( $control ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            return false;
        } else {
            return true;
        }
    }
}

if ( ! function_exists( 'violet_active_callback_map' ) ) {
    function violet_active_callback_map( $control ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        if ( is_plugin_active( 'wp-google-maps/wpGoogleMaps.php' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

if ( ! function_exists( 'violet_is_active_callback_map' ) ) {
    function violet_is_active_callback_map( $control ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        if ( is_plugin_active( 'wp-google-maps/wpGoogleMaps.php' ) ) {
            return false;
        } else {
            return true;
        }
    }
}

if ( ! function_exists( 'violet_partial_blogname' ) ) {
    function violet_partial_blogname() {
        bloginfo( 'name' );
    }
}