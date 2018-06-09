<?php
/**
 * Template part for Search result.
 *
 */
?>

<?php get_header(); ?>
    <div class="container pd-100">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header content-bar">
                <?php if ( have_posts() ) : ?>  
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'violet' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <?php else : ?>
                        <h1 class="page-title"><?php _e( 'Nothing Found', 'violet' ); ?></h1>
                <?php endif; ?>
                </div><!-- .page-header --> 
            </div>
            <div class="col-md-9">
                <article class="post wow fadeInUp">
                    <div class="entry-content">    
                        <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content', 'excerpt' );
                            endwhile;
                            the_posts_pagination( array(
                                'mid_size' => 3,
                                'prev_text' => '<i class="fa fa-chevron-left"></i> ',
                                'next_text' => ' <i class="fa fa-chevron-right"></i>',
                            ) );
                        else : ?>
                            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'violet' ); ?></p>
                            <?php
                                get_search_form();
                        endif;
                        ?>
                    </div>
                </article>
            </div>
            <div class="col-md-3 hidden-xs">
                <?php  get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>