<?php
/* Template Name: Tariffs */
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
        <div id="productVideo" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header" id="myModalLabel">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3><?php the_title();?></h3>
		  </div>
		  <div class="modal-body">
			
		  </div>
		</div>
    </div>
</div>
<!-- #tariffs -->
<?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>
