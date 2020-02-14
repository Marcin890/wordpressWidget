<?php
/*
Plugin Name: Bieszczady Widget
Description: Site specific code changes for example.com
*/

/* Start Adding Functions Below this Line */

// Register and load the widget
function bsd_load_widget() {
    register_widget( 'bsd_widget' );
}
add_action( 'widgets_init', 'bsd_load_widget' );
 
// Creating the widget 
class bsd_widget extends WP_Widget {
 
    function __construct() {
    parent::__construct(
 
    // Base ID of your widget
    'bsd_widget', 
 
    // Widget name will appear in UI
    __('Bieszczady Recenct Post Widget', 'bsd_widget_domain'), 
 
    // Widget description
    array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'bsd_widget_domain' ), ) 
    );
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $number = apply_filters( 'widget_custom_html_content', $instance['number'] );
    
 
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    
    // This is where you run the code and display the output
    include 'widget.php';

    // After widget
    echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
        $title = __( 'Ostatnie posty', 'bsd_widget_domain' );
    }

    if ( isset( $instance[ 'number' ] ) ) {
        $number = $instance[ 'number' ];
        }
        else {
        $number = __( 'number', 'bsd_widget_domain' );
    }


    // Widget admin form
    ?>
    <!-- Title -->
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <!-- number -->
    <p>
    <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" min="1" max="5" value="<?php echo esc_attr( $number ); ?>" />
    </p>
    
    <?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
    return $instance;
    }
} 
?>