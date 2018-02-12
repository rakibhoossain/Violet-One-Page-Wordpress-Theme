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
            <div class="row items">
                <?php $args = array( 'post_type' => 'portfolio');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();

                    $post_id = get_the_ID();
                    $terms = get_the_terms( $post_id, 'portfolio_category' );
                    $post_custom = get_post_custom($post_id);

                    $portfolio_title = get_the_title();

                    $portfolio_sub = $post_custom["sub_name"][0];
                    $portfolio_img = $post_custom["portfolio_img"][0];
                    $portfolio_link = esc_url($post_custom["portfolio_link"][0]);
                    $portfolio_thumb_url = get_template_directory_uri() . '/screenshot.png';

                    if ( has_post_thumbnail() ) {
                        $portfolio_thumb_url = wp_get_attachment_url( get_post_thumbnail_id() );
                    }
                ?>

                <div class="col-sm-4 col-xs-12 col-md-4 mix <?php if($terms){foreach ($terms as $term) { echo  strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term->name)). ' '; }} ?>">
                    <div class="portfolio-item  wow fadeInUp">
                        <div class="portfolio-photo">
                            <div class="portfolio-thumb" style="background-image: url(<?php echo $portfolio_thumb_url;?>);"></div>
                            <div class="portfolio-hover animated zoomIn">
                                <div class="icon">
                                <?php
                                    if (strlen($portfolio_link)>=5) {?>

                                <a href="<?php echo $portfolio_link; ?>" target="_blank"><i class="fa fa-search"></i></a>
                                    <?php
                                    } else {?>
                                <a href="<?php echo $portfolio_img; ?>" data-fancybox="images" data-caption="<?php echo $portfolio_title; ?>"><i class="fa fa-search"></i></a>                                        
                                    <?php } ?>

                                </div>
                                <div class="footer">
                                    <h3><?php echo $portfolio_title; ?></h3>
                                    <p><?php echo $portfolio_sub; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>
<div class="clear-position"></div>