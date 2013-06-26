<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Bipmobile 
 * @author         Emil Bip 
 * @copyright      2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/bipmobile/search.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-search" class="container <?php echo implode( ' ', get_post_class() ); ?>">

<?php if (have_posts()) : ?>

    <h6><?php printf(__('Search results for: %s', BIP_DOMAIN ), '<span>' . get_search_query() . '</span>'); ?></h6>

		<?php while (have_posts()) : the_post(); ?>  
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
                
                <?php get_template_part( 'post-meta' ); ?>
                
                <div class="post-entry">
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', BIP_DOMAIN), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->  
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-search -->
<?php get_footer(); ?>
