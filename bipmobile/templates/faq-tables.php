<?php
/* Template Name: Faq Tables */
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>
<!-- Tariffs Page -->
<div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
    <div class="container">
       <!-- <div class="page-title">
            <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
        </div>-->
        <?php the_content(); ?>
    </div>
</div>
<!-- #tariffs -->
<?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>
