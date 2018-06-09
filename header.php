<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="home-preloder">
        <div class="spinner">
          <div class="rect1"></div>
          <div class="rect2"></div>
          <div class="rect3"></div>
          <div class="rect4"></div>
          <div class="rect5"></div>
        </div>
    </div>
    <div id="top"></div>
    <header id="header">
      <div class="container">
        <nav id='main-menu'>
        <div class="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php if ( get_header_image() ) : ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-img">
              <img src="<?php esc_url( header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
              <?php bloginfo( 'name' ); ?></a>
              <?php else: ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-text"><span class="logo-text"><?php bloginfo( 'name' ); ?></span></a>
              <?php endif; ?>
          
        </div>

        <div id="head-mobile"></div>
        <div class="button"></div>

        <?php wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'fallback_cb' => 'violet_nav_fallback',
            'menu_id'         => 'menu-navigation'
          )); 
        ?>
        </nav>
      </div>

    </header>