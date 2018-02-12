<?php get_header(); ?>
<!-- Single Post -->
<div class="fixnav-pd">
    <div class="container">
        <div class="row">
            <div class="col-md-9 pd-bottom-100">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'single' );

                        the_post_navigation(array( 
                            'prev_text' => '<i class="fa fa-chevron-left"></i> %title',
                            'next_text' => '%title <i class="fa fa-chevron-right"></i>',
                        ));
                        // If comments are open or we have at least one comment, load up the comment template.

                        if ( comments_open() || get_comments_number() ) : comments_template(); endif;
                endwhile;
                    else:
                        get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>
            <!--End Loop-->
        </div>
        <div class="col-md-3 hidden-xs">
         <?php  get_sidebar(); ?>
     </div>
 </div>
</div>
</div>  
<!-- Single Post end -->   
<?php get_footer(); ?>