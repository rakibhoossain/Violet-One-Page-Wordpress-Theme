<?php
/*
 * Set menu items default
 *
 * @package Violet
 */

  function violet_active_menu_items(){

    $sections = array();

     $violet_homeslider_show = get_theme_mod('violet_homeslider_show');
     if( isset($violet_homeslider_show) && $violet_homeslider_show != 0 ):
          $sections['home'] = '#top';
     endif;

    $violet_descript_show = get_theme_mod('violet_descript_show');
    if( isset($violet_descript_show) && $violet_descript_show != 0 ):
       $sections['about'] = '#about';
   endif;


   $violet_skill_show = get_theme_mod('violet_skill_show');
   if( isset($violet_skill_show) && $violet_skill_show != 0 ):
       $sections['skill'] = '#skill';
   endif;


   $violet_service_show = get_theme_mod('violet_service_show');
   if( isset($violet_service_show) && $violet_service_show != 0 ):
       $sections['service'] = '#service';
   endif;


   $violet_portfolio_show = get_theme_mod('violet_portfolio_show');
   if( isset($violet_portfolio_show) && $violet_portfolio_show != 0 ):
       $sections['portfolio'] = '#portfolio';
   endif;

   $violet_testimonial_show = get_theme_mod('violet_testimonial_show');
   if( isset($violet_testimonial_show) && $violet_testimonial_show != 0 ):
       $sections['testimonial'] = '#testimonial';
   endif;

   $violet_ourteam_show = get_theme_mod('violet_ourteam_show');
   if( isset($violet_ourteam_show) && $violet_ourteam_show != 0 ):
       $sections['team'] = '#team';
   endif;

   $violet_blog_show = get_theme_mod('violet_blog_show');
   if( isset($violet_blog_show) && $violet_blog_show != 0 ):
       $sections['blog'] = '#blog';
   endif;

   $violet_contact_show = get_theme_mod('violet_contact_show');
   if( isset($violet_contact_show) && $violet_contact_show != 0 ):
       $sections['contact'] = '#contact';
   endif;

   return $sections;
}

// setup navigation automatically
add_action('load-nav-menus.php', 'violet_nav_creation_primary');

function violet_nav_creation_primary(){

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
    }
    //then you set the wanted theme  location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary-menu'] = $menu->term_id;
    set_theme_mod( 'nav_menu_locations', $locations );
}