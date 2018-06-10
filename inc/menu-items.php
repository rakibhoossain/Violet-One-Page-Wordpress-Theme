<?php
/*
 * Set menu items default
 *
 * @package Violet
 */

function violet_active_menu_items() {
    $sections['home'] = '#top';
    $sections['about'] = '#about';
    $sections['skill'] = '#skill';
    $sections['service'] = '#service';
    $sections['portfolio'] = '#portfolio';
    $sections['testimonial'] = '#testimonial';
    $sections['team'] = '#team';
    $sections['blog'] = '#blog';
    $sections['contact'] = '#contact';
    return $sections;
}

// setup navigation automatically
add_action('load-nav-menus.php', 'violet_nav_creation_primary');

function violet_nav_creation_primary() {

    $menus = violet_active_menu_items();
    $home_url = home_url( '/' );
    $name = 'Navigation';
    $menu_exists = wp_get_nav_menu_object($name);
    if( !$menu_exists){
        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by( 'name', $name, 'nav_menu' );

        if (count($menus) > 0){
            foreach($menus as $name => $link){
                wp_update_nav_menu_item($menu->term_id, 0, array(
                    'menu-item-title' =>  ucwords($name),
                    'menu-item-classes' => 'topics-dropdown',
                    'menu-item-url' => $home_url . $link,
                    'menu-item-type' => 'custom',
                    'menu-item-status' => 'publish')
                );
            }
        }

    //then you set the wanted theme  location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary-menu'] = $menu->term_id;
    set_theme_mod( 'nav_menu_locations', $locations );

    }

}