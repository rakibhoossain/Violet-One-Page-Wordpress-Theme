 <?php 
//Main Section

    $main_section_message = get_theme_mod('main_section_message',__('<ul><li>Hello</li><li>I\'m Rakib Hossain</li></ul>','violet'));
    $user_position = get_theme_mod('user_skill',__('<ul><li>Web Designer</li><li>Web Developer</li></ul>','violet'));

    $main_section_button_text = esc_attr( get_theme_mod('main_section_button_text',__('Hire Me Now!','violet')) );
    $main_section_button_link = esc_url( get_theme_mod('main_section_button_link','#contact') );

?>       
           
           
           <div class="main section-fullscreen" style="<?php violet_bg('header');?>">
            <div class="overlay" style="<?php violet_overlay('header');?>"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="hero-content text-center">
                            <div class="hero-cta"><?php echo $main_section_message; ?></div>
                            <div class="hero-cat">
                                <?php echo $user_position; ?>
                            </div>
                            <a href="<?php echo $main_section_button_link; ?>" class="wow fadeInUp violet-btn slide-btn"><?php echo $main_section_button_text; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-social wow fadeInUp">
                <ul>
                    <?php echo social_show_link(); ?>
                </ul>
            </div>
        </div>