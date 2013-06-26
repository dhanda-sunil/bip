<?php
class Bip_Demo_Data
{
    public static function setupWidgets()
    {
        if (!function_exists('next_widget_id_number')) {
            /** WordPress Administration Widgets API */
            require_once(ABSPATH . 'wp-admin/includes/widgets.php');
        }
        if (!function_exists('wp_ajax_save_widget')) {
            /** Load Ajax Handlers for WordPress Core */
            require_once( ABSPATH . 'wp-admin/includes/ajax-actions.php' );
        }
        $nonce = wp_create_nonce('save-sidebar-widgets');
        $theme_sidebars_with_default_widgets = array(
            'footer-copyright' => array(
                'text'  => array(
                    'title' => '',
                    'text' => 'Copyright 2012 - Bip'
                )
            ),
            'footer-sidebar' => array(
                'text'  => array(
                    'title' => 'A Text Widget',
                    'text' => '<p>Bip Mobile is based on the Bootstrap CSS framework, which provides a future-proof foundation for the design and layout.</p><p>Now I need to just add some text here and there and maybe repeat this. I do not think it is necessary.</p>'
                ),
                strtolower('Bip_Latest_Tweets_Widget') => array(
                    'title' => 'Latest Tweets',
                    'username' => 'envato',
                    'postcount' => 2
                ),
                strtolower('Bip_Flickr_Photostream_Widget') => array(
                    'title' => 'Photostream',
                    'display' => 'latest',
                    'count' => 6,
                    'user' => '52617155@N08'
                )
            ),
        );
        $sidebars_widgets = wp_get_sidebars_widgets();
        global $wp_registered_widgets, $wp_registered_widget_controls, $wp_registered_widget_updates;
        // Clear theme sidebars and set default widgets
        foreach ($theme_sidebars_with_default_widgets as $sidebar_index => $widgets) {
            // Clear sidebar
            $sidebars_widgets[$sidebar_index] = array();
            foreach ($widgets as $id_base => $widget_settings) {
                $next_widget_id = next_widget_id_number($id_base);
                $widget_id = $id_base . '-' . $next_widget_id;
                /**
                 * wp_ajax_save_widget() function usually called by JS during AJAX-request
                 * That is why I full HTTP request variables and skip die() by altering default wp die handler
                 */
                unset($_POST['widget-' . $id_base]);
                $_REQUEST['savewidgets'] = $nonce;
                $_POST['add_new'] = 'multi';
                $_POST['id_base'] = $id_base;
                $_POST['widget-id'] = $widget_id;
                $_POST['sidebar'] = $sidebar_index;
                $_POST['multi_number'] = $next_widget_id;
                $_POST['widget-' . $id_base] = array(
                    $next_widget_id => $widget_settings
                );
                $wp_die_handler = create_function('$handler', 'return "__return_true";');
                add_filter('wp_die_handler', $wp_die_handler);
                // Hack that allows to save multiple widgets with the same base id
                $wp_registered_widget_updates[$id_base]['callback'][0]->updated = false;
                // Hack that avoids calling the code line "call_user_func_array( $form['callback'], $form['params'] );" in wp_ajax_save_widget() function
                $wp_registered_widget_controls[$widget_id] = false;
                wp_ajax_save_widget();
                unset( $wp_registered_widget_controls[$widget_id]);
                remove_filter('wp_die_handler', $wp_die_handler);
                $sidebars_widgets[$sidebar_index][] = $widget_id;
            }
            wp_set_sidebars_widgets($sidebars_widgets);
            // TODO: Delete only widgets with base id were processed
            $wp_registered_widgets = array();
            do_action('widgets_init');
        }
    }
    public static function setupMenu()
    {
        $locations = get_nav_menu_locations();
        // Bip menu slug
        $slug = 'bip-top-menu';
        // Find menu ID by hard coded slug. Not the best but working solution.
        $menus = wp_get_nav_menus();
        foreach($menus as $menu) {
            if ($slug == $menu->slug) {
                $menu_id = $menu->term_id;
                break;
            }
        }
        // Assign founded menu to nav menu location
        if (isset($menu_id)) {
            $locations[BipCore::TOP_MENU_LOCATION] = $menu_id;
            // Update menu theme locations
            set_theme_mod( 'nav_menu_locations', array_map( 'absint', $locations ) );
            // Store 'auto-add' pages.
            $nav_menu_option = (array) get_option( 'nav_menu_options' );
            if ( ! isset( $nav_menu_option['auto_add'] ) )
                    $nav_menu_option['auto_add'] = array();
            if ( ! in_array( $menu_id, $nav_menu_option['auto_add'] ) )
                    $nav_menu_option['auto_add'][] = $menu_id;
            // Remove nonexistent/deleted menus
            $nav_menu_option['auto_add'] = array_intersect( $nav_menu_option['auto_add'], wp_get_nav_menus( array( 'fields' => 'ids' ) ) );
            update_option( 'nav_menu_options', $nav_menu_option );
            
        }
//        if (!has_nav_menu(BipCore::TOP_MENU_LOCATION)) {
//
//            // Add menu
//            $menu_id = wp_update_nav_menu_object( 0, array('menu-name' => __('Bip Top Menu', BIP_DOMAIN)) );
//
//            if (!is_wp_error($menu_id)) {
//
//                // Update menu theme locations
//                $menu_locations = get_nav_menu_locations();
//
//                $menu_locations[BipCore::TOP_MENU_LOCATION] = $menu_id;
//
//                set_theme_mod( 'nav_menu_locations', array_map( 'absint', $menu_locations ) );
//
//                // Store 'auto-add' pages.
//                $nav_menu_option = (array) get_option( 'nav_menu_options' );
//
//                $nav_menu_selected_id = $menu_id;
//
//                if ( ! isset( $nav_menu_option['auto_add'] ) )
//                        $nav_menu_option['auto_add'] = array();
//
//                if ( ! in_array( $nav_menu_selected_id, $nav_menu_option['auto_add'] ) )
//                        $nav_menu_option['auto_add'][] = $nav_menu_selected_id;
//
//                // Remove nonexistent/deleted menus
//                $nav_menu_option['auto_add'] = array_intersect( $nav_menu_option['auto_add'], wp_get_nav_menus( array( 'fields' => 'ids' ) ) );
//                update_option( 'nav_menu_options', $nav_menu_option );
//
//            }
//        }
    }
}
?>
