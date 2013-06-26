<?php get_header();?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
            <!--<div class="page-title">
                <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
            </div>-->
            <?php
			if(is_home() || is_front_page()){
				load_template(get_stylesheet_directory() . '/templates/home.php');
			}else{
				the_content();
			}?>
        </div>
        <?php comment_form(); ?>
        <?php comments_template(); ?>
        <?php wp_link_pages(); ?>
    </div>
    <?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>