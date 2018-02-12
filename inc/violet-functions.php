<?php
// Violet functions


function violet_custom_css()
  {
  $custom_css = esc_attr(get_theme_mod('custom_css'));
  echo '<style type="text/css">' . $custom_css . '</style>';
  }

add_action('wp_head', 'violet_custom_css');

function violet_primary_color()
  {
  $color = esc_attr(get_theme_mod('violet_primary_color','#7f56fd'));
  $preloader_color = esc_attr(get_theme_mod('violet_preloader_color','#7f56fd'));
  if ('' != $color) {

  echo '
    <style type="text/css">

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
          border-color: '.$color.';
      }

      .hero-content .slide-btn:hover,
      .news .news-summery a.read-more-btn,
      .hero-content .slide-btn,
      .call-to-action .call-to-btn {
          color: '.$color.';
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
      .blog_latest_post a.read_more, .reply a,
      .comment-metadata .edit-link a,
      .not-found-btn,
      .btn-custom:hover,
      .btn-custom.active,
      .about .about-btn,
      .hero-content .slide-btn:hover
      .title h2:before,
      .title h2:after {
          background: '.$color.';
      }
      .hero-content .slide-btn:hover{
        color:#fff;
      }
      .home-preloder {
        background: '.$preloader_color.';
      }
    </style>';
      }
  }

add_action('wp_head', 'violet_primary_color');



function theme_author()
  {
  $name = 'Rakib Hossain';
  $url = 'http://www.facebook.com/prof.rakib';
  return __("Design &amp; Developed by", "violet") . ' <a href="' . $url . '">' . $name . '</a>';
  }

function get_contact_phone()
  {
  $contact_phone = '';
  if (($contact_phone = esc_attr(get_theme_mod('user_phone','01776217594'))) != '') $contact_phone = esc_attr(get_theme_mod('user_phone'));
  return $contact_phone;
  }

function get_contact_email($public = true)
  {
  $contact_email = '';
  if (($contact_email = esc_attr(get_theme_mod('user_email','admin@rakibhossain.cf'))) != '') $contact_email = esc_attr(get_theme_mod('user_email'));
  return $contact_email;
  }

function get_contact_address()
  {
  $contact_address = '';
  if (($contact_address = esc_attr(get_theme_mod('user_address',__('Dhaka, BD','violet')))) != '')
    return $contact_address;
  else return '';
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