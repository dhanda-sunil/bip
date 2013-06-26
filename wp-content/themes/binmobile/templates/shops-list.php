<?php
/* Template Name: Shops */
?>
<?php get_header(); ?>
	<!-- Shops Page -->
    <div class="page staff <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
        	<?php 
			$limit 		= 2;
			$offset 	= (isset($_GET['start']) && $_GET['start']!='')?$_GET['start']:0;
			
			$args = array(
				'post_type' 		=> 'shop',
				'posts_per_page' 	=> $limit,
				'order' 			=> 'ASC',
				'orderby' 			=> 'menu_order',
				'offset'			=> $offset,
			);
			if($shop!='list'){
				$args['meta_query'] = array(
					array(
						'key'		=> '_' . BipCore::prefix('shop'),
						'value'		=> $shop,
						'compare'	=> 'LIKE'
					)
				);
			}
			//'s'		=> $shop,
			$shop = new WP_Query($args); $i=0;
			if ( $shop->have_posts() ) :
				$posts 	= $shop->found_posts;
				$pages	= $shop->max_num_pages;
			
				?>
				<div class="list-table">
					<div class="row list-head">
						<div class="span4"><b><?php echo $shop->post_count;?></b> risultati trovati</div>
						<div class="span2">Indirizzo</div>
						<div class="span2">Telefono</div>
						<div class="span4">Orari d'apertura</div>
					</div>
			
                	<?php 
					while ($shop->have_posts()) : $shop->the_post(); 
						$i++;
						$id 	= get_the_ID();
						$meta	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
						$image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
						$title = get_the_title();
						$image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
						?>
						<div class="row list-body <?php echo ($i%2==0)?'even':'';?>">
							<div class="span4"><a href="?p=<?php echo $id;?>"><?php echo $title;?></a></div>
							<div class="span2"><?php echo $meta['address'];?></div>
							<div class="span2"><?php echo $meta['phone'];?></div>
							<div class="span4"><?php echo renderOpeningHours($meta['opening']);?></div>
						</div>
            		<?php endwhile; ?>
                    <div class="row list-footer">
                    <div class="span12 center">
                        <?php for($j=1;$j<=$pages;$j++){?>
                        <span class="<?php echo (($offset/$limit)+1==$j)?'current':'';?>"><a href="?shop=list&start=<?php echo ($j-1)*$limit;?>"><?php echo $j;?></a></span>
                        <?php }?>
                        <div class="footer-right">[nuova ricerca]</div>
                    </div>
                </div>
            <?php endif; // end have_posts() check?>
            
            
			<hr> 
            
           <?php echo bip_corner();?>
		</div>
    </div>
    <!-- #products -->
<?php get_footer(); ?>