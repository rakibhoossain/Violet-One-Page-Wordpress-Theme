<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Violet for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/activation/plugin-activation.php';

add_action( 'tgmpa_register', 'violet_register_required_plugins' );

function violet_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Violet Plugin', // The plugin name.
			'slug'               => 'violet-plugin', // The plugin slug (typically the folder name).
			'source'             => 'https://github.com/serakib/violet-plugin/archive/master.zip',
			'required'           => true,
			'version'            => '1.0.0',
			'force_activation'   => true, 
			'force_deactivation' => true, 
			'external_url'       => 'https://github.com/serakib/violet-plugin',
			'is_callable'        => '',
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => 'WP Google Maps',
			'slug'     => 'wp-google-maps',
			'required' => false,
		),

	);

	$config = array(
		'id'           => 'violet',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '', // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                     
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
