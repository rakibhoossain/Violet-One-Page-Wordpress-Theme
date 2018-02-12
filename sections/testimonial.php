    <!-- Testimonials -->
    <section id="testimonial" class="testimonials section-padding" style="<?php violet_bg('testimonial');?>">
        <div class="overlay" style="<?php violet_overlay('testimonial');?>"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-offset-1 col-md-10">
    			  <div class="testimonial-slide owl-carousel owl-theme">


                <?php $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 3 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $post_id = get_the_ID();
                    $post_custom = get_post_custom($post_id);
                    $post_name = $post_custom["name"][0];
                    $post_position = $post_custom["position"][0];
                    $post_rating = $post_custom["rating"][0];
                ?>
                    <div class="testimonial text-center">
                        <div class="person">

                <?php if ( has_post_thumbnail() ) {
                $testimonial_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                     echo '<img src="'.$testimonial_image_url.'" alt="'.$post_name.'" />';
                }?>
                   
                            <h3><?php echo $post_name; ?></h3>
                            <p><?php echo $post_position; ?></p>
                        </div>
                        <div class="comment">
                            <?php the_content()?>
                            <div class="rating">
                                <ul>
                                <?php for ($i=1; $i <= $post_rating; $i++) { echo '<li><i class="fa fa-star"></i></li>';}?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
				  </div>
    			</div>
    		</div>
    	</div>
    </section>
