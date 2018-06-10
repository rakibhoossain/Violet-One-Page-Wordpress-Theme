<?php
//  =============================
//  = Default Theme Customizer Settings  =
//  @ violet
//  =============================


function violet_th_customize_control_enqueue_scripts() {
    wp_register_script('alpha-color-picker',get_stylesheet_directory_uri() . '/inc/libraries/alpha-color-picker/alpha-color-picker.js');
    wp_register_style('alpha-color-picker',get_stylesheet_directory_uri() . '/inc/libraries/alpha-color-picker/alpha-color-picker.css');

}
add_action('customize_controls_enqueue_scripts', 'violet_th_customize_control_enqueue_scripts');

/*theme customizer*/
function violet_customize_register($wp_customize) {
    require_once get_template_directory() . '/inc/libraries/alpha-color-picker/alpha-color-picker.php';

    // Load customize callback.
    require_once get_template_directory() . '/inc/customizer/callback.php';

    /** Custom-Customizer additions **/
    require_once get_template_directory() . '/inc/customizer/sanitize.php';

    /** Toggle additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-customizer-toggle-control.php';

    /** CF7 additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-cf7-custom-control.php';

    /** Map additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-map-custom-control.php';

    /** Notice **/
    require_once get_template_directory() . '/inc/customizer/class/class-simple-notice-control.php';

    /** Text editor additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-text-editor-custom-control.php';
    

    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    
    //  ==============================
    //  ====== General Settings ======
    //  ==============================
    
    $wp_customize->get_section('title_tagline')->title    = esc_html__('General Settings', 'violet');
    $wp_customize->get_section('title_tagline')->priority = 3;
    //___Header Settings___//
    $wp_customize->add_section('header-settings', array(
        'title' => __('Section Control', 'violet'),
        'description' => __('Which sections do you want to show or hide, simply check', 'violet'),
        'priority' => 6
    ));
    /* show/hide */
    $wp_customize->add_setting('violet_homeslider_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_homeslider_show', array(
        'label'       => esc_html__( 'Enable main section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 1,
        'type'        => 'ios',// light, ios, flat
    )));
    
    
    /* description show/hide */
    $wp_customize->add_setting('violet_descript_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_descript_show', array(
        'label'       => esc_html__( 'Enable About Us section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 2,
        'type'        => 'ios',// light, ios, flat
    )));
    
    /* Skill show/hide */
    $wp_customize->add_setting('violet_skill_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_skill_show', array(
        'label'       => esc_html__( 'Enable My Skill section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 3,
        'type'        => 'ios',// light, ios, flat
        'active_callback' => 'violet_is_active_custom_meta',
    )));
    /* Services show/hide */
    $wp_customize->add_setting('violet_service_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_service_show', array(
        'label'       => esc_html__( 'Enable My Services section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 4,
        'type'        => 'ios',// light, ios, flat
        'active_callback' => 'violet_is_active_custom_meta',
    )));
    
    /* our counter show/hide */
    $wp_customize->add_setting('violet_counter_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_counter_show', array(
        'label'       => esc_html__( 'Enable counter section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 5,
        'type'        => 'ios',// light, ios, flat
    )));
    /* Portfolio show/hide */
    $wp_customize->add_setting('violet_portfolio_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_portfolio_show', array(
        'label'       => esc_html__( 'Enable Portfolio section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 6,
        'type'        => 'ios',// light, ios, flat
        'active_callback' => 'violet_is_active_custom_meta',
    )));
    /* Testimonial show/hide */
    $wp_customize->add_setting('violet_testimonial_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_testimonial_show', array(
        'label'       => esc_html__( 'Enable Testimonial section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 7,
        'type'        => 'ios',// light, ios, flat
        'active_callback' => 'violet_is_active_custom_meta',
    )));
    
    /* our team show/hide */
    $wp_customize->add_setting('violet_ourteam_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_ourteam_show', array(
        'label'       => esc_html__( 'Enable team section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 8,
        'type'        => 'ios',// light, ios, flat
        'active_callback' => 'violet_is_active_custom_meta',
    )));
    
    /* our partner show/hide */
    $wp_customize->add_setting('violet_partner_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_partner_show', array(
        'label'       => esc_html__( 'Enable partner section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 9,
        'type'        => 'ios',// light, ios, flat
        'active_callback' => 'violet_is_active_custom_meta',
    )));
    /* blog show/hide */
    $wp_customize->add_setting('violet_blog_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_blog_show', array(
        'label'       => esc_html__( 'Enable blog section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 10,
        'type'        => 'ios',// light, ios, flat
    )));
    /* call to action show/hide */
    $wp_customize->add_setting('violet_call_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_call_show', array(
        'label'       => esc_html__( 'Enable Call to action?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 11,
        'type'        => 'ios',// light, ios, flat
    )));
    /* contact show/hide */
    $wp_customize->add_setting('violet_contact_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 1,
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_contact_show', array(
        'label'       => esc_html__( 'Enable Contact Us section?', 'violet' ),
        'section'     => 'header-settings',
        'priority' => 12,
        'type'        => 'ios',// light, ios, flat
    )));
    
    
           
        //  ===================================
        //  ====      Profile Settings     ====
        //  ===================================
        $wp_customize->add_section('user_profile', array(
            'title' => __('Profile Settings', 'violet'),
            'priority' => 5,
        ));
        
        $wp_customize->add_setting('user_name', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => 'Rakib Hossain'
        ));
        $wp_customize->add_control('user_name', array(
            'label' => __('Name: ', 'violet'),
            'settings' => 'user_name',
            'section' => 'user_profile',
            'type' => 'text',
            'priority' => 1
        ));
        $wp_customize->add_setting('user_age', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_int',
            'default' => 21
        ));
        $wp_customize->add_control('user_age', array(
            'label' => __('Age: ', 'violet'),
            'settings' => 'user_age',
            'section' => 'user_profile',
            'type' => 'text',
            'priority' => 2
        ));
    
        $wp_customize->add_setting('user_description', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('Expert in Web Design .Taken a training from Basis Institute of Technology and Management (BITM) for the special field of Web Design.','violet'),
        ));

        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'user_description', array(
            'type'        => 'violet-text-editor',
            'label'   => __('About You', 'violet'),
            'section' => 'user_profile',
            'priority' => 3
        ) ) );
        $wp_customize->add_setting('user_skill', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('<ul><li>Web Designer</li><li>Web Developer</li></ul>','violet')
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'user_skill', array(
            'type'        => 'violet-text-editor',
            'label'   => __('Professional skill list. Max 3', 'violet'),
            'section' => 'user_profile',
            'priority' => 4
        )));
        $wp_customize->add_setting('user_job', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => 'Web Designer'
        ));
        $wp_customize->add_control('user_job', array(
            'label' => __('Job Title', 'violet'),
            'settings' => 'user_job',
            'section' => 'user_profile',
            'type' => 'text',
            'priority' => 5
        ));

        $wp_customize->add_setting('user_phone', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => '+8801776217594'
        ));
        $wp_customize->add_control('user_phone', array(
            'label' => __('Pnone Number: ', 'violet'),
            'settings' => 'user_phone',
            'section' => 'user_profile',
            'type' => 'text',
            'priority' => 6
        ));
        $wp_customize->add_setting('user_email', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => 'serakib@gmail.com'
        ));
        $wp_customize->add_control('user_email', array(
            'label' => __('Email: ', 'violet'),
            'settings' => 'user_email',
            'section' => 'user_profile',
            'type' => 'text',
            'priority' => 7
        ));
        $wp_customize->add_setting('user_address', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('Paikpara,Mirpur,Dhaka-1216,Bangladesh','violet')
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'user_address', array(
            'type'        => 'violet-text-editor',
            'label'   => __('Your Full Address', 'violet'),
            'section' => 'user_profile',
            'priority' => 8
        )));
    
        // Image
        $wp_customize->add_setting('user_photo', array(
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage',
            'default' => esc_url(get_template_directory_uri() . '/images/rakib.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'user_photo', array(
            'label' => __('Profile Photo', 'violet'),
            'section' => 'user_profile',
            'settings' => 'user_photo',
            'priority' => 9
        )));
         
    
    
    if (class_exists('WP_Customize_Panel')):
        $wp_customize->add_panel('panel_section', array(
            'priority' => 7,
            'capability' => 'edit_theme_options',
            'title' => __('Section Settings', 'violet')
        ));
        
        
        
        //  ===================================
        //  ====  Main Section Settings    ====
        //  ===================================
        $wp_customize->add_section('main_section', array(
            'title' => __('Main Section', 'violet'),
            'priority' => 1,
            'description' => 'Main section informaition',
            'panel' => 'panel_section'
        ));
        
        $wp_customize->add_setting('main_section_message', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'default' => '<ul><li>Hello</li><li>I\'m Rakib Hossain<li></ul>',
            'sanitize_callback' => 'wp_kses_post'
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'main_section_message', array(
            'type'        => 'violet-text-editor',
            'label' => __('CTA Text', 'violet'),
            'section' => 'main_section',
            'priority' => 2
        )));
        
        $wp_customize->add_setting('main_section_button_text', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'transport' => 'postMessage',
            'default' => __('Hire Me','violet')
        ));
        $wp_customize->add_control('main_section_button_text', array(
            'label' => __('Button Text', 'violet'),
            'settings' => 'main_section_button_text',
            'section' => 'main_section',
            'type' => 'text',
            'priority' => 3
        ));
        $wp_customize->add_setting('main_section_button_link', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'default' => 'https://github.com/serakib'
        ));
        $wp_customize->add_control('main_section_button_link', array(
            'label' => __('Button Link URL', 'violet'),
            'settings' => 'main_section_button_link',
            'section' => 'main_section',
            'type' => 'text',
            'priority' => 4
        ));
        
        // Image
        $wp_customize->add_setting('header_bg', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => esc_url(get_template_directory_uri() . '/images/header_bg.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_bg', array(
            'label' => __('Image', 'violet'),
            'section' => 'main_section',
            'settings' => 'header_bg',
            'priority' => 5
        )));
        
        // Color
        $wp_customize->add_setting('header_color', array(
            'sanitize_callback' => 'violet_sanitize_rgba',
            'default'     => 'rgba(127, 86, 253, 0.93)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        ));
        $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'header_color', array(
            'label' => __('Color', 'violet'),
            'section' => 'main_section',
            'settings' => 'header_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
                ),
            'priority' => 7
        )));
        
        
        //  ===================================
        //  ==== About Us Section Settings ====
        //  ===================================
        $wp_customize->add_section('about_section', array(
            'title' => __('About US Section', 'violet'),
            'priority' => 2,
            'panel' => 'panel_section'
        ));
        
        $wp_customize->add_setting('about_section_title', array(
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('About Us', 'violet'),
        ));
        $wp_customize->add_control('about_section_title', array(
            'label' => __('About Us Title', 'violet'),
            'settings' => 'about_section_title',
            'section' => 'about_section',
            'type' => 'text',
            'priority' => 1
        ));
        $wp_customize->add_setting('about_section_desc', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage',
            'default' => __('Your about description hear', 'violet'),
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'about_section_desc', array(
            'type'        => 'violet-text-editor',
            'label' => __('About Us Description', 'violet'),
            'section' => 'about_section',
            'priority' => 2
        )));
        $wp_customize->add_setting('about_section_button_cv_text', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('CV','violet')
        ));
        $wp_customize->add_control('about_section_button_cv_text', array(
            'label' => __('CV Button Text', 'violet'),
            'settings' => 'about_section_button_cv_text',
            'section' => 'about_section',
            'type' => 'text',
            'priority' => 3
        ));
        $wp_customize->add_setting('about_section_button_cv_link', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
        ));
        $wp_customize->add_control('about_section_button_cv_link', array(
            'label' => __('CV Button Link URL', 'violet'),
            'settings' => 'about_section_button_cv_link',
            'section' => 'about_section',
            'type' => 'text',
            'priority' => 4,
        ));
       $wp_customize->add_setting('about_section_button_hire_text', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('Hire','violet')
        ));
        $wp_customize->add_control('about_section_button_hire_text', array(
            'label' => __('Hire Button Text', 'violet'),
            'settings' => 'about_section_button_hire_text',
            'section' => 'about_section',
            'type' => 'text',
            'priority' => 5
        ));
        $wp_customize->add_setting('about_section_button_hire_link', array(
            'transport' => 'postMessage',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
        ));
        $wp_customize->add_control('about_section_button_hire_link', array(
            'label' => __('Hire Button Link URL', 'violet'),
            'settings' => 'about_section_button_hire_link',
            'section' => 'about_section',
            'type' => 'text',
            'priority' => 6
        ));

        
        /******************************************/
        /********** MY SKILL SECTION **************/
        /******************************************/
        
        $wp_customize->add_section('violet_myskill_section', array(
            'title' => __('My Skill', 'violet'),
            'priority' => 3,
            'panel' => 'panel_section',
            'active_callback' => 'violet_is_active_custom_meta',
        ));
        
        /* title */
        $wp_customize->add_setting('violet_myskill_title', array(
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('My Skill', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('violet_myskill_title', array(
            'label' => __('Title', 'violet'),
            'section' => 'violet_myskill_section',
            'priority' => 1
        ));
        
        /*subtitle */
        $wp_customize->add_setting('violet_myskill_description', array(
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('Provide your skill Description.', 'violet'),
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'violet_myskill_description', array(
            'type'        => 'violet-text-editor',
            'label' => __('Our skill Description', 'violet'),
            'section' => 'violet_myskill_section',
            'priority' => 2
        )));
        // Image
        $wp_customize->add_setting('skill_bg', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => esc_url(get_template_directory_uri() . '/images/skill_bg.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'skill_bg', array(
            'label' => __('Image', 'violet'),
            'section' => 'violet_myskill_section',
            'settings' => 'skill_bg',
            'priority' => 3
        )));
        
        // Color
        $wp_customize->add_setting('skill_color', array(
            'sanitize_callback' => 'violet_sanitize_rgba',
            'default'     => 'rgba(127, 86, 253, 0.93)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        ));
        $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'skill_color', array(
            'label' => __('Color', 'violet'),
            'section' => 'violet_myskill_section',
            'settings' => 'skill_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
                ),
            'priority' => 5
        )));

        
        //  =============================
        //  ====  Service Section    ====
        //  =============================
        
        $wp_customize->add_section('violet_service_section', array(
            'title' => __('Service section', 'violet'),
            'priority' => 4,
            'panel' => 'panel_section',
            'description' => __('The main content of this section is customizable in: Dashboard -> Services Our team section.', 'violet'),
            'active_callback' => 'violet_is_active_custom_meta',
        ));
        
        
        
        /* our service title */
        $wp_customize->add_setting('violet_service_title', array(
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('Service', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('violet_service_title', array(
            'label' => __('Title', 'violet'),
            'section' => 'violet_service_section',
            'priority' => 1
        ));
        
        /* our service subtitle */
        $wp_customize->add_setting('violet_service_description', array(
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('Provide your service description.', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'violet_service_description', array(
            'type'        => 'violet-text-editor',
            'label' => __('Service Description', 'violet'),
            'section' => 'violet_service_section',
            'priority' => 2
        )));



        //  ===================================
        //  ==== Counter Section Settings ====
        //  ===================================
        $wp_customize->add_section('violet_counter_general', array(
            'priority' => 5,
            'panel' => 'panel_section',
            'title' => __('Counter Section', 'violet'),
            'description' => __('*In order to get this section to show up on the front-page, make sure you have: 1) enabled static front-page & 2) have a widget placed in this sidebar. More specifically go to Widgets -> Front page - counter sidebar & place the Violet - Counter widget in here.', 'violet')
        ));
        
        
        // Image
        $wp_customize->add_setting('counter_bg', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => esc_url(get_template_directory_uri() . '/images/finished_bg.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'counter_bg', array(
            'label' => __('Image', 'violet'),
            'section' => 'violet_counter_general',
            'settings' => 'counter_bg',
            'priority' => 1
        )));
        

        // Color
        $wp_customize->add_setting('counter_color', array(
            'sanitize_callback' => 'violet_sanitize_rgba',
            'default'     => 'rgba(127, 86, 253, 0.93)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        ));
        $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'counter_color', array(
            'label' => __('Color', 'violet'),
            'section' => 'violet_counter_general',
            'settings' => 'counter_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
                ),
            'priority' => 3
        )));
        
        //  =============================
        //  ==== Portfolio Section   ====
        //  =============================
        
        $wp_customize->add_section('violet_portfolio_section', array(
            'title' => __('Portfolio section', 'violet'),
            'priority' => 6,
            'panel' => 'panel_section',
            'description' => __('The main content of this section is customizable in: Dashboard -> Protfolio.', 'violet'),
            'active_callback' => 'violet_is_active_custom_meta',
        ));
        
        /* portfolio title */
        $wp_customize->add_setting('violet_portfolio_title', array(
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('Portfolio', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('violet_portfolio_title', array(
            'label' => __('Title', 'violet'),
            'section' => 'violet_portfolio_section',
            'priority' => 2
        ));
        
        /* our portfolio subtitle */
        $wp_customize->add_setting('violet_portfolio_subtitle', array(
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('Provide your Portfolio Description.', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'violet_portfolio_subtitle', array(
            'type'        => 'violet-text-editor',
            'label' => __('Portfolio subtitle', 'violet'),
            'section' => 'violet_portfolio_section',
            'priority' => 3
        )));


        //  ===================================
        //  ====   Testimonials Section    ====
        //  ===================================
        $wp_customize->add_section('violet_testimonial_general', array(
            'priority' => 7,
            'panel' => 'panel_section',
            'title' => __('Testimonial Section', 'violet'),
            'description' => __('*You Can Change Background Settings.', 'violet'),
            'active_callback' => 'violet_is_active_custom_meta',
        ));
        
        
        // Image
        $wp_customize->add_setting('testimonial_bg', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => esc_url(get_template_directory_uri() . '/images/testimonial_bg.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'testimonial_bg', array(
            'label' => __('Image', 'violet'),
            'section' => 'violet_testimonial_general',
            'settings' => 'testimonial_bg',
            'priority' => 2
        )));
        
        // Color
        $wp_customize->add_setting('testimonial_color', array(
            'sanitize_callback' => 'violet_sanitize_rgba',
            'default'     => 'rgba(127, 86, 253, 0.93)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        ));
        $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'testimonial_color', array(
            'label' => __('Color', 'violet'),
            'section' => 'violet_testimonial_general',
            'settings' => 'testimonial_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
                ),
            'priority' => 2
        )));
        
        /******************************************/
        /********** OUR TEAM SECTION **************/
        /******************************************/
        
        $wp_customize->add_section('violet_ourteam_section', array(
            'title' => __('Our Team', 'violet'),
            'priority' => 8,
            'panel' => 'panel_section',
            'active_callback' => 'violet_is_active_custom_meta',
        ));
        
        /* our team title */
        $wp_customize->add_setting('violet_ourteam_title', array(
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('YOUR TEAM', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('violet_ourteam_title', array(
            'label' => __('Title', 'violet'),
            'section' => 'violet_ourteam_section',
            'priority' => 2
        ));
        
        /* our team subtitle */
        $wp_customize->add_setting('violet_ourteam_subtitle', array(
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'violet'),
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'violet_ourteam_subtitle', array(
            'type'        => 'violet-text-editor',
            'label' => __('Our team subtitle', 'violet'),
            'section' => 'violet_ourteam_section',
            'priority' => 3
        )));
        
        
        //  ===================================
        //  ====   Partner Section         ====
        //  ===================================
        $wp_customize->add_section('violet_partner_general', array(
            'priority' => 9,
            'panel' => 'panel_section',
            'title' => __('Partner Section', 'violet'),
            'description' => __('*You Can Change Background Settings.', 'violet'),
            'active_callback' => 'violet_is_active_custom_meta',
        ));
        
        
        // Image
        $wp_customize->add_setting('partner_bg', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => esc_url(get_template_directory_uri() . '/images/partner_bg.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'partner_bg', array(
            'label' => __('Image', 'violet'),
            'section' => 'violet_partner_general',
            'settings' => 'partner_bg',
            'priority' => 2
        )));
        
        // Color
        $wp_customize->add_setting('partner_color', array(
            'sanitize_callback' => 'violet_sanitize_rgba',
            'default'     => 'rgba(127, 86, 253, 0.93)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        ));
        $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'partner_color', array(
            'label' => __('Color', 'violet'),
            'section' => 'violet_partner_general',
            'settings' => 'partner_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
                ),
            'priority' => 3
        )));
        
        
        //  =============================
        //  ====  Blogs On HomePage  ====
        //  =============================
        
        $wp_customize->add_section('blog_area', array(
            'title' => __('Blog Area Options', 'violet'),
            'priority' => 10,
            'panel' => 'panel_section'
        ));
        
        $wp_customize->add_setting('blog_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Blog', 'violet'),
            'sanitize_callback' => 'violet_sanitize_textarea'
        ));
        $wp_customize->add_control('blog_title', array(
            'label' => __('Heading For Blogs', 'violet'),
            'settings' => 'blog_title',
            'section' => 'blog_area',
            'type' => 'text',
            'priority' => 1
        ));
        $wp_customize->add_setting('blog_sub_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Your blog Description', 'violet'),
            'sanitize_callback' => 'wp_kses_post'
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'blog_sub_title', array(
            'type'        => 'violet-text-editor',
            'label' => __('Subtitle For Blogs', 'violet'),
            'section' => 'blog_area',
            'priority' => 2
        )));
        $wp_customize->add_setting('blog_posts_per_page', array(
            'capability' => 'edit_theme_options',
            'default' => 2,
            'sanitize_callback' => 'violet_sanitize_textarea'
        ));
        $wp_customize->add_control('blog_posts_per_page', array(
            'label' => __('Number of posts to show', 'violet'),
            'settings' => 'blog_posts_per_page',
            'section' => 'blog_area',
            'type' => 'text',
            'priority' => 3,
        ));


        
        //  ===================================
        //  ====  Call To Action Section   ====
        //  ===================================
        $wp_customize->add_section('violet_call_to_general', array(
            'priority' => 11,
            'panel' => 'panel_section',
            'title' => __('Call To Action Section', 'violet'),
            'description' => __('*You Can Change Background Settings.', 'violet')
        ));
        
        // Image
        $wp_customize->add_setting('call-to-action_bg', array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => esc_url(get_template_directory_uri() . '/images/call-to-action_bg.jpg')
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'orbcall-to-action_bg', array(
            'label' => __('Image', 'violet'),
            'section' => 'violet_call_to_general',
            'settings' => 'call-to-action_bg',
            'priority' => 4
        )));
        
        // Color
        $wp_customize->add_setting('call-to-action_color', array(
            'sanitize_callback' => 'violet_sanitize_rgba',
            'default'     => 'rgba(127, 86, 253, 0.93)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        ));
        $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'call-to-action_color', array(
            'label' => __('Color', 'violet'),
            'section' => 'violet_call_to_general',
            'settings' => 'call-to-action_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
                ),
            'priority' => 6
        )));
        
        /* mesage */
        $wp_customize->add_setting('violet_call_to_message', array(
            'capability' => 'edit_theme_options',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
            'default' => __('<h2>You think we are cool? lets work together</h2>', 'violet')
            
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'violet_call_to_message', array(
            'type'        => 'violet-text-editor',
            'label' => __('Cal to action message', 'violet'),
            'section' => 'violet_call_to_general',
            'priority' => 3
        )));
        
        /* btn */
        $wp_customize->add_setting('violet_call_to_btn', array(
            'capability' => 'edit_theme_options',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea',
            'default' => __('CONTACT US', 'violet'),
        ));
        $wp_customize->add_control('violet_call_to_btn', array(
            'label' => __('Button text', 'violet'),
            'settings' => 'violet_call_to_btn',
            'section' => 'violet_call_to_general',
            'type' => 'text',
            'priority' => 1
        ));
        $wp_customize->add_setting('violet_call_to_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#'
        ));
        $wp_customize->add_control('violet_call_to_link', array(
            'label' => __('Button Link URL', 'violet'),
            'settings' => 'violet_call_to_link',
            'section' => 'violet_call_to_general',
            'type' => 'text',
            'priority' => 2
        ));
        
        //  ===================================
        //  ====  Contact Us Section   ====
        //  ===================================
        $wp_customize->add_section('violet_contact_area', array(
            'title' => __('Contact Section Options', 'violet'),
            'description' => __('Provide your Contact info.', 'violet'),
            'priority' => 12,
            'panel' => 'panel_section'
        ));
        
        $wp_customize->add_setting('violet_contact_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Contact Us.', 'violet'),
            'sanitize_callback' => 'violet_sanitize_textarea'
        ));
        $wp_customize->add_control('violet_contact_title', array(
            'label' => __('Heading Contact Us Section', 'violet'),
            'settings' => 'violet_contact_title',
            'section' => 'violet_contact_area',
            'type' => 'text',
            'priority' => 1
        ));
        $wp_customize->add_setting('violet_contact_sub_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Provide your Contact Us Description.', 'violet'),
            'sanitize_callback' => 'wp_kses_post'
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'violet_contact_sub_title', array(
            'type'        => 'violet-text-editor',
            'label' => __('Contact Us Sub title', 'violet'),
            'section' => 'violet_contact_area',
            'priority' => 2
        )));

        // Contact from select */
        $wp_customize->add_setting('violet_contact_form', array(
            'sanitize_callback' => 'violet_sanitize_number'
        ));

        $wp_customize->add_control( new Violet_CF7_Custom_Control( $wp_customize, 'violet_contact_form', array(
            'label'           => esc_html__( 'Select the contact form you\'d like to display (powered by Contact Form 7)', 'violet' ),
            'section'         => 'violet_contact_area',
            'priority'        => 3,
            'type'            => 'violet_contact_form_7',
            'active_callback' => 'violet_active_callback_cf7',
        )));

        // Contact form 7 notice */
        $wp_customize->add_setting('violet_contact_form_notice', array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'violet_sanitize_textarea_content'
        ));
        $wp_customize->add_control( new Simple_Notice_Custom_control( $wp_customize, 'violet_contact_form_notice', array(
                'label' => __( 'Contact Form','violet' ),
                'description' => __('To available Contact form, you need to use <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a>.','violet' ),
                'section' => 'violet_contact_area',
                'active_callback' => 'violet_is_active_callback_cf7',
                'priority' => 4
            )
        ));

        // Contactke map shortcode
        $wp_customize->add_setting('violet_contact_map', array(
            'capability' => 'edit_theme_options',
            'default' => '',
            'sanitize_callback' => 'violet_sanitize_textarea'
        ));
        $wp_customize->add_control('violet_contact_map', array(
            'label' => __('Provide Google Map shortcode.', 'violet'),
            'settings' => 'violet_contact_map',
            'section' => 'violet_contact_area',
            'type' => 'text',
            'active_callback' => 'violet_is_active_callback_map',
            'priority' => 5
        ));

         // Contact map select */
        $wp_customize->add_setting('violet_map_pg', array(
            'sanitize_callback' => 'violet_sanitize_number'
        ));

        $wp_customize->add_control( new Violet_Map_Custom_Control( $wp_customize, 'violet_map_pg', array(
            'label'           => esc_html__( 'Select the map you\'d like to display (powered by WP Google Maps)', 'violet' ),
            'section'         => 'violet_contact_area',
            'priority'        => 6,
            'type'            => 'violet_contact_map',
            'active_callback' => 'violet_active_callback_map',
        )));


    else:
        $wp_customize->add_section('oh_shit', array(
            'priority' => 6,
            'title' => __('Oh Shit!', 'violet'),
            'description' => __('WP_Customize_Panel class not exist. Contact with your admin', 'violet')
        ));
    endif;
    
         //  =============================
        //  ==== Footer Text Setting ====
        //  =============================
        
        $wp_customize->add_section('footer_text', array(
            'title' => __('Footer Text', 'violet'),
            'priority' => 8,
        ));
        $wp_customize->add_setting('footer_credits', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control( new Violet_Editor_Control( $wp_customize, 'footer_credits', array(
            'type'        => 'violet-text-editor',
            'label' => __('Copyright text', 'violet'),
            'section' => 'footer_text',
            'priority' => 1
        )));
        
    //  =============================
    //  ==== Social Media URL's  ====
    //  =============================
    
    $wp_customize->add_section('social_section', array(
        'title' => __('Social Media Options', 'violet'),
        'priority' => 10
    ));

    /* show/hide social media */
    $wp_customize->add_setting('violet_social_show', array(
        'sanitize_callback' => 'violet_sanitize_checkbox',
        'default' => 0,
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'violet_social_show', array(
        'label'       => esc_html__( 'Show social media?', 'violet' ),
        'section'     => 'social_section',
        'priority' => 1,
        'type'        => 'ios',// light, ios, flat
    )));





    $wp_customize->add_setting('social_facebook', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => 'Facebook url'
    ));
    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook Page URL', 'violet'),
        'section' => 'social_section',
        'settings' => 'social_facebook',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('social_twitter', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => 'Twitter url'
    ));
    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter Page URL', 'violet'),
        'section' => 'social_section',
        'settings' => 'social_twitter',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('social_linkedin', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => 'Linkedin url'
    ));
    $wp_customize->add_control('social_linkedin', array(
        'label' => __('Linkedin Page URL', 'violet'),
        'section' => 'social_section',
        'settings' => 'social_linkedin',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('social_github', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => 'Github url'
    ));
    $wp_customize->add_control('social_github', array(
        'label' => __('Github Page URL', 'violet'),
        'section' => 'social_section',
        'settings' => 'social_github',
        'type' => 'text'
    ));

    $wp_customize->add_setting('social_youtube', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => 'Youtube url'
    ));
    $wp_customize->add_control('social_youtube', array(
        'label' => __('YouTube URL', 'violet'),
        'section' => 'social_section',
        'settings' => 'social_youtube',
        'type' => 'text'
    ));

 
    //  =============================
    //  ====  Custom CSS options ====
    //  =============================
    $wp_customize->get_section('colors')->title = esc_html__('Custom Style', 'violet');
    $wp_customize->add_setting('custom_css', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'violet_sanitize_textarea',
        'priority' => 11
    ));
    $wp_customize->add_control('custom_css', array(
        'label' => __('Custom CSS', 'violet'),
        'section' => 'colors',
        'settings' => 'custom_css',
        'type' => 'textarea',
    ));


    //Menu bg
    $wp_customize->add_setting('menu_bg_color', array(
        'sanitize_callback' => 'violet_sanitize_rgba',
        'default'     => 'rgba(42,1,61,0.88)',
        'type'        => 'theme_mod',
        'capability'  => 'edit_theme_options',
        'transport'   => 'postMessage'
    ));
    $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'menu_bg_color', array(
        'label' => __('Menu Background', 'violet'),
        'section' => 'colors',
        'settings' => 'menu_bg_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
            ),
        'priority' => 1
    )));
    //Footer bg
    $wp_customize->add_setting('footer_bg_color', array(
        'sanitize_callback' => 'violet_sanitize_rgba',
        'default'     => '#263238',
        'type'        => 'theme_mod',
        'capability'  => 'edit_theme_options',
        'transport'   => 'postMessage'
    ));
    $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'footer_bg_color', array(
        'label' => __('Footer background', 'violet'),
        'section' => 'colors',
        'settings' => 'footer_bg_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)',
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )'
            ),
        'priority' => 2
    )));
    //Primary Color
    $wp_customize->add_setting('violet_primary_color', array(
        'sanitize_callback' => 'violet_sanitize_rgba',
        'default'     => '#7f56fd',
        'type'        => 'theme_mod',
        'capability'  => 'edit_theme_options',
        'transport'   => 'postMessage'
    ));
    $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'violet_primary_color', array(
        'label' => __('Primary Color', 'violet'),
        'section' => 'colors',
        'settings' => 'violet_primary_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
            ),
        'priority' => 3
    )));

    //Preloader background
    $wp_customize->add_setting('violet_preloader_color', array(
        'sanitize_callback' => 'violet_sanitize_rgba',
        'default'     => '#7f56fd',
        'type'        => 'theme_mod',
        'capability'  => 'edit_theme_options',
        'transport'   => 'postMessage'
    ));
    $wp_customize->add_control(new Violet_Alpha_Color_Control($wp_customize, 'violet_preloader_color', array(
        'label' => __('Preloader Background Color', 'violet'),
        'section' => 'colors',
        'settings' => 'violet_preloader_color',
            'show_opacity'  => true, // Optional.
            'palette'   => array(
                '#7f56fd',
                'rgba(127, 86, 253, 0.93)', // RGB, RGBa, and hex values supported
                'rgba(42,1,61,0.88)',
                'rgba(209,0,55,0.7)',                
                'rgba(50,50,50,0.8)',
                'rgba( 255, 255, 255, 0.2 )',
            ),
        'priority' => 4
    )));

    if ( isset( $wp_customize->selective_refresh ) ) {

        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '#main-menu .logo a',
            'render_callback' => 'violet_partial_blogname'
        ) );

        // footer section
        $wp_customize->selective_refresh->add_partial( 'footer_credits', array(
            'selector' => '#footer .copyright-text'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_phone', array(
            'selector' => '#footer #tel'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_email', array(
            'selector' => '#footer #mailto'
        ));

        // Call to section
        $wp_customize->selective_refresh->add_partial( 'violet_call_to_message', array(
            'selector' => '#call-to-action .call-to-action-message',
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_call_to_btn', array(
            'selector' => '#call-to-action .call-to-btn'
        ));

        //main section
        $wp_customize->selective_refresh->add_partial( 'main_section_message', array(
            'selector' => '.hero-content .hero-cta'
        ));
        $wp_customize->selective_refresh->add_partial( 'main_section_button_text', array(
            'selector' => '.hero-content .slide-btn'
        ));

        //about section
        $wp_customize->selective_refresh->add_partial( 'about_section_title', array(
            'selector' => '#about .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'about_section_desc', array(
            'selector' => '#about .title .section-s-t'
        ));
        $wp_customize->selective_refresh->add_partial( 'about_section_button_cv_text', array(
            'selector' => '#about #about_cv'
        ));
        $wp_customize->selective_refresh->add_partial( 'about_section_button_hire_text', array(
            'selector' => '#about #about_hire'
        ));

        //Profile
        $wp_customize->selective_refresh->add_partial( 'user_name', array(
            'selector' => '#about #about_name'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_age', array(
            'selector' => '#about #about_age'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_description', array(
            'selector' => '#about .about-content .description'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_skill', array(
            'selector' => '.hero-content .hero-cat'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_job', array(
            'selector' => '#about #about_job'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_photo', array(
            'selector' => '#about .about-photo .photo'
        ));
        $wp_customize->selective_refresh->add_partial( 'user_address', array(
            'selector' => '#about #about_addr'
        ));

        //Skill
        $wp_customize->selective_refresh->add_partial( 'violet_myskill_title', array(
            'selector' => '#skill .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_myskill_description', array(
            'selector' => '#skill .title .section-s-t-bg'
        ));

        //Service
        $wp_customize->selective_refresh->add_partial( 'violet_service_title', array(
            'selector' => '#service .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_service_description', array(
            'selector' => '#service .title .section-s-t'
        ));

        //Portfolio
        $wp_customize->selective_refresh->add_partial( 'violet_portfolio_title', array(
            'selector' => '#portfolio .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_portfolio_subtitle', array(
            'selector' => '#portfolio .title .section-s-t'
        ));

        //Team
        $wp_customize->selective_refresh->add_partial( 'violet_ourteam_title', array(
            'selector' => '#team .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_ourteam_subtitle', array(
            'selector' => '#team .title .section-s-t'
        ));

        //Blog
        $wp_customize->selective_refresh->add_partial( 'blog_title', array(
            'selector' => '#blog .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'blog_sub_title', array(
            'selector' => '#blog .title .section-s-t'
        ));

        //Contact
        $wp_customize->selective_refresh->add_partial( 'violet_contact_title', array(
            'selector' => '#contact .title h2'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_contact_sub_title', array(
            'selector' => '#contact .title .section-s-t'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_contact_form', array(
            'selector' => '#contact #contact-form'
        ));
        $wp_customize->selective_refresh->add_partial( 'violet_map_pg', array(
            'selector' => '#contact #contact-map'
        ));

        //Social
        $wp_customize->selective_refresh->add_partial( 'violet_social_show', array(
            'selector' => '.main-social'
        ));

    

    }
}
add_action('customize_register', 'violet_customize_register');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function violet_customize_preview_js() {
    wp_enqueue_script( 'violet_customize_preview', get_template_directory_uri() . '/inc/customizer/js/customizer-preview.js', array( 'jquery','customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'violet_customize_preview_js' );