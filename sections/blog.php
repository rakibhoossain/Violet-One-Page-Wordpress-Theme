<?php 
    $blog_title = esc_attr( get_theme_mod('blog_title',__('Our Blog','violet')) ); 
    $blog_sub_title = get_theme_mod('blog_sub_title',__('Here is our latest news','violet'));
?>    
<!-- Blog -->
    <section id="blog" class="blog section-padding">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-md-offset-3">
    				<div class="title text-center">
    					<h2 class="wow fadeInUp"><?php echo $blog_title; ?></h2>
    					<div class="wow fadeInUp section-s-t"><?php echo $blog_sub_title; ?></div>
    				</div>
    			</div>
			</div>
		</div>
		<div class="container">
			<div class="row post-container">
                <?php $args = array( 'post_type' => 'post', 'posts_per_page' => get_theme_mod('blog_posts_per_page',2));
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>
                        
    			<div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="news-summary-height">
    				<div class="single-news single-news-thumb text-center">
                        <?php if ( has_post_thumbnail() ) {
                            echo '<a class="blog-thumb-link" href="' . esc_url( get_the_permalink() ) . '">';
                            $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                            echo '<div class="blog-thumb" style="background-image: url(' . esc_url( $feat_image_url ) . ')"></div></a>';
                        }?>
    					<div class="news">
	    					<div class="news-title">
	    						<div class="time_cmnt wow fadeInUp">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="blog-meta text-center">
                                                <a href="<?php the_permalink(); ?>" class="post-time"><time><?php the_time('F j, Y'); ?></time></a>
                                                <a href="<?php the_permalink(); ?>" class="post-comment"><i class="fa fa-comment"></i>&nbsp;&nbsp;<span class="cmnt-cnt"><?php echo get_comments_number();?></span></a>
                                            </div>
                                        </div>
                                    </div>
	    						</div>
	    						<a href="<?php the_permalink(); ?>"><h4 class="wow fadeInUp"><?php the_title()?></h4></a>
	    					</div>
	    					<div class="news-summery text-justify">
	    					<p class="wow fadeInUp">
                            <?php 
                             echo mb_strimwidth(get_the_content(), 0, 180, '<a href="'. get_the_permalink() .'" class="read-more-btn"> '. __('READ MORE...','violet').'</a>');
                            ?>
                            </p>
	    					</div>
    					</div>
    				</div>
                    </div>

    			</div>					
                <?php endwhile;?>
    		</div>
    	</div>
    </section>