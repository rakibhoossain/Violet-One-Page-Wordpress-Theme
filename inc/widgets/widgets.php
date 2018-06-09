<?php
class Violet_Widget_Counter extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'violet_counter', __( 'Violet - Counter', 'violet' ), 
            array( 'description' => __( 'Add this widget in "Front page - Counter Sidebar".', 'violet' ),
                    'customize_selective_refresh' => true,
             ) );
    }

    /* ---------------------------- */
    /* ------- Display Widget -------- */
    /* ---------------------------- */

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $title = ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' );
        $image_uri = ( !empty( $instance['image_uri'] ) ? esc_url( $instance['image_uri'] ) : '' );
        $data = ( !empty( $instance['data'] ) ? absint( $instance['data'] ) : '' );

        echo '
        <div class="col-md-3 col-sm-3 text-center wow fadeInUp">
            <div class="task-item">
              <img class="task-object" src="'.$image_uri.'" style="max-width:60px;max-height:65px;"   alt="'.$title.'">
              <div class="task-body text-left">
                <h1 class="media-heading counter">'.$data.'</h1>
                <p>'.$title.'</p>
            </div>
        </div>
        </div>
        ';

        echo $args['after_widget'];
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['data'] = ( !empty( $new_instance['data'] ) ) ? absint( $new_instance['data'] ) : '';
        $instance['image_uri'] = ( !empty( $new_instance['image_uri'] ) ) ? strip_tags($new_instance['image_uri']) : '';
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array(
        'title' => __('Cofee','violet'),
        'data' => 200,
        'image_uri' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <div class="custom_counter">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'violet' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'data' ); ?>"><?php _e( 'Data:', 'violet' ); ?></label>
                <span class="widefat" style="font-style: italic; display: block;"><?php _e( 'The number the element should end at.', 'violet' ); ?></span>
                <input class="widefat" id="<?php echo $this->get_field_id( 'data' ); ?>" name="<?php echo $this->get_field_name( 'data' ); ?>" type="number" value="<?php echo esc_attr( $instance['data'] ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'violet'); ?></label><br/>
                <?php
                if ( !empty($instance['image_uri']) ) :
                    echo '<img class="custom_media_image_counter" src="' . esc_url($instance['image_uri']) . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'violet' ).'" /><br />';
                endif;
                ?>
                <input type="text" class="widefat custom_media_url_counter" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
                <input type="button" onclick="mediaPicker(this.id)" class="button button-primary custom_media_button_counter" id="<?php echo $this->get_field_id('image_uri').'mpick'; ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','violet'); ?>" style="margin-top:5px;">
            </p>
        </div>
        <?php 
    }
}

function violet_widgets_init() {
    
    // Register Widgets
    register_widget( 'Violet_Widget_Counter' );

    // Unregister Widgets
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Nav_Menu_Widget');

  if (function_exists('register_sidebar'))
    {
    register_sidebar(array(
      'name' => 'Sidebar widget Area',
      'id' => 'blog-widget',
      'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    ));

    // Counter Sidebar

    register_sidebar(array(
      'name' => __('Counter Area', 'violet') ,
      'id' => 'counter-area-widget',
      'description' => __('The widgets added in this sidebar will appear in counter section.', 'violet') ,
      'before_widget' => '',
      'after_widget' => '',
      'before_title' => '',
      'after_title' => '',
    ));
    }

}
add_action( 'widgets_init', 'violet_widgets_init' );