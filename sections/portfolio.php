<?php 
    $violet_portfolio_title = esc_attr( get_theme_mod('violet_portfolio_title',__('My Portfolio','violet')) ); 
    $violet_portfolio_subtitle = get_theme_mod('violet_portfolio_subtitle',__('Workes I have done recently','violet'));
?>
<!-- Portfolio -->
    <section id="portfolio" class="portfolio section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="title text-center">
                        <h2 class="wow fadeInUp"><?php echo $violet_portfolio_title; ?></h2>
                        <div class="wow fadeInUp section-s-t"><?php echo $violet_portfolio_subtitle ?></div>
                    </div>
                </div>
                <div class="col-md-12 text-center wow fadeInUp" id="items-btm">
                    <ul>
                        <li class="filter btn-custom btn-menu" data-filter="all">All</li>
                        <?php $ridianur_taxonomy = 'portfolio_category';
                            $ridianur_terms = get_terms($ridianur_taxonomy); // Get all terms of a taxonomy
                            if ( $ridianur_terms && !is_wp_error( $ridianur_terms ) ) :
                                foreach ( $ridianur_terms as $ridianur_term ) { ?>
                        <li class="filter btn-custom btn-menu" data-filter=".<?php echo  strtolower(preg_replace('/[^a-zA-Z]+/', '-', $ridianur_term->name)); ?>"><?php echo esc_attr( $ridianur_term->name); ?></li>
                        <?php } endif;?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row items portfolio-post-parent">
            <?php
                $loop = new WP_Query( get_query_args_portfolio() );
                while ( $loop->have_posts() ) : $loop->the_post();
                    get_template_part( 'template-parts/content', 'portfolio');
                endwhile;
            ?>
            </div>             
        <?php

        // don't display the button if there are not enough posts
        if (  $loop->max_num_pages > 1 )
            echo '
            <div class="clearfix"></div>
            <div id="portfolio-load" class="text-center wow fadeInRight">
                <span class="portfolio_loadmore btn-custom">'.__('Load more', 'violet' ).'<span class="portfolio-loading"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                </span>
            </div>';
        ?>
        </div>
    </section>
<div class="clear-position"></div>