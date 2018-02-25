<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Violet
 * @since 1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>

  <?php 
	$violet_homeslider_show = get_theme_mod('violet_homeslider_show');
	if( isset($violet_homeslider_show) && $violet_homeslider_show != 0 ):
    get_template_part( 'sections/home' );
	endif;

    $violet_descript_show = get_theme_mod('violet_descript_show');
	if( isset($violet_descript_show) && $violet_descript_show != 0 ):
    get_template_part( 'sections/about' );
	endif;

 
	$violet_skill_show = get_theme_mod('violet_skill_show');
	if( isset($violet_skill_show) && $violet_skill_show != 0 ):

     get_template_part( 'sections/skill' );

    endif;


	$violet_service_show = get_theme_mod('violet_service_show');

	if( isset($violet_service_show) && $violet_service_show != 0 ):

    get_template_part( 'sections/service' );

    endif;

	$violet_counter_show = get_theme_mod('violet_counter_show');

	if( isset($violet_counter_show) && $violet_counter_show != 0 ):

    get_template_part( 'sections/counter' );

    endif;


	$violet_portfolio_show = get_theme_mod('violet_portfolio_show');

	if( isset($violet_portfolio_show) && $violet_portfolio_show != 0 ):

    get_template_part( 'sections/portfolio' );

    endif;

	$violet_testimonial_show = get_theme_mod('violet_testimonial_show');

	if( isset($violet_testimonial_show) && $violet_testimonial_show != 0 ):

    get_template_part( 'sections/testimonial' );

    endif;

	$violet_ourteam_show = get_theme_mod('violet_ourteam_show');

	if( isset($violet_ourteam_show) && $violet_ourteam_show != 0 ):

    get_template_part( 'sections/team' );

    endif;

	$violet_partner_show = get_theme_mod('violet_partner_show');

	if( isset($violet_partner_show) && $violet_partner_show != 0 ):

    get_template_part( 'sections/partner' );

    endif;

	$violet_blog_show = get_theme_mod('violet_blog_show');

	if( isset($violet_blog_show) && $violet_blog_show != 0 ):

    get_template_part( 'sections/blog' );

    endif;

	$violet_call_show = get_theme_mod('violet_call_show');

	if( isset($violet_call_show) && $violet_call_show != 0 ):

    get_template_part( 'sections/call-to' );
    endif;

	$violet_contact_show = get_theme_mod('violet_contact_show');

	if( isset($violet_contact_show) && $violet_contact_show != 0 ):

    get_template_part( 'sections/contact' );

    endif;
?>
<?php get_footer();?> 