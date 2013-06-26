<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post();$id = get_the_ID()?>
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
            <!--<div class="page-title">
                <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
            </div>-->
            <?php 
			if(get_post_type()=='shop'){
				load_template(get_stylesheet_directory() . '/templates/single-shop.php');
			}else{
				the_content();
			}?>
			<?php //comment_form(); ?>
            <?php //comments_template(); ?>
            <?php //wp_link_pages(); ?>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<div class="clear"></div>
<?php get_footer(); ?>