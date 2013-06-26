<?php get_header();?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post();$id = get_the_ID()?>
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
        	<div class="widget-area">
            <?php
			if (has_post_thumbnail($id)) {
				echo $output = renderFrontItem($id);
			}?>
            </div>
        </div>
        <?php //comment_form(); ?>
        <?php //comments_template(); ?>
        <?php //wp_link_pages(); ?>
    </div>
    <?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<div class="clear"></div>
<?php get_footer(); ?>