<?php
/* Template Name: Shop */
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>
<!-- Shop Page -->
<article class="page staff <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
    <div class="container">
        <!--<div class="page-title">
            <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
        </div>-->
        <?php the_content(); ?>
    </div>
</article>
<!-- #the-shop -->
<?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>
