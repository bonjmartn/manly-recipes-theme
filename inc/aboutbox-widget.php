<?php 

// register aboutbox widget
function register_aboutbox_widget() {
    register_widget( 'aboutbox_widget' );
}
add_action( 'widgets_init', 'register_aboutbox_widget' );


/**
 * Adds aboutbox_Widget widget.
 */
class aboutbox_widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'aboutbox_widget', // Base ID
      __( 'About Box', 'manly-recipes-free' ), // Name
      array( 'description' => __( 'About Box on the Homepage', 'manly-recipes-free' ), ) // Args
    );
  }

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
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    // if the text field is set
    $text = sanitize_text_field( $instance['text'] );
    $link = esc_url( $instance['link'] );
    $imgurl = esc_url( $instance['imgurl'] );
    $btntext = sanitize_text_field( $instance['btntext'] );
    $btnlink = esc_url( $instance['btnlink'] );

    if ( ! empty( $instance['imgurl'] ) ) {
      echo sprintf( '<a href="' . $link . '"><img src="' . $imgurl . '"></a>');
    }

    if ( ! empty( $instance['text'] ) ) {
      echo sprintf( '<p>' . $text . '</p>');
    }

    if ( ! empty( $instance['btntext'] ) ) {
      echo sprintf( '<a href="' . $btnlink . '"><button>' . $btntext . '</button></a>');
    }

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Title', 'manly-recipes-free' );
    $text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Text', 'manly-recipes-free' );
    $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'Image Link', 'manly-recipes-free' );
    $imgurl = ! empty( $instance['imgurl'] ) ? $instance['imgurl'] : __( 'Image URL from Media Library', 'manly-recipes-free' );
    $btntext = ! empty( $instance['btntext'] ) ? $instance['btntext'] : __( 'Button Text', 'manly-recipes-free' );
    $btnlink = ! empty( $instance['btnlink'] ) ? $instance['btnlink'] : __( 'Button Link', 'manly-recipes-free' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'manly-recipes-free' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('img_field'); ?>"><?php _e('Paste the URL of an image from your media library', 'manly-recipes-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('img_field'); ?>" name="<?php echo $this->get_field_name('img_field'); ?>" type="text" 
    value="<?php echo esc_attr( $imgurl ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('link_field'); ?>"><?php _e('Enter the URL of the page you want the image to link to', 'manly-recipes-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('link_field'); ?>" name="<?php echo $this->get_field_name('link_field'); ?>" type="text" 
    value="<?php echo esc_attr( $link ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('text_field'); ?>"><?php _e('Enter any text that you want to appear', 'manly-recipes-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text_field'); ?>" name="<?php echo $this->get_field_name('text_field'); ?>" type="text" 
    value="<?php echo esc_attr( $text ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('btntext_field'); ?>"><?php _e('Enter the text for the button', 'manly-recipes-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('btntext_field'); ?>" name="<?php echo $this->get_field_name('btntext_field'); ?>" type="text" 
    value="<?php echo esc_attr( $btntext ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('btnlink_field'); ?>"><?php _e('Enter the URL of the page you want the button to link to', 'manly-recipes-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('btnlink_field'); ?>" name="<?php echo $this->get_field_name('btnlink_field'); ?>" type="text" 
    value="<?php echo esc_attr( $btnlink ); ?>" />
    </p>
    <?php 
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
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['text'] = strip_tags( $new_instance['text_field'] );
    $instance['link'] = strip_tags( $new_instance['link_field'] );
    $instance['imgurl'] = strip_tags( $new_instance['img_field'] );
    $instance['btntext'] = strip_tags( $new_instance['btntext_field'] );
    $instance['btnlink'] = strip_tags( $new_instance['btnlink_field'] );
    return $instance;
  }

} // class aboutbox_widget
