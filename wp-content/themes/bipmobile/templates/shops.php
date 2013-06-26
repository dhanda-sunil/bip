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
                    	<form id="shop_search" role="search" action="" method="get">
                        <div class="input-append">
                            <input class="span4" id="appendedInput" name="shop" type="text" placeholder="Citt&agrave;, Provincia o CAP">
                            <span class="add-on" onclick="if(document.getElementById('appendedInput').value != ''){document.getElementById('shop_search').submit();}"></span>
                    	</div>
                        </form>
                        <!--<div class="row-fluid links">
                        	<div class="span7"><a style="color:#626262" href="?shop=list">[elenco completo]</a></div>
                            <div class="span5 offset7"><a style="color:#BE006B" href="#">[vicino a me]</a></div>
                        </div>-->
                    </div>
                </div>
                <div class="span6"><img src="<?php echo WPTHEME_URL;?>/assets/img/puntivedita.png" /></div>
            </div>
			<?php 
			$args = array(
				'post_type' => 'shop',
				'posts_per_page' => 32,
				'order' => 'ASC',
				'orderby' => 'menu_order'
			);
			
			$shop = new WP_Query($args);
			if ( $shop->have_posts() ) : $i=1; ?>
            	<div id="top-shops">
                	<div class="row">
                    	<div class="span12 shop-image"><img src="<?php echo WPTHEME_URL;?>/assets/img/shop1024x436.jpg" /></div>
                    </div>
                    <div id="shopsCarouselContainer" class="jcarousel-skin-tango carousel slide">
                        <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
                            <div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
                                <ul id="shopsCarousel" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 950px;">
                                    <?php while ($shop->have_posts()) : $shop->the_post(); 
                                        $id 	= get_the_ID();
                                        $meta	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
                                        $image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
                                        $title 	= get_the_title();
										$name	= is_array($meta) && isset($meta['shopName']) && !empty($meta['shopName']) ? $meta['shopName'] : '' ;
										$address= is_array($meta) && isset($meta['address']) && !empty($meta['address']) ? $meta['address'] : '' ;
                                        $image 	= get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
                                    ?>
                                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none;" jcarouselindex="1">
                                        <div class="shop_option">
                                            <div class="shop_image"><img src="<?php echo WPTHEME_URL;?>/assets/img/puntiIconGray20x24.png" /></div>
                                            <div class="shop_content">
                                                <a href="?p=<?php echo $id;?>"><h5><?php echo $title;?></h5></a>
                                                <a href="?p=<?php echo $id;?>">
													<?php echo $name;?>
                                                	<br>
													<span class="address"><?php echo $address;?></span>
                                                </a>
                                                	<br>
                                                <a href="?p=<?php echo $id;?>">[<span style="color:#c2006b;">mappa</span>]</a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>						
                                    </li>
                                    <?php
                                    $i++;
                                    endwhile;
                                    ?>
                                </ul>
                            </div>
                            <div class="jcarousel-prev left carousel-control"  style="display: block;" disabled="true">&nbsp;</div><!--&laquo; jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal-->
                            <div class="jcarousel-next right carousel-control" style="display: block;" disabled="false">&nbsp;</div><!--&raquo; jcarousel-next jcarousel-next-horizontal -->
                        </div>
                    </div>
					<script type="text/javascript">
                    function mycarousel_initCallback(carousel){
                        // Disable autoscrolling if the user clicks the prev or next button.
                        carousel.buttonNext.bind('click', function() {
                            carousel.startAuto(0);
                        });
                    
                        carousel.buttonPrev.bind('click', function() {
                            carousel.startAuto(0);
                        });
                    
                        // Pause autoscrolling if the user moves with the cursor over the clip.
                        carousel.clip.hover(function() {
                            carousel.stopAuto();
                        }, function() {
                            carousel.startAuto();
                        });
                    };
                    
                    jQuery(document).ready(function($) {
                        jQuery('#shopsCarousel').jcarousel({
                            wrap: 'both',
                            initCallback: mycarousel_initCallback
                        });
                    });
                    </script>
                </div>
            <?php endif; // end have_posts() check?>
            
           <?php echo bip_corner();?>
		</div>
    </div>
    <!-- #products -->
<?php get_footer(); ?>