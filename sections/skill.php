<?php 
    $skill_section_title = esc_attr( get_theme_mod('violet_myskill_title',__('My Skill','violet')) ); 
    $skill_section_desc = get_theme_mod('violet_myskill_description',__('Here is my Latest Skills','violet'));
?>
    <!-- Skills -->
    <section id="skill" class="skills section-padding" style="<?php violet_bg('skill');?>">
        <div class="overlay" style="<?php violet_overlay('skill');?>"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-md-offset-3">
    				<div class="title text-center">
						<h2 class="wow fadeInUp"><?php echo $skill_section_title; ?></h2>
						<div class="wow fadeInUp section-s-t-bg"><?php echo $skill_section_desc; ?></div>
    				</div>
    			</div>
			</div>
		</div>
		<div class="pd container">
			<div class="row">

                <?php $args = array( 'post_type' => 'skill');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();

                    $post_id = get_the_ID();
                    $post_custom = get_post_custom($post_id);
                    $skill_percent = $post_custom["skill_percent"][0];
                    $skill_color = $post_custom["skill_color"][0];
                    $skill_icon = get_template_directory_uri() . '/assets/images/ae.png';
                ?>


                <?php if ( has_post_thumbnail() ) {
                $skill_icon = wp_get_attachment_url( get_post_thumbnail_id() );
                }?>

                <div class="col-md-4 col-sm-6">
                    <div class="skill text-center  wow fadeInUp">
                        <a href="<?php the_permalink(); ?>">
                            <div class="skill-icon text-center  wow fadeInUp" style="background-image: url(<?php echo $skill_icon;?>);"></div>
                        </a>
                        <div class="skill-title">
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="wow fadeInUp"><?php the_title()?></h4>
                            </a>
                        </div>
                        <div class="skill-progress">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="background-color: <?php echo $skill_color; ?>;width: <?php echo $skill_percent; ?>%;">
                                <span class="sr-only"><?php echo $skill_percent; ?>% Complete (success)</span>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>


    		</div>
    	</div>
    </section>