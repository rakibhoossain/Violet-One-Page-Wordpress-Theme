<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search"  class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'violet' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <input type="submit" class="search-btn" value="Search">
</form>