<?php
/* Template Name: Shops */
?>
<?php get_header(); ?>
	<!-- Shops Page -->
    <div class="page staff <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
            <!--<div class="page-title">
                <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
            </div>-->
            <div id="punti-vendita" class="row">
                <div class="span6">
                    <div><h1 class="right larger">PUNTI VENDITA</h1></div>
                    <div><h3 class="right slim">CERCA IL PUNTO VENDITA</h3></div>
                    <div><h3 class="right">PIUVICINO A TE</h3></div>
                    <div class="right search">
                    	<form role="search" action="" method="get">
                        <div class="input-append">
                            <input class="span4" id="appendedInput" name="shop" type="text" placeholder="Citta, CAP a indirizzo">
                            <span class="add-on"></span>
                    	</div>
                        </form>
                        <div class="row-fluid links">
                        	<div class="span7"><a style="color:#626262" href="?shop=list">[elenco completo]</a></div>
                            <div class="span5"><a style="color:#BE006B" href="#">[vicino a me]</a></div>
                        </div>
                    </div>
                </div>
                <div class="span6"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/puntivedita.png" /></div>
            </div>
			<?php 
			$args = array(
				'post_type' => 'shop',
				'posts_per_page' => 4,
				'order' => 'ASC',
				'orderby' => 'menu_order'
			);
			
			$shop = new WP_Query($args);
			if ( $shop->have_posts() ) : ?>
            	<div id="top-shops" class="row">
                <?php while ($shop->have_posts()) : $shop->the_post(); 
					$id 	= get_the_ID();
					$meta	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
					$image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
					$title = get_the_title();
                	$image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
				?>
            
                	<div class="span3 shop-container">
                    	<div class="address"><a href="?p=<?php echo $id;?>"><?php echo $meta['address'];?></a></div>
                        <div class="shop-image"><?php echo $image;?></div>
                    </div>
                    
            	<?php endwhile; ?>
            	</div>
            <?php endif; // end have_posts() check?>
            
			<hr> 
            
           <?php echo bip_corner();?>
		</div>
    </div>
    <!-- #products -->
<?php get_footer(); ?>