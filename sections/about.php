<?php 
    $about_section_title = esc_attr( get_theme_mod('about_section_title',__('About Us','violet')) ); 
    $about_section_desc = get_theme_mod('about_section_desc');

    $user_photo = esc_attr( get_theme_mod('user_photo') ); 
    $user_name = esc_attr( get_theme_mod('user_name',__('Rakib Hossain','violet')) );
    $user_age = esc_attr( get_theme_mod('user_age',__('21','violet')) );
    $user_job = esc_attr( get_theme_mod('user_job',__('Web Developer','violet')) );
    $user_description = get_theme_mod('user_description',__('Expert in wordpress theme development.','violet'));


    $about_section_button_cv_text = esc_attr( get_theme_mod('about_section_button_cv_text',__('CV','violet')) );
    $about_section_button_cv_link = esc_url( get_theme_mod('about_section_button_cv_link',__('#contact','violet')) );    
    $about_section_button_hire_text = esc_attr( get_theme_mod('about_section_button_hire_text',__('Hire','violet')) );
    $about_section_button_hire_link = esc_url( get_theme_mod('about_section_button_hire_link',__('#contact','violet')) );

?>
    
    <!-- About -->
    <section id="about" class="about section-padding">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-md-offset-3">
    				<div class="title text-center">
						<h2 class="wow fadeInUp"><?php echo $about_section_title; ?></h2>
						<div class="wow fadeInUp section-s-t"><?php echo $about_section_desc; ?></div>
    				</div>
    			</div>
	               <?php if($user_photo!=''){?>   
    			<div class="col-md-4">
    				<div class="about-photo">
    					<div class="photo text-center wow fadeInUp">
                            <div class="bottom-right-border"></div>
                        <img src="<?php echo $user_photo; ?>" alt="<?php echo $user_name; ?>" title="<?php echo $user_name; ?>" class="img-responsive" />
    					</div>
    				</div><div class="clear-position"></div>
    			</div><?php }?>
    			<?php if($user_photo==''): ?>
    			<div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
    			<?php else: ?> <div class="col-md-8 col-sm-12"> <?php endif; ?>
    				<div class="about-content">
    					<div class="description wow fadeInUp">
    						<?php echo $user_description;?>
    					</div>
    					<div class="name_skill wow fadeInUp">
    						<ul>
    							<li><span class="text-cap">NAME</span> : <span id="about_name"><?php echo $user_name; ?></span></li>
    							<li><span class="text-cap">JOB</span> TITLE : <span id="about_job"><?php echo $user_job; ?></span></li>
    							<li><span class="text-cap">AgE</span> : <span id="about_age"><?php echo $user_age; ?></span></li>
    							<li><span class="text-cap">LOCATION</span> : <span id="about_addr"><?php echo get_contact_address(); ?></span></li>
    						</ul>
    					</div>
                        <div class="sm-center">
                            <a href="<?php echo $about_section_button_cv_link; ?>" id="about_cv" class="violet-btn about-btn wow fadeInLeft">  <?php echo $about_section_button_cv_text; ?> </a>

                            <a href="<?php echo $about_section_button_hire_link; ?>" id="about_hire" class="violet-btn about-btn wow fadeInRight">  <?php echo $about_section_button_hire_text; ?> </a>
                        
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>