    <!-- Partner -->
    <div class="partners section-padding" style="<?php violet_bg('partner');?>">
        <div class="overlay" style="<?php violet_overlay('partner');?>"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="partner partner-slide owl-carousel text-center">
                <?php $args = array( 'post_type' => 'partner');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $post_id = get_the_ID();
                    $post_custom = get_post_custom($post_id);
                    $partner_name = $post_custom["name"][0];
                    $partner_url = $post_custom["website"][0];
                    $partner_image_url='';

                if ( has_post_thumbnail() ){$partner_image_url = wp_get_attachment_url( get_post_thumbnail_id() );}
                
                ?>
    					<a href="<?php echo $partner_url; ?>" target="_blank">
                        <img src="<?php echo $partner_image_url; ?>" class="wow fadeInUp" alt="<?php echo $partner_name; ?>"></a>
                <?php endwhile;?>        
    				</div>
    			</div>
    		</div>
    	</div>
    </div>