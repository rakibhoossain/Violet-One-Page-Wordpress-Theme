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
			<div class="row">
                <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>
                        <?php if ( has_post_thumbnail() ) {
                        $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                    }
                        ?>
    			<div class="col-md-4 col-sm-6 col-xs-12">
    				<div class="single-news text-center"><a href="<?php the_permalink(); ?>">
                        <div class="blog-thumb" style="background-image: url(<?php echo $feat_image_url;?>);"></div></a>
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
$summery_limit = 180;
$content = get_the_content();
$read_more_link = get_the_permalink();
 echo mb_strimwidth($content, 0, $summery_limit, '<a href="'. $read_more_link .'" class="read-more-btn"> READ MORE...</a>');
?>
                            </p>
	    					</div>
    					</div>
    				</div>
    			</div>					
<?php endwhile;?>


    		</div>
    	</div>
    </section>