<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * No-Posts Loop Content Template-Part File
 *
 * @file           loop-no-posts.php
 * @package        Bipmobile 
 * @author         Emil Bip 
 * @copyright      2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/bipmobile/loop-no-posts.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * If there are no posts in the loop,
 * display default content
 */ 
$title = ( is_search() ? sprintf(__('Your search for %s did not match any entries.', BIP_DOMAIN ), get_search_query() ) : __( '404 &#8212; Fancy meeting you here!', BIP_DOMAIN ) );
?>

<h1 class="title-404"><?php echo $title; ?></h1>
			
<p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', BIP_DOMAIN ); ?></p>
			
<h6><?php 
printf( __( 'You can return %s or search for the page you were looking for.', BIP_DOMAIN ),
	sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
		esc_url( get_home_url() ),
		esc_attr__( 'Home', BIP_DOMAIN ),
		esc_attr__( '&larr; Home', BIP_DOMAIN )
	) 
); 
?></h6>
			
<?php get_search_form(); ?>