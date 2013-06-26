<?php
/*-----------------------------------------------------------------------------------*/
/*  Create the widget
/*-----------------------------------------------------------------------------------*/
add_action( 'widgets_init', create_function( '', 'register_widget( "Bip_Flickr_Photostream_Widget" );' ) );
add_action('wp_enqueue_scripts', array('Bip_Flickr_Photostream_Widget', 'setupScriptsAndStyles'));
/*-----------------------------------------------------------------------------------*/
/*  Widget class
/*-----------------------------------------------------------------------------------*/
class Bip_Flickr_Photostream_Widget extends WP_Widget {
    /*
     * Register and queue JS scripts
     */
    public static function setupScriptsAndStyles()
    {
        
    }
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
            parent::__construct(
                    '', // use class name as widget unique ID
                    __('Bip Flickr Photostream', BIP_DOMAIN), // Name
                    array(
                        'description' => __( 'Will show flickr photostream', BIP_DOMAIN ),
                        'classname'   => 'bip-flickr-photostream-widget'
                        ) // Args
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
    public function widget( $args, $instance )
    {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $before_widget;
        if ( ! empty( $title ) )
                echo $before_title . $title . $after_title;
        $id = $this->number;
        ?>
        <div>
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $instance['count']; ?>&amp;display=<?php echo $instance['display']; ?>&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $instance['user']; ?>"></script>
        </div>
        <?php
        echo $after_widget;
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
            $instance = array();
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['user'] = strip_tags( $new_instance['user'] );
            $instance['count'] = strip_tags( $new_instance['count'] );
            $instance['display'] = strip_tags( $new_instance['display'] );
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
            'title' => __('Photostream', BIP_DOMAIN),
            'display' => 'latest',
            'count' => '6',
            'user' => '52617155@N08'
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
        /* Build our form -----------------------------------------------------------*/
        ?>
        <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', BIP_DOMAIN) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        <p>
                <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('The number of photos to be shown.', BIP_DOMAIN) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" />
        </p>
        <p>
                <label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e('The user ID', BIP_DOMAIN) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" value="<?php echo $instance['user']; ?>" />
        </p>
        <p>
                <label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display the latest uploads or random photos.', BIP_DOMAIN) ?></label>
                <p>
                <label>
                    <input type="radio" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'display' ); ?>" <?php checked('latest' == $instance['display']) ?> value="latest"/><?php esc_html_e('Latest', BIP_DOMAIN) ?>
                </label>
                <label>
                    <input type="radio" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat" <?php checked('random' == $instance['display']) ?> value="random"/><?php esc_html_e('Random', BIP_DOMAIN) ?>
                </label>
                </p>
        </p>
        <?php
    }
}
?>