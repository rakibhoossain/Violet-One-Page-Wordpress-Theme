<?php
// Violet functions

function violet_custom_css()
  {
  $custom_css = esc_attr(get_theme_mod('custom_css'));
  echo '<style type="text/css">' . $custom_css . '</style>';
  }
add_action('wp_head', 'violet_custom_css');

function theme_author()
  {
  $name = 'Rakib Hossain';
  $url = 'http://www.facebook.com/prof.rakib';
  return __("Design &amp; Developed by", "violet") . ' <a href="' . $url . '">' . $name . '</a>';
  }

function get_contact_phone()
  {
  return $contact_phone =  esc_attr(get_theme_mod('user_phone','+8801776217594'));
  }

function get_contact_email($public = true)
  {
  return $contact_email = esc_attr(get_theme_mod('user_email','serakib@gmail.com'));
  }

function get_contact_address()
  {
  return $contact_address = esc_attr(get_theme_mod('user_address',__('Dhaka, BD','violet')));
  }


function violet_bg($id)
  {
  $bg = $id . '_bg';
  $img = esc_attr(get_theme_mod($bg));
  if ($img != '') echo "background-image: url(" . $img . ");";
    else echo "";
  }


function violet_overlay($id)
  {

  $co = $id . '_color';
  $color = esc_attr(get_theme_mod($co,'rgba(42,1,61,0.88)'));

  if (empty($color) || $color == '') return;

  echo "background-color: " . $color.";";

  }


function social_show_link(){
  $social_show = esc_attr(get_theme_mod('violet_social_show', '0'));
  if (isset($social_show) && $social_show != 0 ) {
    return get_social_link();
    
  }
  return '';
}

function violet_conact_map(){
  $map        = get_theme_mod( 'violet_contact_map' );
  $map_pg        = get_theme_mod( 'violet_map_pg' );
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
  if ( is_plugin_active( 'wp-google-maps/wpGoogleMaps.php' ) && null != $map_pg && 'default' != $map_pg ) {
    $shortcode = '[wpgmza id="' . esc_html( $map_pg ) . '"]';
    echo do_shortcode( $shortcode );
  }else {
    echo do_shortcode( $map );
  }
}

function violet_conact_form(){
  $form        = get_theme_mod( 'violet_contact_form' );
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
  if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && null != $form && 'default' != $form ) {
    $shortcode = '[contact-form-7 id="' . esc_html( $form ) . '"]';
    echo do_shortcode( $shortcode );
  }
  
}



function is_violet_plugin_active(){
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
  if ( is_plugin_active( 'wp-violet/wp-violet.php' )) {
    return true;
  }else{
    return false;
  }
}

function get_query_args_portfolio(){
  return array( 'post_type' => 'portfolio', 'posts_per_page' => 6);
}

/**
 *  Breadcrumb
 *
 *
 */
if ( ! function_exists( 'violet_breadcrumbs' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function violet_breadcrumbs( $args = array() ) {
        // Bail if Home Page.
        // if ( is_front_page() || is_home() ) {
        if ( is_front_page() ) {
            return;
        }

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once trailingslashit(get_template_directory()) . '/inc/libraries/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
       
    }

endif;

function get_social_link()
  {

  $social_link = '';
  $social_facebook = esc_url(get_theme_mod('social_facebook', 'Facebook url'));
  $social_twitter = esc_url(get_theme_mod('social_twitter', 'Twitter url'));
  $social_linkedin = esc_url(get_theme_mod('social_linkedin', 'Linkedin url'));
  $social_github = esc_url(get_theme_mod('social_github', 'Github url'));
  $social_youtube = esc_url(get_theme_mod('social_youtube', 'Youtube url'));

  if ('' !== get_theme_mod('social_facebook')) $social_link.= '<li><a href="' . $social_facebook . '"><i class="fa fa-facebook">&nbsp;</i></a></li>';
  if ('' !== get_theme_mod('social_twitter')) $social_link.= '<li><a href="' . $social_twitter . '"><i class="fa fa-twitter">&nbsp;</i></a></li>';
  if ('' !== get_theme_mod('social_linkedin')) $social_link.= '<li><a href="' . $social_linkedin . '"><i class="fa fa-linkedin">&nbsp;</i></a></li>';
  if ('' !== get_theme_mod('social_github')) $social_link.= '<li><a href="' . $social_github . '"><i class="fa fa-github">&nbsp;</i></a></li>';
  if ('' !== get_theme_mod('social_youtube')) $social_link.= '<li><a href="' . $social_youtube . '"><i class="fa fa-youtube">&nbsp;</i></a></li>';

  return $social_link;
  }


function violet_loadmore_ajax_handler(){
  // prepare our arguments for the query
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';
  
  // it is always better to use WP_Query but not here
  query_posts( $args );
 
  if( have_posts() ) :
 
    // run the loop
    while( have_posts() ): the_post();
 
      // look into your theme code how the posts are inserted, but you can use your own HTML of course
      // do you remember? - my example is adapted for Twenty Seventeen theme
      get_template_part( 'template-parts/content', 'portfolio');
      // for the test purposes comment the line above and uncomment the below one
      // the_title();
    endwhile;
  endif;
  die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'violet_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'violet_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}