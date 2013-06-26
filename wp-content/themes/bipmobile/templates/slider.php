<?php
/* Template Name: Slider */
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>
<!-- Slider -->
<section class="slider" id="<?php echo esc_attr(basename(get_permalink())); ?>">
    <?php the_content(); ?>
</section><!-- #slider -->
<?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>