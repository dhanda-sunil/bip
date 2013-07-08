<?php
/* Template Name: Copertura */
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <!-- Copertura Page -->
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div id="copurtura" class="container">
        	<div class="frame_container">
            <iframe src="http://www.bip.it/copertura/frame/" width="825" frameborder="0" height="550" scrolling="no" style="padding: 30px; background-color: white">
                &lt;p&gt;Your browser does not support iframes.&lt;/p&gt;
            </iframe>
            </div>
        </div>
    </div>
    <!-- #Copertura -->
    <?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>