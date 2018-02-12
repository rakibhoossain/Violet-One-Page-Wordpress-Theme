<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom tags control
 */
class Violet_Editor_Control extends WP_Customize_Control {

    /**
     * The type of control being rendered
     */
    public $type = 'tinymce_editor';
    /**
     * Enqueue our scripts and styles
     */
    public function enqueue(){
      wp_enqueue_script( 'custom_editor_js', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/js/custom-editor.js', array( 'jquery' ), '1.0', true );
      wp_enqueue_style( 'custom_editor_css', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/css/custom-editor.css', array(), '1.0', 'all' );
      wp_enqueue_editor();
    }
    /**
     * Pass our TinyMCE toolbar string to JavaScript
     */
    public function to_json() {
      parent::to_json();
      $this->json['violettinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'formatselect bold italic underline bullist numlist alignleft aligncenter alignright link';
      $this->json['violettinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
    }
    /**
     * Render the control in the customizer
     */
    public function render_content(){
    ?>
      <div class="tinymce-control">
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php if( !empty( $this->description ) ) { ?>
          <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php } ?>
        <textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
      </div>
    <?php
    }

}