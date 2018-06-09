<?php
//portfolio
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

                <div class="col-sm-4 col-xs-12 col-md-4 mix <?php if($terms){foreach ($terms as $term) { echo  strtolower(preg_replace('/[^a-zA-Z]+/', '-', $term->name)). ' '; }} ?>" data-bound="" style="display: inline-block;">
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