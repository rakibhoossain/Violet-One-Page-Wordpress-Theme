<!-- Footer -->
   <?php
     $footer_credits = get_theme_mod('footer_credits');
     $footer_bg = esc_attr( get_theme_mod('footer_bg_color') );
    ?>

     
    <footer id="footer" <?php if ( isset($footer_bg) && $footer_bg != ''){ ?> style="background-color: <?php echo $footer_bg ?>" <?php }?>>       
    	<div class="contact">
    		<div class="container">
    			<div class="row  text-center">
    				<div class="col-md-12">
    					<div class="contact_title wow fadeInUp">
    						<h2 class="bottom-logo wow fadeInUp"><?php bloginfo( 'name' ); ?></h2>
    					</div>
    				</div>
    			<div class="col-md-offset-2 col-md-3 text-center wow fadeInUp">
	     			<a href="tel:<?php echo get_contact_phone(); ?>" id="tel"><i class="fa fa-phone-square" aria-hidden="true"></i>Hotline <?php echo get_contact_phone(); ?></a>
	  			</div>
				<div class="col-md-2 text-center wow fadeInUp">
	     			<a href="mailto:<?php echo get_contact_email(); ?>" id="mailto"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo get_contact_email(); ?></a>
				</div>
				<div class="col-md-3 text-center wow fadeInUp">
	  				<i class="fa fa-map-o" aria-hidden="true"></i><?php echo get_contact_address(); ?>
    			</div>
				</div>
    		</div>
    	</div>
    	<div class="footer text-center container">
    		<ul class="bottom-social wow fadeInUp">
                <?php echo get_social_link(); ?>
			</ul>
			<div class="copyright-text wow fadeInUp">
                <?php if ( isset($footer_credits) && $footer_credits != '') { ?>
                    <?php echo $footer_credits; ?>
                <?php } echo '<p>'.theme_author().'</p>'; ?>
			</div>
    	</div>
    </footer>
<!-- To top -->
<a href="#top" id="toTop" style="display: block;"><i class="fa fa-angle-up"></i><span id="toTopHover" style="opacity: 1;"></span></a>

<?php wp_footer(); ?>
</body>
</html>