<?php
/* Template Name: Shop-list */
?>
<?php get_header();?>
<!-- Shops Page -->
<div class="page staff <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
	<div class="container">
		<?php
		if(!$shops->hasError && $shops->totalDealers>0){
			?>
			<div id="shop_list">
				<div class="row list-head">
					<div class="span12"><b><?php echo $shops->totalDealers;?></b> risultati trovati</div>
				</div>
                <div class="row">
                	<div class="span4 list-body">
					<?php $dealers = array();
                    foreach($shops->dealers as $i=>$shop){
						$dealers[$i]['address'] = $shop->address;
						$dealers[$i]['title'] 	= $shop->firmName;
                        ?>
                        <div class="shop_info <?php echo ($i%2==0)?'':'even';?>">
                        	<div class="shop_image">
                            	<img src="<?php echo WPTHEME_URL;?>/assets/img/puntiIconGray20x24.png" />
                            </div>
                            <div class="shop_content">
                            	<a href="javascript: void(0)" onclick="placeMarkers(); centerThis(<?php echo $i;?>);">
									<?php echo $shop->firmName;?>
                                    <div class="address">
                                        <?php echo $shop->address;?>
                                        <br>[<span style="color:#c2006b;">mappa</span>]
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <div class="span8">
						<?php echo render_shop_map($dealers, array('w'=>660, 'h'=>740));?>
                    	<div class="mapOuter">      
                          <div id="map_canvas"></div>
                        </div>
                    </div>
                </div>
				<div class="row list-footer">
				<div class="span12 center">&nbsp;
					<?php /*for($j=1;$j<=$pages;$j++){?>
					<span class="<?php echo (($offset/$limit)+1==$j)?'current':'';?>"><a href="?shop=list&start=<?php echo ($j-1)*$limit;?>"><?php echo $j;?></a></span>
					<?php }*/?>
					<!--<div class="footer-right">[nuova ricerca]</div>-->
				</div>
			</div>
		<?php
		}else{
		$limit 		= 20;
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
		
		$shops = new WP_Query($args); $i=0;
		if ( $shops->have_posts() ) :
			$posts 	= $shops->found_posts;
			$pgs	= (int)$shops->max_num_pages;
			?>
			<div class="list-table">
				<div class="row list-head">
					<div class="span4"><b><?php echo $shops->post_count;?></b> risultati trovati</div>
					<div class="span2">Indirizzo</div>
					<div class="span2">Telefono</div>
					<div class="span4">Orari d'apertura</div>
				</div>
				<div class="row">
                	<div class="span4">
					<?php 
                    while ($shops->have_posts()) : $shops->the_post(); 
                        $i++;
                        $id 	= get_the_ID();
                        $meta	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
                        $image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
                        $title = get_the_title();
                        $image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
                        ?>
                        <div class="list-body <?php echo ($i%2==0)?'even':'';?>">
                        	<div class="title"><a href="?p=<?php echo $id;?>"><?php echo $title;?></a></div>
                        	<div class="address"><?php echo $meta['address'];?></div>
                        </div>
                    <?php endwhile; wp_reset_postdata();?>
                    </div>
                    <div class="span8"></div>
                </div>
				<div class="row list-footer">
				<div class="span12 center">
					<?php  for($j=1;$j<=$pgs;$j++){?>
					<span class="<?php echo (($offset/$limit)+1==$j)?'current':'';?>"><a href="?shop=list&start=<?php echo ($j-1)*$limit;?>"><?php echo $j;?></a></span>
					<?php }?>
					<div class="footer-right">[nuova ricerca]</div>
				</div>
			</div>
		<?php endif; // end have_posts() check
		}?>
	   <?php echo bip_corner();?>
	</div>
</div>
<!-- #products -->
<?php get_footer(); ?>