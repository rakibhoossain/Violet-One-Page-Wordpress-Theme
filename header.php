<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title><?php wp_title(); ?></title>
    
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
    <?php $menu_bg = esc_attr( get_theme_mod('menu_bg_color','rgba(0,45,96,0.88)') );

    if ( !is_page_template( 'template-front-page.php' )){ ?>
    <header id="header" style="background-color: <?php echo $menu_bg ?>">
    <?php } else{ ?>
    <header id="header"><?php }?>

      <div class="container">
        <nav id='main-menu'>
        <div class="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php if ( get_header_image() ) : ?>
              <img src="<?php esc_url( header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                      <?php endif; ?><?php bloginfo( 'name' ); ?>
          </a>
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