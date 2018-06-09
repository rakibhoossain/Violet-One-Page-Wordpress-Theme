<?php
//Main Function File


if (!isset($content_width)) $content_width = 1366; /* pixels */

register_nav_menus(array(
    'primary-menu' => __('Primary Menu', 'violet')
));

// Page title

function violet_title($title)
{
    
    // Get the Site Name
    $site_name = get_bloginfo('name');
    
    // Prepend name
    $filtered_title = $site_name . $title;
    
    // If site front page, append description
    if (is_front_page()) {
        
        // Get the Site Description
        $site_description = get_bloginfo('description');
        
        // Append Site Description to title
        $filtered_title .= ' | ' . $site_description;
    }
    
    // Return the modified title
    return $filtered_title;
}

// Hook into 'wp_title'
add_filter('wp_title', 'violet_title');

load_theme_textdomain('violet', get_template_directory() . '/languages');





function violet_nav_fallback()
{
    echo '<div class="menu-alert">' . __('Use WordPress Menu builder OR Customizer to Manage Menus', 'violet') . '</div>';
}



add_action('admin_head', 'admin_theme_setup');

function admin_theme_setup()
{
}

// Load Fonts

function violet_fonts_url()
{
    $fonts_url   = '';
    /*
     * Translators: If there are characters in your language that are not
     * supported by Libre Franklin, translate this to 'off'. Do not translate
     * into your own language.
     */
    $roboto_font = _x('on', 'Roboto font: on or off', 'violet');
    if ('off' !== $roboto_font) {
        $font_families   = array();
        $font_families[] = 'Roboto:300,400,400i,500,500i,700,900';
        $query_args      = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext')
        );
        $fonts_url       = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }
    
    return esc_url_raw($fonts_url);
}

/** Violet Functions **/
require get_template_directory() . '/inc/violet-functions.php';

/** Violet Theme Supports **/
require get_template_directory() . '/inc/violet-supports.php';

/** scripts **/
require get_template_directory() . '/inc/scripts.php';

/** Customizer additions **/
require get_template_directory() . '/inc/customizer.php';

/** Menu style **/
require get_template_directory() . '/inc/theme-style.php';

/** Default Menu **/
require get_template_directory() . '/inc/menu-items.php';

/** Widgets **/
require get_template_directory() . '/inc/widgets/widgets.php';

/** Plugin Activator **/
require get_template_directory() . '/inc/activation/plugin-active.php';