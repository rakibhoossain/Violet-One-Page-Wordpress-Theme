<?php
/**
 * The template for displaying Author pages.
 *
 */
get_header();
?>
<!-- *** Single Post Starts *** -->
<div class="fixnav-pd">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()) : ?>
                    <div class="page-header content-bar">
                        <?php
                        the_archive_title( '<h4 class="page-title">', '</h4>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </div><!-- .page-header -->
                <?php endif; ?>
            </div>
            <div class="col-md-9">
                <?php

                if (have_posts()) : while (have_posts()) : the_post(); ?>  
                <!-- Post starts  -->
                <div class="col-md-6">
                    <?php  get_template_part( 'template-parts/content'); ?>
                </div>

                <?php
            endwhile;
        else:
            ?>
            <div>
                <p>
                    <?php _e('Sorry no post matched your criteria', 'violet'); ?>
                </p>
            </div>
        <?php endif; ?>
        <!--End Loop-->


        <!-- *** Post loop ends*** -->

                    <?php // Previous/next page navigation.
                    the_posts_pagination( array(
                        'mid_size' => 3,
                        'prev_text' => '<i class="fa fa-chevron-left"></i> ',
                        'next_text' => ' <i class="fa fa-chevron-right"></i>',
                    ) );
                    ?>

                </div>

                <div class="col-md-3 hidden-xs">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>
