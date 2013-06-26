<?php
$bip_core_admin_class = 'BipCoreAdmin';
//add_filter("attachment_fields_to_edit", array('BipCoreAdmin', 'attachment_fields_to_edit'), 99, 2);

if (!class_exists($bip_core_admin_class)){
    class BipCoreAdmin{
		public static function prefix($str){
			return BipCore::prefix($str);
		}
		public static function loadScripts(){
			add_filter('bip_admin_pointers', array(get_class(), 'adminPointers'));
			self::_loadAdminPointersScripts();
			wp_register_script(self::prefix('bootstrap-js'), WPTHEME_URL.'/assets/bootstrap/js/bootstrap.min.js');
			wp_register_script(self::prefix('colorpicker2'), WPTHEME_URL.'/options/js/colorpicker.js');
			
			$screen 			= get_current_screen();
			$post_type 			= get_post_type();
			
			if ( post_type_supports($post_type, 'editor') || post_type_supports($post_type, 'thumbnail') ) {
				add_thickbox();
				wp_enqueue_script('media-upload');
			}
			if ('page' == $screen->post_type) {
				wp_enqueue_script( self::prefix('page-shortcodes'), get_template_directory_uri() . '/assets/js/admin/page-shortcodes.js', array( 'jquery') );
			}
			wp_enqueue_script(self::prefix('bootstrap-js'));
			wp_enqueue_script(self::prefix('colorpicker2'));
		}
		public static function loadStyles(){
			global $pagenow;
			$template_directory_uri = get_template_directory_uri();
			wp_register_style(self::prefix('bootstrap_css'), $template_directory_uri.'/assets/bootstrap/css/bootstrap.min.css');
			wp_register_style(self::prefix('bootstrap-res-css'), $template_directory_uri.'/assets/bootstrap/css/bootstrap-responsive.min.css');
			wp_register_style( self::prefix('wpalchemy-metabox'), $template_directory_uri . '/assets/css/admin/meta.css');
			wp_register_style ( self::prefix('option'), $template_directory_uri.'/options/style.css');
			wp_register_style ( self::prefix('colorpicker1'), $template_directory_uri.'/options/js/css/colorpicker.css');
			// Load wpalchemy metaboxes style
			if ('post.php' == $pagenow || 'post-new.php' == $pagenow) {
				wp_enqueue_style(self::prefix('wpalchemy-metabox'));
			}
			
			wp_enqueue_style ( self::prefix('bootstrap_css'));
			wp_enqueue_style ( self::prefix('bootstrap-res-css'));
			wp_enqueue_style ( self::prefix('colorpicker1'));
			
			
		}
		
        public static function adminPointers(){
            $pointers = array();
            $screen_id = get_current_screen()->id;
            switch($screen_id) {
                case 'tariff' :
                    $pointers['bip-tariff-image'] = array(
                        'target' => '#postimagediv',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Tariff Image' , BIP_DOMAIN),
                                __('Featured image is mandatory option for this custom post. If you leave featured image blank then tariff item won\'t display on site.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'right', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-tariff-title'] = array(
                        'target' => '#titlewrap',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Tariff Title' , BIP_DOMAIN),
                                __('Text which will be displayed above the featured image. Post title also used as &laquo;title&raquo; and &laquo;alt&raquo; attributes inside image and URL html tags', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-tariff-content'] = array(
                        'target' => '#wp-content-editor-container',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Main Content' , BIP_DOMAIN),
                                __('Here you can place text description (or anything else you want) which will be displayed below the featured image.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'middle' )
                        )
                    );
                    $pointers['bip-tariff-url'] = array(
                        'target' => '#tariff-link',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Tariff Link' , BIP_DOMAIN),
                                __('Enter the URL if you want to wrap the tariff image in a link', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-tariff-image-size'] = array(
                        'target' => 'td.image-size',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Tariff Image Size' , BIP_DOMAIN),
                                __('You can set any available image size for the featured image', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    break;
                case 'shop' :
                    $pointers['bip-tariff-image'] = array(
                        'target' => '#postimagediv',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Shop Image' , BIP_DOMAIN),
                                __('Featured image is mandatory option for this custom post. If you leave featured image blank then shop item won\'t display on site.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'right', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-tariff-title'] = array(
                        'target' => '#titlewrap',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Shop Title' , BIP_DOMAIN),
                                __('Text (developer name for example) which will be displayed under the featured image. Post title also used as &laquo;title&raquo; and &laquo;alt&raquo; attributes inside image html tag', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-tariff-content'] = array(
                        'target' => '#wp-content-editor-container',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Main Content' , BIP_DOMAIN),
                                __('Here you can place text description (or anything else you want) which will be displayed below the featured image.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'middle' )
                        )
                    );
                    break;
                case 'portfolio':
                    $pointers['bip-portfolio-title'] = array(
                        'target' => '#titlewrap',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Portfolio Title and Alt' , BIP_DOMAIN),
                                __('Post title used as &laquo;title&raquo; and &laquo;alt&raquo; attributes inside portfolio item image and URL html tags', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-portfolio-image'] = array(
                        'target' => '#postimagediv',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Portfolio Image' , BIP_DOMAIN),
                                __('Featured image is mandatory option for this custom post. If you leave featured image blank then portfolio item won\'t display on site.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'right', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-portfolio-content'] = array(
                        'target' => '#wp-content-editor-container',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Main Content' , BIP_DOMAIN),
                                __('Here you can place large image or anything else you want to display inside popup dialog window.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-portfolio-excerpt'] = array(
                        'target' => '#postexcerpt',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Item Description' , BIP_DOMAIN),
                                __('Excerpt used for description of portfolio item inside popup dialog window. Feel free to use any HTML code inside it.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'right' )
                        )
                    );
                    $pointers['bip-portfolio-metabox'] = array(
                        'target' => '#portfolio-item-fields',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Item Info' , BIP_DOMAIN),
                                __('These fields used only inside popup dialog window.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'middle' )
                        )
                    );
                    break;
                case 'products' :
                    $pointers['bip-products-image'] = array(
                        'target' => '#postimagediv',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Product Image' , BIP_DOMAIN),
                                __('Featured image is mandatory option for this custom post. If you leave featured image blank then current product won\'t display on site.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'right', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-products-title'] = array(
                        'target' => '#titlewrap',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Product Title and Alt' , BIP_DOMAIN),
                                __('Post title used as &laquo;title&raquo; and &laquo;alt&raquo; attributes inside product\'s image and URL html tags', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-product-url'] = array(
                        'target' => '#product-link',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Product Link' , BIP_DOMAIN),
                                __('Enter the URL if you want to wrap the product image in a link', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'right' )
                        )
                    );
                    $pointers['bip-product-image-size'] = array(
                        'target' => 'td.image-size',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Product Image Size' , BIP_DOMAIN),
                                __('You can set any available image size for the featured image', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    break;
                case 'slides' :
                    $pointers['bip-slide-image'] = array(
                        'target' => '#postimagediv',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Slide Image' , BIP_DOMAIN),
                                __('Featured image is mandatory option for this custom post. If you leave featured image blank then current slide won\'t display on site.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'right', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-slide-title'] = array(
                        'target' => '#titlewrap',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Slide Caption' , BIP_DOMAIN),
                                __('Post title used as slide caption', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'top', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-slide-url'] = array(
                        'target' => '#slide-link',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __('Slide Link' , BIP_DOMAIN),
                                __('Enter the URL if you want to wrap the slide image in a link', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'middle' )
                        )
                    );
                    break;
                case 'page' :
                    $pointers['bip-page-templates'] = array(
                        'target' => '#page_template',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __( 'Page Templates' , BIP_DOMAIN),
                                sprintf(__( 'There are seven predefined templates you are welcome to use for page content. You can look at our <a href="%s">demo</a> to understand each template purpose.', BIP_DOMAIN), 'http://bip.it') .
                                    '<br /><br />P.S. ' . '&laquo;Top&raquo; menu item corresponds to the &laquo;Slider&raquo; template and &laquo;Get In Touch&raquo; menu item corresponds to the &laquo;Contact&raquo; template.'
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'left' )
                        )
                    );
                    $pointers['bip-postbox-shortcodes'] = array(
                        'target' => '#postbox-container-2',
                        'options' => array(
                            'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                __( 'Shortcode Generators' , BIP_DOMAIN),
                                __( '&laquo;Bip Theme&raquo; provides nice shortcode generators to make site content more flexible and easy to populate.', BIP_DOMAIN)
                            ),
                            'position' => array( 'edge' => 'bottom', 'align' => 'left' )
                        )
                    );
                    break;
                default:
                    if ($screen_id == 'themes' || 'dashboard' == $screen_id) {
                        $pointers['bip-main-content'] = array(
                            'target' => '#menu-pages',
                            'options' => array(
                                'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                    __( 'Main Content' , BIP_DOMAIN),
                                    __( 'The main theme content is generated from multiple wordpress pages. Each page is a separate section on the main site page. Create the page(s) and fill page content area with built-in &laquo;Bip Theme&raquo; shortcodes and/or any other content you wish to display on your site.', BIP_DOMAIN)
                                ),
                                'position' => array( 'edge' => 'left', 'align' => 'middle' )
                            )
                        );
                        $pointers['bip-menu-widgets-logo'] = array(
                            'target' => '#menu-appearance',
                            'options' => array(
                                'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                    __( 'Menu, Logo, Footer' , BIP_DOMAIN),
                                    __( 'Navigation menu used to select and sort certain pages for showing them on site. Also it is possible to use links in the menu.', BIP_DOMAIN) . '<br /><br />' .
                                    __('There are two widget areas in site footer. &laquo;Footer Sidebar&raquo; is the main 3-column area where you can place all the widgets you wish to display in site footer. &laquo;Footer Copyright&raquo; area used to place simple text widget with copyright.', BIP_DOMAIN) . '<br /><br />' .
                                    __('Go to <em>&laquo;Site Logo&raquo;</em> section to change the logo.', BIP_DOMAIN)
                                ),
                                'position' => array( 'edge' => 'top', 'align' => 'middle' )
                            )
                        );
                    }
                    if ('options-permalink' != $screen_id) {
                        global $wp_rewrite;
                        if (!$wp_rewrite->using_permalinks()) {
                            $pointers['bip-permalinks'] = array(
                                'target' => '#menu-settings',
                                'options' => array(
                                    'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
                                        __( 'Permalinks' , BIP_DOMAIN),
                                        sprintf( __( 'It seems like you are using default permalink structure which is not recommended for &laquo;Bip Theme&raquo;. <a href="%s">Here</a> you can change the permalink structure. Read more about using peralinks on <a href="%s">Codex</a>.', BIP_DOMAIN), admin_url('options-permalink.php'), 'http://codex.wordpress.org/Using_Permalinks')
                                    ),
                                    'position' => array( 'edge' => 'left', 'align' => 'middle' )
                                )
                            );
                        }
                    }
                    break;
            }
            return $pointers;
        }
        private static function _loadAdminPointersScripts(){
            // Don't run on WP < 3.3
            if ( get_bloginfo( 'version' ) < '3.3' )
                return;
            // Get pointers for this screen
            $pointers = apply_filters( 'bip_admin_pointers', array() );
            if ( ! $pointers || ! is_array( $pointers ) )
                return;
            // Get dismissed pointers
            $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
            $valid_pointers =array();
            // Check pointers and remove dismissed ones.
            foreach ( $pointers as $pointer_id => $pointer ) {
                // Sanity check
                if ( in_array( $pointer_id, $dismissed ) || empty( $pointer )  || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) )
                    continue;
                $pointer['pointer_id'] = $pointer_id;
                // Add the pointer to $valid_pointers array
                $valid_pointers['pointers'][] =  $pointer;
            }
            // No valid pointers? Stop here.
            if ( empty( $valid_pointers ) )
                return;
            // Add pointers style to queue.
            wp_enqueue_style( 'wp-pointer' );
            // Add pointers script to queue. Add custom script.
            wp_enqueue_script( self::prefix('admin-pointers'), get_template_directory_uri() . '/assets/js/admin/pointers.js', array( 'wp-pointer' ) );
            // Add pointer options to script.
            wp_localize_script( self::prefix('admin-pointers'), 'bipPointers', $valid_pointers );
        }
		
		public static function setupMetaboxes($post_type = 'post'){
			$template_directory = get_template_directory();
			require_once $template_directory . '/libs/vendor/wpalchemy/MediaAccess.php';
			require_once $template_directory . '/libs/vendor/wpalchemy/MetaBox.php';
			
			/*-----------------------------------------------------------------------------------*/
			/*	Product Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('product'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Product', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/product.php',
				'types' => array('product'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Tariff Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('tariff'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Tariff', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/tariff.php',
				'types' => array('tariff'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Tariff Table Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('tariff_table'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Tariff Table', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/tariff-table.php',
				'types' => array('tariff_table'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Faq Table Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('faq_table'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Faq Table', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/faq-table.php',
				'types' => array('faq_table'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Option Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('option'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Option', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/option.php',
				'types' => array('option'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Ricariche Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('ricariche'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Ricariche', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/ricariche.php',
				'types' => array('ricariche'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Slide Options
			/*-----------------------------------------------------------------------------------*/
			new WPAlchemy_MetaBox(array(
				'id'    =>  '_' . self::prefix('slide'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
				'title' =>  __('Slide', BIP_DOMAIN),
				'template' => get_stylesheet_directory() . '/core/admin/metaboxes/slide.php',
				'types' => array('slides'),
				'context' => 'normal',
				'priority' => 'high'
			));
			/*-----------------------------------------------------------------------------------*/
			/*	Portfolio Meta
			/*-----------------------------------------------------------------------------------*/
			// Portfolio item settings (order, span)
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('portfolio'),
					'title' =>  __('Portfolio Item', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/portfolio.php',
					'types' => array('portfolio'),
					'context' => 'normal',
					'priority' => 'low',
					//'mode'  =>  WPALCHEMY_MODE_EXTRACT,
					'prefix' => '_' . self::prefix('')
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Shop Meta
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    	=> '_' . self::prefix('shop'),
					'title' 	=> __('Shop Item', BIP_DOMAIN),
					'template' 	=> get_stylesheet_directory() . '/core/admin/metaboxes/shop.php',
					'types' 	=> array('shop'),
					'context' 	=> 'normal',
					'priority' 	=> 'low',
					//'mode'  	=>  WPALCHEMY_MODE_EXTRACT,
					'prefix' 	=> '_' . self::prefix('')
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Footer Link Meta
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    	=> '_' . self::prefix('footer_link'),
					'title' 	=> __('Footer Link', BIP_DOMAIN),
					'template' 	=> get_stylesheet_directory() . '/core/admin/metaboxes/footer-links.php',
					'types' 	=> array('footer_link'),
					'context' 	=> 'normal',
					'priority' 	=> 'low',
					//'mode'  	=>  WPALCHEMY_MODE_EXTRACT,
					'prefix' 	=> '_' . self::prefix('')
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Slider Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('slider_shortcode'), //  Starting your name with an underscore will effectively hide it from also appearing in the custom fields area.
					'title' =>  __('Slider Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/slider-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
					//'include_template' => 'slider.php'
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Portfolio Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('portfolio_shortcode'),
					'title' =>  __('Portfolio Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/portfolio-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Shop Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('shop_shortcode'),
					'title' =>  __('Shop Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/shop-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Tariffs Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('tariffs_shortcode'),
					'title' =>  __('Tariffs Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/tariffs-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Tariff Tables Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('tariff_tables_shortcode'),
					'title' =>  __('Tariff Tables Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/tariff-table-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Faq Tables Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('faq_tables_shortcode'),
					'title' =>  __('Faq Tables Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/faq-table-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Products Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('products_shortcode'),
					'title' =>  __('Products Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/products-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Options Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('options_shortcode'),
					'title' =>  __('Options Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/options-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Ricariche Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('ricariche_shortcode'),
					'title' =>  __('Ricariche Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/ricariche-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Contact Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('contact_shortcode'),
					'title' =>  __('Google Map & Contact Form Shortcodes', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/contact-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
				/*-----------------------------------------------------------------------------------*/
				/*	Connect Shortcode Generator
				/*-----------------------------------------------------------------------------------*/
				new WPAlchemy_MetaBox(array(
					'id'    =>  '_' . self::prefix('connect_shortcode'),
					'title' =>  __('Connect Shortcode', BIP_DOMAIN),
					'template' => get_stylesheet_directory() . '/core/admin/metaboxes/connect-shortcode.php',
					'types' => array('page'),
					'context' => 'normal',
					'priority' => 'high',
					'save_filter' => '__return_false',
				));
			}
        public static function printScripts(){
            $screen_id = get_current_screen()->id;
            if ('portfolio' == $screen_id) {
                { ?>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        $("#excerpt").addClass("mceEditor");
                        tinyMCE.execCommand("mceAddControl", false, "excerpt");
                        $('#postexcerpt p').hide();
                    });
                </script>
                <?php }
            }
        }
        public static function printStyles(){
			?>
            <style>
				body{font-family: sans-serif; font-size: 12px; line-height: 1.4em;}
				.op-un-admin-option{margin:10px 0px;}
				.op-un-admin-option-name, .op-un-admin-option-value {
					display: inline-block;
					vertical-align: top;
				}
				.op-un-admin-option-name{
					width: 200px;
				}
				.op-un-admin-option-value{
					width: 700px;
				}
				select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input{
					height:auto;line-height:20px;
				}
				.nav.nav-tabs a{
					background-color:#eee;
				}
				.nav.nav-tabs.active a{
					background-color:#fff;
				}
				.<?php echo BipMobileThemeOptions::cfg('style-prefix').'-category-options'?> select{
					width:auto;
				}
            </style>
            <?php
            $screen_id = get_current_screen()->id;
            if ('portfolio' == $screen_id) {
                { ?>
                <style type='text/css'>
                            #postexcerpt .inside{margin:0;padding:0;background:#fff;}
                            #postexcerpt .inside p{padding:0px 0px 5px 10px;}
                            #postexcerpt #excerpteditorcontainer { border-style: solid; padding: 0; }
                </style>
                <?php }
            }
        }
       /**
        * Get list of registered wordpress image sizes
        *
        * @global array $_wp_additional_image_sizes
        * @return array
        */
        public static function getImageSizes(){
            global $_wp_additional_image_sizes;
            foreach (get_intermediate_image_sizes() as $s) {
                $sizes[$s] = array('name'   => '', 'width'  => '', 'height' => '', 'crop'   => FALSE);
                /* Read theme added sizes or fall back to default sizes set in options... */
                $sizes[$s]['name'] = $s;
                if (isset($_wp_additional_image_sizes[$s]['width']))
                    $sizes[$s]['width'] = intval($_wp_additional_image_sizes[$s]['width']);
                else
                    $sizes[$s]['width'] = get_option("{$s}_size_w");
                if (isset($_wp_additional_image_sizes[$s]['height']))
                    $sizes[$s]['height'] = intval($_wp_additional_image_sizes[$s]['height']);
                else
                    $sizes[$s]['height'] = get_option("{$s}_size_h");
                if (isset($_wp_additional_image_sizes[$s]['crop']))
                    $sizes[$s]['crop'] = intval($_wp_additional_image_sizes[$s]['crop']);
                else
                    $sizes[$s]['crop'] = get_option("{$s}_crop");
            }
            $sizes['full']['name'] = 'full';
            return $sizes;
        }
		
        public static function editAdminMenus(){
            global $menu, $submenu;
            // Rename "Header" to "Site Logo"
            foreach ($submenu['themes.php'] as $key => $menu_item) {
                if ('custom-header' == $menu_item[2]) {
                    $submenu['themes.php'][$key][0] = __('Site Logo', BIP_DOMAIN);
                    break;
                }
            }
            // Hide "Discussion" item
            foreach ($submenu['options-general.php'] as $key => $menu_item) {
                if ('options-discussion.php' == $menu_item[2]) {
                    unset($submenu['options-general.php'][$key]);
                    break;
                }
            }
            remove_menu_page( 'edit-comments.php' );
            remove_menu_page( 'link-manager.php' );
            remove_menu_page( 'edit.php' );
        }
		public static function AjaxRenderVideo(){
			check_ajax_referer('bip_ajax_render_video');
			$mediaid 	= intval( $_POST['mediaid'] );
			$args		= array('player'=>'1', 'mediaid'=>$mediaid);
			$sc 		= new JWP6_Shortcode($args);
			echo $sc->embedcode();
			?>
			<div style="position: absolute;right: 0px;top: 0px;background: #000;width: 100px;height: 30px;z-index: 9999;"></div>
			<?php
			die();
		}
		public static function AjaxSetPhoneConfig(){
			check_ajax_referer('bip_ajax_set_phone_config');
			$phone_type 	= $_POST['phone_type'];
			$phone_confi 	= $_POST['phone_confi'];
			$phone_version 	= $_POST['phone_version'];
			include(WPTHEME_PATH.'/Interattive/'.$phone_type.$phone_version.'-'.$phone_confi.'.html');
			?>
			<?php
			die();
		}
        public static function portfolioItem (){
            check_ajax_referer('bip_ajax_portfolio');
            if (isset($_GET['post_id']) && is_numeric($_GET['post_id'])) {
                $output = '';
                $post_id = intval($_GET['post_id']);
                $post = get_post($post_id);
                $meta = get_post_meta($post_id, '_' . BipCore::prefix('portfolio'), TRUE);
                $title = is_array($meta) && isset($meta['title']) && !empty($meta['title']) ? $meta['title'] : get_the_title($post_id) ;
                $product = is_array($meta) && isset($meta['product']) ? $meta['product'] : '';
                $year = is_array($meta) && isset($meta['year']) ? $meta['year'] : '';
                $tariffs =  is_array($meta) && isset($meta['tariffs']) ? $meta['tariffs'] : '';
                $output .= get_post_field('post_content', $post_id);
                $output .= '<h1>' . $title . '</h1>';
                $output .= '<div class="description">';
                $output .= '<ul class="meta">';
                $output .= '<li><strong>' . __('Product', BIP_DOMAIN) . ':</strong> ' . $product . '</li>';
                $output .= '<li><strong>' . __('Year', BIP_DOMAIN) . ':</strong> ' .  $year . '</li>';
                $output .= '<li><strong>' . __('Tariffs', BIP_DOMAIN) . ':</strong> ' . $tariffs . '</li>';
                $output .= '</ul>';
                $output .= '<p>' . get_post_field('post_excerpt', $post_id) . '</p>';
                $output .= '</div>';
				
                echo $output;
            }
            die();
        }
        public static function onInit(){
            remove_post_type_support( 'post', 'comments' );
            remove_post_type_support( 'post', 'thumbnail' );
            remove_post_type_support( 'page', 'comments' );
            remove_post_type_support( 'page', 'thumbnail' );
            global $wp_post_types, $wp_taxonomies;
            $wp_post_types['post']->show_in_nav_menus = false;
            $wp_taxonomies['category']->show_in_nav_menus = false;
        }
        public static function onWordpressImport(){
            if (!class_exists('Bip_Demo_Data')) {
                $template_directory = get_template_directory();
                require_once $template_directory . '/core/helpers/class-bip-demo-data.php';
            }
            global $wp_rewrite;
            if (!$wp_rewrite->using_permalinks()) {
                // Change default permalink stucture to postname
                $iis7_permalinks = iis7_supports_permalinks();
                $prefix = $blog_prefix = '';
                if ( ! got_mod_rewrite() && ! $iis7_permalinks )
                        $prefix = '/index.php';
                if ( is_multisite() && !is_subdomain_install() && is_main_site() )
                        $blog_prefix = '/blog';
                $permalink_structure = '/%postname%/';
				if ( ! empty( $permalink_structure ) ) {
					$permalink_structure = preg_replace( '#/+#', '/', '/' . str_replace( '#', '', $permalink_structure ) );
					if ( $prefix && $blog_prefix )
						$permalink_structure = $prefix . preg_replace( '#^/?index\.php#', '', $permalink_structure );
					else
						$permalink_structure = $blog_prefix . $permalink_structure;
				}
			$wp_rewrite->set_permalink_structure( $permalink_structure );
                flush_rewrite_rules();
            }
            // Remove previosly assigned menu before starting the import
            wp_delete_nav_menu('bip-top-menu');
            add_action('import_end', array('Bip_Demo_Data', 'setupMenu'));
            add_action('import_end', array('Bip_Demo_Data', 'setupWidgets'));
        }
        public static function onThemeActivated(){
            add_action('admin_notices', array(get_class(), 'themeAdminNotices'));
        }
        public static function themeAdminNotices(){
            $plugin_name = __('Bip Theme', BIP_DOMAIN);
            $template_directory = get_template_directory();
            $demo_data_file = $template_directory . '/assets/demo-data.xml';
            if (file_exists($demo_data_file)) {
                $demo_data_url = get_template_directory_uri() . '/assets/demo-data.xml';
            }
            if (isset($demo_data_url)) {
                $file = '<a href="' . $demo_data_url . '">' . basename($template_directory) . '/assets/demo-data.xml' . '</a>';
            } else {
                $file = '<em>&laquo;' . basename($template_directory) . '/assets/demo-data.xml' . '&raquo;</em>';
            }
            $text = sprintf( __('You can import demo data using standart wordpress tool. Go to <em><a href="' . admin_url('import.php') . '">&laquo;Tools > Import&raquo;</a></em>, select <em><strong>WordPress</strong></em> and upload %s file.', BIP_DOMAIN), $file );
            $text .= '<br />';
            $text .= sprintf( __('After importing our sample data you\'ll get the site which will look absolutely the same as our <a href="%s">demo</a>. When performing the import procedure, be sure to check the <em>&laquo;Download and import file attachments&raquo;</em> box.', BIP_DOMAIN), 'http://wpdemo.themi.co/bip/');
            $html = '<div class="updated fade"><i class="alignright"><small>' . $plugin_name . '</small></i><p>' . $text . '</p></div>';
            $text = sprintf( __('This theme use 1 custom free font called <em>&laquo;Novecento wide Bold&raquo;</em>. You can download it <a href="%s">here</a> (require registration).', BIP_DOMAIN), 'http://www.fontspring.com/fonts/synthview/novecento-wide');
            $text .= sprintf(__('After downloading the font file, you need to generate font face kit of this font. You can do it <a href="%s">here</a> or on any other similar site. After generating font face kit, you need to get 4 files of the font, and put them in the <em>&laquo;%s&raquo;</em> folder. These files must be named like (rename files with respecive extension if required):', BIP_DOMAIN), 'http://fontface.codeandmore.com/', basename($template_directory) . '/assets/fonts/');
            $text .= ' <em>novecentowide-bold.eot, novecentowide-bold.svg, novecentowide-bold.ttf, novecentowide-bold.woff</em>';
            $html .= '<div class="updated fade"><i class="alignright"><small>' . $plugin_name . '</small></i><p>' . $text . '</p></div>';
            echo $html;
        }
        public static function manageCustomPostsColumns($columns){
            $date = $columns['date'];
            unset($columns['date']); // unset date columnt to change its order below
            $columns['title'] = $columns['title'];
            $columns['order'] = __('Order', BIP_DOMAIN);
            $columns['date'] = $date;
            return $columns;
        }
        public static function setCustomPostsColumns($column_name , $post_id){
            switch ($column_name) {
                case 'order':
                    $order = intval( get_post_field('menu_order', $post_id) );
                    echo $order;
                    break;
            }
        }
		public static function attachment_fields_to_edit($form_fields, $post){
			$itemTypes = array('product', 'tariff', 'option');
			if ( isset($_REQUEST["post_id"]) && isset($_GET['post_type']) && in_array($_GET['post_type'], $itemTypes) ) {
                $form_fields[JWP6 . "insert_with_player_sedto_custom_field"] = array(
                    "label" => false,
                    "input" => "html",
                    "html" => '<style>.compat-field-jwp6_insert_with_player_sedto_custom_field{display:none !important;}</style><script>
					
					var  send_to_editor_old = send_to_editor;
					send_to_editor = function(response){
						if(window.editorField){
							jQuery(window.editorField).val(response)	
						}else{
							send_to_editor_old(response);
						}
						jQuery(\'.media-modal-close\').trigger(\'click\');
					}
				</script>',
                );
            }
			return $form_fields;
		}
		public static function itemBackend($mb, $item='product'){
			
			ob_start();
			?><!--<script> var editorField = '#tariff-des-link'; </script>-->
            <div class="my_meta_control">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th><label for="<?php echo $item;?>-link"><?php esc_html_e('Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php /*echo do_action('media_buttons');*/ $mb->the_field('link'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-link" />
                                <p class="description">
                                    <?php esc_html_e('Featured image link', BIP_DOMAIN) ?>>&nbsp;
                                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                </p>
                                
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-des-link"><?php esc_html_e('Description Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('des-link'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-des-link" />
                                <p class="description">
                                    <?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;
                                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-bottom-box1-link"><?php esc_html_e('Bottom Box 1 Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('bottom_box1_link'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-bottom-box1-link" />
                                <p class="description">
                                    <?php esc_html_e('Bottom Box 1 link', BIP_DOMAIN) ?>>&nbsp;
                                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-bottom-box2-link"><?php esc_html_e('Bottom Box 2 Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('bottom_box2_link'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-bottom-box2-link" />
                                <p class="description">
                                    <?php esc_html_e('Bottom Box 2 link', BIP_DOMAIN) ?>>&nbsp;
                                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-box-icon"><?php esc_html_e('Homepage Box Icon', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('box-icon'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-box-icon" />
                                <p class="description">
                                    <?php esc_html_e('Box Icon shown on homepage boxes', BIP_DOMAIN) ?>>&nbsp;
                                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-slider-icon"><?php esc_html_e('Slider Icon', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('slider-icon'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-slider-icon" />
                                <p class="description">
                                    <?php esc_html_e('Slider Icon shown on homepage slides', BIP_DOMAIN) ?>>&nbsp;
                                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-short-des-1"><?php esc_html_e('Short Description 1', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('short-des-1'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-short-des-1" />
                                <p class="description">
                                    <?php esc_html_e('Short Description 1 shown under Main Title', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-short-des-2"><?php esc_html_e('Short Description 2', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('short-des-2'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-short-des-2" />
                                <p class="description">
                                    <?php esc_html_e('Short Description 2 shown below Short Description 1', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-des"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('description'); ?>
                                <textarea name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-des"><?php $mb->the_value(); ?></textarea>
                                <p class="description">
                                    <?php esc_html_e('Description of Product', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('button-text'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-button-text" />                
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-video-1"><?php esc_html_e('Video 1', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('video_1'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-video-1" />
                                <p class="description">
                                    <?php esc_html_e('Just upload the video via media on admin menu and note the id of uploaded media and write here.', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-video-image-1"><?php esc_html_e('Video 1 Placeholder', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('video_1_image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-video-image-1" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-video-2"><?php esc_html_e('Video 2', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('video_2'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-video-2" />
                                <p class="description">
                                    <?php esc_html_e('Just upload the video via media on admin menu and note the id of uploaded media and write here.', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-video-image-2"><?php esc_html_e('Video 2 Placeholder', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('video_2_image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-video-image-2" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-grayBox-title"><?php esc_html_e('Grey Boxes Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('gray_box_title'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-grayBox-title" />
                                <p class="description">
                                    <?php esc_html_e('Grey Boxes Title shown below Top section on Item detail page.', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-grayBox-image"><?php esc_html_e('Grey Boxes Image', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('gray_box_image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-grayBox-image" />
                                <p class="description">
                                    <?php esc_html_e('Grey Boxes Image shown below Grey Boxes Title', BIP_DOMAIN) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-image-size"><?php esc_html_e('Image Size', BIP_DOMAIN); ?></label></th>
                            <td class="image-size">
                                <?php $mb->the_field('image_size'); ?>
                                <?php foreach (BipCoreAdmin::getImageSizes() as $size) : ?>
                                    <label>
                                        <input id="<?php echo $item;?>-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($size['name'])) ?> value="<?php echo esc_attr($size['name']); ?>" />
                                        <em><?php echo esc_html($size['name']); ?></em>&nbsp;<?php if (isset($size['width']) && isset($size['height'])) : ?>(<?php echo esc_html($size['width']); ?>x<?php echo esc_html($size['height']); ?><?php if ($size['crop']) echo '&nbsp;' . esc_html(__('cropped', BIP_DOMAIN)); ?>)<?php endif; ?>
                                    </label>
                                    <br/>
                                <?php endforeach; ?>
                                    <p class="description">
                                        <?php esc_html_e('If you want to use full size image then leave this field blank', BIP_DOMAIN); ?>
                                    </p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 1</h3></th>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part1-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part1-title'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part1-title" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part1-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part1-subtitle'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part1-subtitle" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part1-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part1-description'); ?>
                                <textarea name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part1-description" ><?php $mb->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part1-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part1-image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part1-image" />
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 2</h3></th>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part2-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part2-title'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part2-title" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part2-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part2-subtitle'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part2-subtitle" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part2-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part2-description'); ?>
                                <textarea name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part2-description" ><?php $mb->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part2-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part2-image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part2-image" />
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 3</h3></th>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part3-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part3-title'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part3-title" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part3-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part3-subtitle'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part3-subtitle" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part3-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part3-description'); ?>
                                <textarea name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part3-description" ><?php $mb->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part3-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part3-image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part3-image" />
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 4</h3></th>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part4-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part4-title'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part4-title" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part4-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part4-subtitle'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part4-subtitle" />
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part4-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part4-description'); ?>
                                <textarea name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part4-description" ><?php $mb->the_value(); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="<?php echo $item;?>-part4-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
                            <td>
                                <?php $mb->the_field('part4-image'); ?>
                                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="<?php echo $item;?>-part4-image"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                
            <?
			$content = ob_get_contents();
			ob_end_clean();
			return $content;
		}
    }
	
}

/*-----------------------------------------------------------------------------------*/
/*	Scripts And Styles
/*-----------------------------------------------------------------------------------*/
// load external styles and scripts
add_action('admin_enqueue_scripts', array($bip_core_admin_class, 'loadScripts'));
add_action('admin_enqueue_scripts', array($bip_core_admin_class, 'loadStyles'));
// print inline css and javascript
add_action('admin_head', array($bip_core_admin_class, 'printScripts'));
add_action('admin_head', array($bip_core_admin_class, 'printStyles'));
/*-----------------------------------------------------------------------------------*/
/*	Setup Metaboxes
/*-----------------------------------------------------------------------------------*/
BipCoreAdmin::setupMetaboxes();
/*-----------------------------------------------------------------------------------*/
/*	AJAX for Portfolio Item Loading
/*-----------------------------------------------------------------------------------*/
add_action("wp_ajax_get_bip_portfolio_item", array($bip_core_admin_class, 'portfolioItem'));
add_action("wp_ajax_nopriv_get_bip_portfolio_item", array($bip_core_admin_class, 'portfolioItem'));
add_action('wp_ajax_render_video', array($bip_core_admin_class, 'AjaxRenderVideo'));
add_action('wp_ajax_nopriv_render_video', array($bip_core_admin_class, 'AjaxRenderVideo'));
add_action('wp_ajax_set_phone_config', array($bip_core_admin_class, 'AjaxSetPhoneConfig'));
add_action('wp_ajax_nopriv_set_phone_config', array($bip_core_admin_class, 'AjaxSetPhoneConfig'));
// Removes from admin menu
//add_action( 'admin_menu', array($bip_core_admin_class, 'editAdminMenus'), 100000 );
add_action('init', array($bip_core_admin_class, 'onInit'), 100);
//add_action('admin_init', array($bip_core_admin_class, 'setupMenu'));
/*-----------------------------------------------------------------------------------*/
/*	WordPress Importer
/*-----------------------------------------------------------------------------------*/
add_action( 'import_start', array($bip_core_admin_class, 'onWordpressImport') );
add_action('after_switch_theme', array($bip_core_admin_class, 'onThemeActivated'));
/*-----------------------------------------------------------------------------------*/
/*	Order column for custom posts
/*-----------------------------------------------------------------------------------*/
add_filter( 'manage_portfolio_posts_columns', array($bip_core_admin_class, 'manageCustomPostsColumns'));
add_action( 'manage_portfolio_posts_custom_column', array($bip_core_admin_class, 'setCustomPostsColumns'), 10, 2 );
add_filter( 'manage_slides_posts_columns', array($bip_core_admin_class, 'manageCustomPostsColumns') );
add_action( 'manage_slides_posts_custom_column', array($bip_core_admin_class, 'setCustomPostsColumns'), 10, 2 );
add_filter( 'manage_products_posts_columns', array($bip_core_admin_class, 'manageCustomPostsColumns') );
add_action( 'manage_products_posts_custom_column', array($bip_core_admin_class, 'setCustomPostsColumns'), 10, 2 );
add_filter( 'manage_tariff_posts_columns', array($bip_core_admin_class, 'manageCustomPostsColumns') );
add_action( 'manage_tariff_posts_custom_column', array($bip_core_admin_class, 'setCustomPostsColumns'), 10, 2 );
add_filter( 'manage_shop_posts_columns', array($bip_core_admin_class, 'manageCustomPostsColumns') );
add_action( 'manage_shop_posts_custom_column', array($bip_core_admin_class, 'setCustomPostsColumns'), 10, 2 );