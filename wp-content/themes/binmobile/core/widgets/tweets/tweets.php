<?php
/*-----------------------------------------------------------------------------------*/
/*  Create the widget
/*-----------------------------------------------------------------------------------*/
add_action( 'widgets_init', create_function( '', 'register_widget( "Bip_Latest_Tweets_Widget" );' ) );
add_action('wp_enqueue_scripts', array('Bip_Latest_Tweets_Widget', 'setupScriptsAndStyles'));
/*-----------------------------------------------------------------------------------*/
/*  Widget class
/*-----------------------------------------------------------------------------------*/
class Bip_Latest_Tweets_Widget extends WP_Widget {
    /*
     * Register and queue JS scripts
     */
    public static function setupScriptsAndStyles()
    {
        $widget_rel_path = str_replace(str_replace('\\', '/', get_template_directory()), '', str_replace('\\', '/', dirname(__FILE__)));
        $template_directory_uri = get_template_directory_uri();
        $handle = get_class();
	wp_register_script($handle, $template_directory_uri . $widget_rel_path . '/jquery.tweet.js', array('jquery'));
	wp_register_style($handle, $template_directory_uri . $widget_rel_path . '/style.css');
	wp_enqueue_script($handle);
	wp_enqueue_style($handle);
    }
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
            parent::__construct(
                    '', // use class name as widget unique ID
                    __('Bip Latest Tweets', BIP_DOMAIN), // Name
                    array(
                        'description' => __( 'Will show latests tweets from specified account', BIP_DOMAIN ),
                        'classname'   => 'bip-latest-tweets-widget'
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
        $username = $instance['username'];
        $postcount = $instance['postcount'];
        echo $before_widget;
        if ( ! empty( $title ) )
                echo $before_title . $title . $after_title;
        $id = $this->number;
        /* Display Latest Tweets */
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($){
            if($().tweet) {
                    $("#<?php echo $widget_id; ?> .widget-content > div").tweet({
                            username: "<?php echo esc_js($username); ?>",
                            join_text: "auto",
                            avatar_size: 0,
                            count: <?php echo esc_js($postcount); ?>,
                            auto_join_text_default: "",
                            auto_join_text_ed: "",
                            auto_join_text_ing: "",
                            auto_join_text_reply: "",
                            auto_join_text_url: "",
                            loading_text: "<?php echo esc_js(__('loading tweets...', BIP_DOMAIN)); ?>"
                });
            }
        });
        </script>
        <div></div>
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
            $instance['username'] = strip_tags( $new_instance['username'] );
            $instance['postcount'] = strip_tags( $new_instance['postcount'] );
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
            'title' => __('Latest Tweets', BIP_DOMAIN),
            'username' => 'themi_co',
            'postcount' => '5',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
        /* Build our form -----------------------------------------------------------*/
        ?>
        <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', BIP_DOMAIN) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        <p>
                <label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username e.g. themi_co', BIP_DOMAIN) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
        </p>
        <p>
                <label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (max 20)', BIP_DOMAIN) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
        </p>
        <?php
    }
}
?>