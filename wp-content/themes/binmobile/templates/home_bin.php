<div>
<script>_V_.options.flash.swf = "<?php echo URL?>video-js/video-js.swf";</script>
<script>
	
</script>
    <div id="product-detail" class="row">
    <?php 
	$uri	= get_stylesheet_directory_uri();
	$args = array(
		'post_type' => 'products',
		'posts_per_page' => 1,
		'order' => 'DESC',
		'orderby' => 'menu_order'
	);
    $output = '';
	$products = new WP_Query($args);
	if ($products->have_posts()) {
    	while($products->have_posts()) {
             $products->the_post();
             if (has_post_thumbnail()) {
				$id 	= get_the_ID();
				$meta 	= get_post_meta($id, '_' . BipCore::prefix('product'), TRUE);
				$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
				$shortDesc1 = is_array($meta) && isset($meta['short-desc-1']) && !empty($meta['short-desc-1']) ? $meta['short-desc-1'] : '' ;
				$shortDesc2	= is_array($meta) && isset($meta['short-desc-2']) && !empty($meta['short-desc-2']) ? $meta['short-desc-2'] : '' ;
				$video_1 		= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
				$video_2 		= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;
				
                $image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
				$image = get_the_post_thumbnail($id, 'small' , array('title' => get_the_title(), 'alt' => get_the_title()));
				preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches );
   				$postImageSrc = $matches[1][0];
				$title	= strtoupper(get_the_title());
				?>
				<div class="span6">
                    <div><h1 class="right larger"><?php echo $title;?></h1></div>
                    <div><h3 class="right slim"><?php echo $subTitle;?></h3></div>
                    <div><h3 class="right"><?php echo $shortDesc;?></h3></div>
                    <div class="clear"></div>
                    <div class="right">
                    	<div class="pull-right video" style="background:url(<?php echo $postImageSrc;?>) center center;" onclick="showVideo()">
                        	<div class="right carousel-control" style="display: block;">›</div>
                        </div>
                        <div id="productVideo" class="modal" tabipdex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-header" id="myModalLabel">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><?php echo $title;?></h3>
                          </div>
                          <div class="modal-body">
                            <div style="width:460px; float:left;">
                                <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="450" height="252"
                                  poster="http://video-js.zencoder.com/oceans-clip.png"
                                  data-setup="{}">
                                <source src="<?php echo $video_1; ?>" />
                                <track kind="captions" src="captions.vtt" srclang="en" label="English" />
                              </video>
                              </div>
                          </div>
                        </div>
                    </div>
				</div>
				<div class="span6">
					<?php
                    if (!empty($link)) {
						echo '<div>'.$shortDesc.'</div><a href="'.$link.'" title="'.$title.'">'.$image.'</a>';
					} else {
						echo $image;
					}
					?>
                </div>
			<?php }
		}
	}?>
    </div>
    <div class="clear"></div>
    <div id="front-products" class="row">
    	<?php 
		$args = array(
			'post_type' => 'products, tariff, options',
			'posts_per_page' => 4,
			'order' => 'DESC',
			'orderby' => 'menu_order'
		);
		$options 	= BipMobileThemeOptions::getOptions();
		$shortname 	= BipMobileThemeOptions::cfg('shortname');
		if($options[$shortname.'_homepage_slides']){
			$args['cat'] = $options[$shortname.'_homepage_slides'];
		}
		
		$homeProducts = new WP_Query($args);
		if ($homeProducts->have_posts()) {
			while($homeProducts->have_posts()) {
				$homeProducts->the_post();
				$id 		= get_the_ID();
				$meta 		= get_post_meta($id, '_' . BipCore::prefix('product'), TRUE);
				$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
				$shortDesc1	= is_array($meta) && isset($meta['short-desc-1']) && !empty($meta['short-desc-1']) ? $meta['short-desc-1'] : '' ;
				$shortDesc2	= is_array($meta) && isset($meta['short-desc-2']) && !empty($meta['short-desc-2']) ? $meta['short-des-2c'] : '' ;		
				$buttonText	= is_array($meta) && isset($meta['short-desc-2']) && !empty($meta['short-desc-2']) ? $meta['short-des-2c'] : '' ;
				$image 		= get_the_post_thumbnail($id, 'small' , array('title' => get_the_title(), 'alt' => get_the_title()));
				preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches );
				$postImageSrc = $matches[1][0];
				$title		= strtoupper(get_the_title());
				 ?>
                <div class="span3">
                	<div class="product_content">
                    	<div class="title"><?php echo get_post_type($id);?></div>
                    	<h1 class="title"><?php echo $title;?></h1>
                        <h3 class="shortDesc1"><?php echo $title;?></h3>
                        <div class="shortDesc2"><?php echo $title;?></div>
                        <div class="button"><?php echo $title;?></div>
                    </div>
                    <div class="product_image">
                        <img src="<?php echo $image;//$uri.'/assets/img/product-ds100.png'?>">
                    </div>
                </div>
            <?php 
			}
		}?>
    </div>
    <hr>
