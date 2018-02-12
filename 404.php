<?php
/**
 * Template part for if no contend found
 *
 */
?>

<?php get_header(); ?>
    <div class="not-found-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="not-found-content text-center">
                        <i class="fa fa-meh-o"></i>
                        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'violet' ); ?></h1>
                        <p><?php _e( 'It looks like nothing was found at this location.', 'violet' );?></p>
                        <div class="serach-area">
                          <?php get_search_form(); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();