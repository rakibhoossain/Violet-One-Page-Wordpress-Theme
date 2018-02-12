<?php 
    $violet_contact_title = esc_attr( get_theme_mod('violet_contact_title',__('Contact Us','violet')) ); 
    $violet_contact_sub_title = get_theme_mod('violet_contact_sub_title',__('Here is our contact imformation','violet'));
?> 
<!-- contact full -->
    <section id="contact" class="contact-full section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="title text-center">
                        <h2 class="wow fadeInUp"><?php echo $violet_contact_title; ?></h2>
                        <div class="wow fadeInUp section-s-t"><?php echo $violet_contact_sub_title; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7" id="contact-map">
                    <?php violet_conact_map(); ?>
                </div>
                <div class="col-md-4 col-md-offset-1" id="contact-form">
                    <?php violet_conact_form(); ?>
                </div>
            </div>
        </div>
    </section>