</div>
    
    
	<?php $slides =  get_posts(array('numberposts' =>0, 'post_type' => 'slides'));
	if (!empty($slides)) ://var_dump($slides);?>
    	<script type="text/javascript">
		function mycarousel_initCallback(carousel){
			// Disable autoscrolling if the user clicks the prev or next button.
			carousel.buttonNext.bipd('click', function() {
				carousel.startAuto(0);
			});
		
			carousel.buttonPrev.bipd('click', function() {
				carousel.startAuto(0);
			});
		
			// Pause autoscrolling if the user moves with the cursor over the clip.
			carousel.clip.hover(function() {
				carousel.stopAuto();
			}, function() {
				carousel.startAuto();
			});
		};
		
		jQuery(document).ready(function() {
			jQuery('#mycarousel').jcarousel({
				wrap: 'last',
				initCallback: mycarousel_initCallback
			});
		});
		</script>
		<div><h1>OPZIONI</h1></div>
    	<div id="optionsCarousel" class=" jcarousel-skin-tango carousel slide">
            <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
            	<div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
                	<ul id="mycarousel" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 950px;">
                        <?php $i=0;foreach ($slides as $slide){ 
							$title = get_the_title();
							$image = get_the_post_thumbnail($slide->ID, 'medium' , array('title' => $title, 'alt' => $title));
						?>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none;" jcarouselindex="1"><?php echo $image;?></li>
                        <?php }?>
                        <?php $i=0;foreach ($slides as $slide){ 
							$title = get_the_title();
							$image = get_the_post_thumbnail($slide->ID, 'medium' , array('title' => $title, 'alt' => $title));
						?>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none;" jcarouselindex="1"><?php echo $image;?></li>
                        <?php }?>
                        <?php $i=0;foreach ($slides as $slide){ 
							$title = get_the_title();
							$image = get_the_post_thumbnail($slide->ID, 'medium' , array('title' => $title, 'alt' => $title));
						?>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none;" jcarouselindex="1"><?php echo $image;?></li>
                        <?php }?>
                        <?php $i=0;foreach ($slides as $slide){ 
							$title = get_the_title();
							$image = get_the_post_thumbnail($slide->ID, 'medium' , array('title' => $title, 'alt' => $title));
						?>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none;" jcarouselindex="1"><?php echo $image;?></li>
                        <?php }?>
          			</ul>
          		</div>
          		<div class="jcarousel-prev left carousel-control"  style="display: block;" disabled="true">&lsaquo;</div><!--&laquo; jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal-->
                <div class="jcarousel-next right carousel-control" style="display: block;" disabled="false">&rsaquo;</div><!--&raquo; jcarousel-next jcarousel-next-horizontal -->
        	</div>
        </div>
	<?php endif;?>
    <hr>
	<div class="row lowerSection" style="margin-top:50px">
    	<div class="span3">
            <div class="center image"><img src="<?php echo $uri.'/assets/img/searchLarge.png';?>"></div>
            <div><h6 class="center"><?php echo 'COPERTURA';?></h6></div>
            <p class="center small"><i>Verifica se il tuo Comune e sotto copertura Bip:</i></p>
            <div class="center search">
                <div class="input-append">
                    <input class="span2" id="appendedInput" type="text" placeholder="Citta">
                    <span class="add-on"></span>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="center image"><img src="<?php echo $uri.'/assets/img/searchLarge.png';?>"></div>
            <div><h6 class="center"><?php echo 'PUNTI VENDITA';?></h6></div>
            <p class="center small"><i>Cerca il punto vendita piu vicino a te:</i></p>
            <div class="center punti">
                <div class="input-append">
                    <input class="span2" id="appendedInput" type="text" placeholder="Citta">
                    <span class="add-on"></span>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="center image"><img src="<?php echo $uri.'/assets/img/cartLarge.png';?>"></div>
            <div><h6 class="center"><?php echo 'CONFRONTA LE TARIFFE';?></h6></div>
            <p class="center small"><i><?php echo 'Scegli il piano piu adatto a te';?></i></p>
            <div class="center config"><button class="lightBlack"><i>Confronta</i></button></p></div>
        </div>
        
        <div class="span3">
            <div class="center image"><img src="<?php echo $uri.'/assets/img/passaABip.png';?>"></div>
        </div>
	</div>