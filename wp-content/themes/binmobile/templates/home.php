<div>
<script>_V_.options.flash.swf = "<?php echo URL?>video-js/video-js.swf";</script>
<script>
	
</script>
    <div id="product-detail" class="row hr_shadow_down">
    <?php 
	$uri		= get_stylesheet_directory_uri();
	$options 	= BipMobileThemeOptions::getOptions();
	$shortname 	= BipMobileThemeOptions::cfg('shortname');
	$args = array(
		'post_type' 		=> array('product', 'tariff', 'option'),
		'posts_per_page' 	=> 5,
		'post__in'			=> explode(',', $options[$shortname.'_homepage_items']),
		'order' 			=> 'DESC',
		'orderby' 			=> 'menu_order'
	);
    $output 	= '';
	$products 	= get_posts($args);
	if($options[$shortname.'_homepage_item_shuffle']=='yes'){
		shuffle($products);
	}
	$mainProduct = array_pop($products);	
	if ($mainProduct->ID) {
		$id 		= $mainProduct->ID;
		if (has_post_thumbnail($id)) {
			$postType	= get_post_type($id);
			$meta 		= get_post_meta($id, '_' . BipCore::prefix($postType), TRUE);
			$title		= $mainProduct->post_title;
			$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
			$shortDesc1 = is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
			$shortDesc2	= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
			$video_1 	= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
			$video_2 	= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;
			
			$image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
			$image = get_the_post_thumbnail($id, 'small' , array('title' => $title, 'alt' => $title));
			preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches );
			$postImageSrc = $matches[1][0];
			
			?>
			<div class="span6">
				<a href="<?php echo (!empty($link))?$link:get_permalink($id);?>">
					<div><h1 class="right larger"><?php echo $title;?></h1></div>
					<div><h3 class="right slim"><?php echo $shortDesc1;?></h3></div>
					<div><h3 class="right"><?php echo $shortDesc2;?></h3></div>
				</a>
		 		<div class="clear"></div>
				<div class="right">
					<div class="pull-right video" style="background:url(<?php echo $postImageSrc;?>) center center;" onclick="showVideo()">
						<div class="right carousel-control" style="display: block;">›</div>
					</div>
					<div id="productVideo" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					echo '<a href="'.get_permalink($id).'" title="'.$title.'">'.$image.'</a>';
				}
				?>
			</div>
		<?php
		}
	}?>
    </div>
    <div class="clear"></div>
    <div id="front-products" class="row">
    	<?php
		if ($products) {
			foreach($products as $product) {
				$id 		= $product->ID;
				$title		= strtoupper($product->post_title);
				$postType	= get_post_type($id);
				$meta 		= get_post_meta($id, '_' . BipCore::prefix($postType), TRUE);
				$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
				$descLink	= is_array($meta) && isset($meta['des-link']) && !empty($meta['des-link']) ? $meta['des-link'] : '' ;
				$shortDesc1	= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
				$shortDesc2	= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;		
				$buttonText	= is_array($meta) && isset($meta['button-text']) && !empty($meta['button-text']) ? $meta['button-text'] : 'ATTIVA' ;
				$image 		= get_the_post_thumbnail($id, array(80,80) , array('title' => $title, 'alt' => $title));
				preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches );
				$postImageSrc = $matches[1][0];
				 ?>                
                <div class="span3 <?php echo $postType;?> curve">
                	<div class="clear"></div>
                	<div class="home_product">
                    	<div class="home_product_inner">
                            <div class="product_content">
                                <div class="type"><?php echo __( strtoupper($postType), 'bipmobile' );?></div>
                                <h1 class="title"><?php echo $title;?></h1>
                                <h3 class="shortDesc1"><?php echo $shortDesc1;?></h3>
                                <div class="shortDesc2"><?php echo $shortDesc2;?></div>
                                <div class="description <?php echo ($description!='')?'active':'';?>">
                                    <a href="<?php echo $descLink;?>"><?php echo ($description!='')?'[dettagli]':'';?></a>
                                    <div class="description_content" style="display:none"><?php echo $description;?></div>
                                </div>
                                <div class="button"><a href="<?php echo $link;?>"><?php echo strtoupper($buttonText);?></a></div>
                            </div>
                            <div class="product_image">
                                <img src="<?php echo $postImageSrc;//$uri.'/assets/img/product-ds100.png'?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
			}
		}?>
    </div>
