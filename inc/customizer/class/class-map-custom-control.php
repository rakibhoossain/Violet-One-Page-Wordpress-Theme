<?php

if ( ! defined( 'ABSPATH' ) ) {
	die(); // no direct access
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Customize for Contact Form 7, extend the WP Customizer
 *
 * adds a custom control for rendering created contact forms in the customizer.
 */
if ( ! class_exists( 'Violet_Map_Custom_Control' ) ) {
	class Violet_Map_Custom_Control extends WP_Customize_Control {


		/**
		 * Returns true / false if the plugin is activated;
		 *
		 * This right here disables the control for selecting a contact form IF the plugin isn\'t active
		 *
		 * @return bool
		 */
		public function active_callback() {

			require_once ABSPATH . 'wp-admin/includes/plugin.php';

			if ( is_plugin_active( 'wp-google-maps/wpGoogleMaps.php' ) ) {
				return true;
			} else {
				return false;
			}
		}

		public function violet_get_pg_maps() {
			global $wpdb;
			
			// no more php warnings
			$violet_maps = array();

			// check if map is activated
			if ( $this->active_callback() ) {
				
			    $table_name = $wpdb->prefix . "wpgmza_maps";
      			$results = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE `active` = %d ORDER BY `id` DESC",0));

			    if ( $wpdb->num_rows >=1 ) {
			    	foreach ( $results as $result ) {
			    		$violet_maps[ $result->id ] = $result->map_title;
			    	}
			    } else {
			    	$violet_maps[0] = __( 'No maps found', 'violet' );
			    }
			}

			return $violet_maps;
		}




		public function render_content() {
			$maps = $this->violet_get_pg_maps();

			if ( ! empty( $maps ) ) { ?>

			<span class="customize-control-title">
				<label for="<?php echo esc_html( $this->id ); ?>"><?php echo esc_html( $this->label ); ?></label>
			</span>
			
			<select <?php $this->link(); ?> id="<?php echo esc_html( $this->id ); ?>" style="width:100%;">

				<?php

				echo '<option selected="selected" value="default">' . __( 'Select your contact map', 'violet' ) . '</option>';

				foreach ( $maps as $map_id => $map_title ) {
					echo '<option value="' . sanitize_key( $map_id ) . '" >' . stripslashes(esc_html( $map_title )) . '</option>';
				}

				echo '</select>';
			}
		}
	}
}// End if().
