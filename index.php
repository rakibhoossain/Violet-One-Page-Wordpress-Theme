<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 */
?>
<?php get_header(); ?>

<!-- Single Post -->
<div class="fixnav-pd">
    <div class="container">
        <div class="row">
            <?php if(have_posts()): ?>
                <div class="col-md-9 pd-bottom-100">
                    <?php while ( have_posts() ) : the_post();?>
                        <div class="col-md-6">
                        <?php  get_template_part( 'template-parts/content', get_post_format()); ?>
                        </div>     
                    <?php endwhile;?>
                    <!-- Post loop ends -->

                    <div class="clearfix"></div>

                    <?php   
                    the_posts_pagination( array(
                        'mid_size' => 3,
                        'prev_text' => '<i class="fa fa-chevron-left"></i> ',
                        'next_text' => ' <i class="fa fa-chevron-right"></i>',
                    ) );
                    ?>

                    <?php 
                else:
                    get_template_part( 'template-parts/content', 'none' );            
                endif;
                ?>

            </div>
            <div class="col-md-3 hidden-xs">
               <?php  get_sidebar(); ?>
           </div>
       </div>
   </div>
</div> 

<!-- Single Post end -->   
<?php get_footer(); ?>