</div>
<div class="clear"></div>
<div class="hr_shadow_down">
	<?php $slides =  get_posts(array('post_type' => 'option'));
	if (!empty($slides)) ://var_dump($slides);?>
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
			jQuery('#mycarousel').jcarousel({
				wrap: 'last',
				initCallback: mycarousel_initCallback
			});
			
			jQuery('.description.active').hover(function(e){             
			 	var x			= jQuery(this).children('.description_content');
			 	var y			= $("#description_content");
				var tooltip		= $("#tooltip");
			 	
				y.text(x.text());
			 	var yOffset 	= y.outerHeight(true) + tooltip.outerHeight(true)+10;
			 	var xOffset 	= tooltip.outerWidth(true)/2 ;
			 	
			 	tooltip.css("top",(e.pageY - yOffset) + "px")
			  	.css("left",(e.pageX - xOffset) + "px")
			  	.fadeIn("slow");  
			},
			function(){
			 	$("#tooltip").fadeOut('slow');
			});
		});
		</script>
		<div id="home_option"><h1>OPZIONI</h1></div>
        <div id="tooltip" style="display:none">
        	<div id="description_content"></div>
            <div class="arrow"></div>
        </div>
    	<div id="optionsCarousel" class=" jcarousel-skin-tango carousel slide">
            <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
            	<div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
                	<ul id="mycarousel" class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 950px;">
                        <?php $i=0;foreach ($slides as $slide){ 
								//var_dump($slide);
							$postType	= get_post_type($slide->ID);
							$meta 		= get_post_meta($slide->ID, '_' . BipCore::prefix($postType), TRUE);
							$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
							$shortDesc1	= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
							$shortDesc2	= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
							$description= is_array($meta) && isset($meta['description']) && !empty($meta['description']) ? $meta['description'] : '&nbsp;' ;		
							$buttonText	= is_array($meta) && isset($meta['button-text']) && !empty($meta['button-text']) ? $meta['button-text'] : 'ATTIVA' ;
							$type		= is_array($meta) && isset($meta['option_type']) && !empty($meta['option_type']) ? $meta['option_type'] : 'ATTIVA' ;
							$title 		= get_the_title();
							$image 		= get_the_post_thumbnail($slide->ID, array(72,72) , array('title' => $title, 'alt' => $title));
						?>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none;" jcarouselindex="1">
                            <div class="home_option">
                            	<div class="product_image"><?php echo $image;?></div>
                                <div class="product_content">
                                    <div class="type"><?php echo strtoupper($type);?></div>
                                    <h1 class="title"><?php echo $title;?></h1>
                                </div>
                                <h3 class="shortDesc1"><?php echo $shortDesc1;?></h3>
                                <div class="shortDesc2"><?php echo $shortDesc2;?></div>
                                <div>
                                	<div class="description <?php echo ($description!='')?'active':'';?>">
                                        <span><?php echo ($description!='')?'[dettagli]':'';?></span>
                                        <div class="description_content" style="display:none"><?php echo $description;?></div>
                                    </div>
                                    <div class="button"><?php echo strtoupper($buttonText);?></div>
                                </div>                               
                            </div>
                            <div class="clear"></div>						
                        </li>
                        <?php }?>
          			</ul>
          		</div>
          		<div class="jcarousel-prev left carousel-control"  style="display: block;" disabled="true">&lsaquo;</div><!--&laquo; jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal-->
                <div class="jcarousel-next right carousel-control" style="display: block;" disabled="false">&rsaquo;</div><!--&raquo; jcarousel-next jcarousel-next-horizontal -->
        	</div>
        </div>
	<?php endif;?>
</div>
	<div class="row hr_shadow_down lowerSection" style="margin-top:50px">
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