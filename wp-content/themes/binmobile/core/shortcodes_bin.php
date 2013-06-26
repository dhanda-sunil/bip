<?php
function bip_slider($atts){
     extract(shortcode_atts(array(
	      'slides' => 'all',
              'image_size' => 'full'
     ), $atts));
     $args = array(
         'post_type' => 'slides',
         'orderby' => 'menu_order',
         'order' => 'ASC',
     );
     if ('all' != $slides) {
         $args['post__in'] = explode(',', $slides);
     }
     $output = '';
     $slides = new WP_Query($args);
     unset($atts['slides']);
     unset($atts['image_size']);
     $slider_data_atts = '';
     foreach ($atts as $attr => $val) {
         $slider_data_atts .= ' data-' . $attr . '="' . esc_attr($val) . '"';
     }
     if ($slides->have_posts()) {
        $output .= '<div class="flexslider"' . $slider_data_atts . '>';
        $output .= '<ul class="slides">';
        while ($slides->have_posts()) {
            $slides->the_post();
            if (has_post_thumbnail()) {
                $title = get_the_title();
                $image = get_the_post_thumbnail(get_the_ID(), $image_size, array('title' => $title, 'alt' => $title));
                $slide = get_post_meta(get_the_ID(), '_' . BipCore::prefix('slide'), TRUE);
                $output .= '<li>';
                $output .= '<h1>' . $title . '</h1>';
                if (is_array($slide) && isset($slide['link']) && !empty($slide['link'])) {
                    $output .= '<a href="' . esc_attr($slide['link']) . '">';
                    $output .= $image;
                    $output .= '</a>';
                } else {
                    $output .= $image;
                }
                $output .= '</li>';
            }
        }
        $output .= '</ul>';
        $output .= '</div>';
     }
     wp_reset_postdata();
     return $output;
}
function bip_portfolio($atts){
     $atts = shortcode_atts(array(
	      'limit' => '-1',
     ), $atts);
     extract($atts);
     $output = '';
     $args = array(
         'post_type' => 'portfolio',
         'posts_per_page' => intval( $limit ),
         'order' => 'ASC',
         'orderby' => 'menu_order'
     );
     $portfolio = new WP_Query($args);
     if ($portfolio->have_posts()) {
        $output .= '<div class="portfolio-items">';
        $output .= '<div class="row">';
        while($portfolio->have_posts()) {
             $portfolio->the_post();
             if (has_post_thumbnail()) {
                $id = get_the_ID();
                $ajax_url = wp_nonce_url( admin_url('admin-ajax.php?action=get_bip_portfolio_item&post_id=' . $id ), 'bip_ajax_portfolio' );
                $title = get_the_title();
                $output .= '<a data-remote="' . $ajax_url . '" href="#" data-toggle="modal" data-target="#portfolio-item-' . $id . '" data-keyboard="true">';
                $output .= '<dl class="span4">';
                $output .= '<dt>' . get_the_post_thumbnail($id, BipCore::IMAGE_SIZE_PORTFOLIO_ITEM, array('title' => $title, 'alt' => $title) ) . '</dt>';
                $output .= '<dd>' . $title . '</dd>';
                $output .= '</dl>';
                $output .= '</a>';
                $output .= '<div class="modal hide fade" tabindex="-1" role="dialog" id="portfolio-item-' . $id . '">';
                $output .= '<div class="modal-header">';
                $output .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#215;</button>';
                $output .= '</div>';
                $output .= '<div class="modal-body">';
                $output .= '</div>';
                $output .= '</div>';
             }
         }
        $output .= '</div>';
        $output .= '</div>';
     }
     wp_reset_postdata();
     return $output;
}
function bip_tariffs($atts){
     extract(shortcode_atts(array(
	      'limit' => '-1',
		  'id'=>'0'
     ), $atts));
     if($id){
		$limit = '1';	
	}
     $args = array(
         'post_type' => 'tariff',
         'posts_per_page' => intval( $limit ),
         'order' => 'ASC',
         'orderby' => 'menu_order'
     );
	if($id){
		$args['ID'] = intval( $id );	
	}
     $tariff = new WP_Query($args);
	$output = '';
     if ($tariff->have_posts()) {
        $output .= '<div class="widget-area">';
        $output .= '<div class="container">';
        while($tariff->have_posts()) {
             $tariff->the_post();
             if (has_post_thumbnail()) {
                 $id = get_the_ID();
                 $meta = get_post_meta($id, '_' . BipCore::prefix('tariff'), TRUE);
                 $link = is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
                 $image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
                
				$subTitle 	= is_array($meta) && isset($meta['sub-title']) && !empty($meta['sub-title']) ? $meta['sub-title'] : '' ;
				$shortDesc 	= is_array($meta) && isset($meta['short-desc']) && !empty($meta['short-desc']) ? $meta['short-desc'] : '' ;
				$video 		= is_array($meta) && isset($meta['video']) && !empty($meta['video']) ? $meta['video'] : '' ;	
				$part1Title = is_array($meta) && isset($meta['part1-title']) && !empty($meta['part1-title']) ? $meta['part1-title'] : '' ;
				$part1SubTitle 	= is_array($meta) && isset($meta['part1-subtitle']) && !empty($meta['part1-subtitle']) ? $meta['part1-subtitle'] : '' ;
				$part1Desc 	= is_array($meta) && isset($meta['part1-description']) && !empty($meta['part1-description']) ? $meta['part1-description'] : '' ;				
                $part1Image = is_array($meta) && isset($meta['part1-image']) && !empty($meta['part1-image']) ? $meta['part1-image'] : '' ;
				
				$part2Title = is_array($meta) && isset($meta['part2-title']) && !empty($meta['part2-title']) ? $meta['part2-title'] : '' ;
				$part2SubTitle 	= is_array($meta) && isset($meta['part2-subtitle']) && !empty($meta['part2-subtitle']) ? $meta['part2-subtitle'] : '' ;
				$part2Desc 	= is_array($meta) && isset($meta['part2-description']) && !empty($meta['part2-description']) ? $meta['part2-description'] : '' ;				
                $part2Image = is_array($meta) && isset($meta['part2-image']) && !empty($meta['part2-image']) ? $meta['part2-image'] : '' ;
				
				$part3Title = is_array($meta) && isset($meta['part3-title']) && !empty($meta['part3-title']) ? $meta['part3-title'] : '' ;
				$part3SubTitle 	= is_array($meta) && isset($meta['part3-subtitle']) && !empty($meta['part3-subtitle']) ? $meta['part3-subtitle'] : '' ;
				$part3Desc 	= is_array($meta) && isset($meta['part3-description']) && !empty($meta['part3-description']) ? $meta['part3-description'] : '' ;				
                $part3Image = is_array($meta) && isset($meta['part3-image']) && !empty($meta['part3-image']) ? $meta['part3-image'] : '' ;
				
				$part4Title = is_array($meta) && isset($meta['part4-title']) && !empty($meta['part4-title']) ? $meta['part4-title'] : '' ;
				$part4SubTitle 	= is_array($meta) && isset($meta['part4-subtitle']) && !empty($meta['part4-subtitle']) ? $meta['part4-subtitle'] : '' ;
				$part4Desc 	= is_array($meta) && isset($meta['part4-description']) && !empty($meta['part4-description']) ? $meta['part4-description'] : '' ;				
                $part4Image = is_array($meta) && isset($meta['part4-image']) && !empty($meta['part4-image']) ? $meta['part4-image'] : '' ;
                $title = get_the_title();
                $image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
                $output .= '<div class="span6">';
				$output .= '<div><h1 class="right larger">'.$title.'</h1></div>';
                $output .= '<div><h3 class="right slim">'.$subTitle.'</h3></div>';
				$output .= '<div><h3 class="right">'.$shortDesc.'</h3></div>';
				$output .= '<div class="right">'.$video.'</div>';
                $output .= '</div>';
				$output .= '<div class="span6">';
                if (!empty($link)) {
                    $output .= '<div>'.$meta['short-desc'].'</div><a href="' . $link . '" title="' . $title . '">' . $image . '</a>';
                } else {
                    $output .= $image;
                }
                $output .= '</div></div>';
				/*Part1*/
				if (!empty($part1Title)) {
					$output .= '<div class="row">';
						$output .= '<div class="span3 product-info">';
							$output .= '<div><h3 class="right large"><strong>'.$part1Title.'</strong></h3></div>';
							$output .= '<div><h6 class="right">'.$part1SubTitle.'</h6></div>';
							$output .= '<p class="right small">'.$part1Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span3">';
						if (!empty($part1Image)) {
							$output .= '<a title="' . $part1Title . '"><img src="' . $part1Image . '"/></a>';
						}
						$output .= '</div>';
						/*Part2*/
						if (!empty($part2Title)) {
						$output .= '<div class="span3 product-info">';
						$output .= '<div><h3 class="right large"><strong>'.$part2Title.'</strong></h3></div>';
						$output .= '<div><h6 class="right">'.$part2SubTitle.'</h6></div>';
						$output .= '<p class="right small">'.$part2Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span3">';
		
						if (!empty($part2Image)) {
							$output .= '<a title="' . $part2Title . '"><img src="' . $part2Image . '"/></a>';
						}
						$output .= '</div>';
						}
					$output .= '</div>';
				}
				
				/*Part3*/
				if (!empty($part3Title)) {
					$output .= '<div class="row">';
						$output .= '<div class="span3 product-info">';
						$output .= '<div><h3 class="right large">'.$part3Title.'</h3></div>';
						$output .= '<div><h6 class="right">'.$part3SubTitle.'</h6></div>';
						$output .= '<p class="right small">'.$part3Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span3">';
		
						if (!empty($part3Image)) {
							$output .= '<a title="' . $part3Title . '"><img src="' . $part3Image . '"/></a>';
						}
						$output .= '</div>';
						/*Part4*/
						if (!empty($part4Title)) {
						$output .= '<div class="span6" style="margin-left:20px;">';
						$output .= '<div><h3 class="right large">'.$part4Title.'</h3></div>';
						$output .= '<div><h6 class="right">'.$part4SubTitle.'</h6></div>';		
						if (!empty($part4Image)) {
							$output .= '<div class="right" style="float: right;"><a title="' . $part4Title . '"><img src="' . $part4Image . '"/></a></div>';
						}else{
							$output .= '<p class="right small">'.$part4Desc.'</p>';
						}
						$output .= '</div>';
						}
					$output .= '</div>';
				}
             }
         }
        $output .= '<div class="row lowerSection">';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/ds100_200x200.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>'.$part3Desc.'</i></p>';
				$output .= '<div class="center config"><button class="golden"><i>Configura</i></button></p></div>';
			$output .= '</div>';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/cartLarge.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>'.$part3Desc.'</i></p>';
				$output .= '<div class="center config"><button class="lightBlack"><i>Configura</i></button></p></div>';
			$output .= '</div>';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/searchLarge.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>Cerca il punto vendita piu vicino a te:</i></p>';
				$output .= '<div class="center search">
								<div class="input-append">
  									<input class="span2" id="appendedInput" type="text" placeholder="Citta">
  									<span class="add-on"></span>
							</div></div>';
			$output .= '</div>';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/phoneLarge.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center large"></p>';
				$output .= '<div class="center large phone"><span><i>4050</i></spa></div>';
			$output .= '</div>';
		$output .= '</div>';
        $output .= '</div>';
     }
     wp_reset_postdata();
     return $output;
}
function bip_products($atts){
     extract(shortcode_atts(array(
	      'limit' => '-1',
		  'id'=>'0'
     ), $atts));
    
	if($id){
		$limit = '1';	
	}
     $args = array(
         'post_type' => 'products',
         'posts_per_page' => intval( $limit ),
         'order' => 'ASC',
         'orderby' => 'menu_order'
     );
	if($id){
		$args['ID'] = intval( $id );	
	}
    $products = new WP_Query($args);
	
 	$output = '';
     if ($products->have_posts()) {
        $output .= '<div class="product-items">';
        $output .= '<div class="row">';
        while($products->have_posts()) {
             $products->the_post();
             if (has_post_thumbnail()) {
                $id 	= get_the_ID();
                $meta	= get_post_meta($id, '_' . BipCore::prefix('product'), TRUE);
                $link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
				$subTitle 	= is_array($meta) && isset($meta['sub-title']) && !empty($meta['sub-title']) ? $meta['sub-title'] : '' ;
				$shortDesc 	= is_array($meta) && isset($meta['short-desc']) && !empty($meta['short-desc']) ? $meta['short-desc'] : '' ;
				$video 		= is_array($meta) && isset($meta['video']) && !empty($meta['video']) ? $meta['video'] : '' ;
				
                $image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
				
				$part1Title = is_array($meta) && isset($meta['part1-title']) && !empty($meta['part1-title']) ? $meta['part1-title'] : '' ;
				$part1SubTitle 	= is_array($meta) && isset($meta['part1-subtitle']) && !empty($meta['part1-subtitle']) ? $meta['part1-subtitle'] : '' ;
				$part1Desc 	= is_array($meta) && isset($meta['part1-description']) && !empty($meta['part1-description']) ? $meta['part1-description'] : '' ;				
                $part1Image = is_array($meta) && isset($meta['part1-image']) && !empty($meta['part1-image']) ? $meta['part1-image'] : '' ;
				
				$part2Title = is_array($meta) && isset($meta['part2-title']) && !empty($meta['part2-title']) ? $meta['part2-title'] : '' ;
				$part2SubTitle 	= is_array($meta) && isset($meta['part2-subtitle']) && !empty($meta['part2-subtitle']) ? $meta['part2-subtitle'] : '' ;
				$part2Desc 	= is_array($meta) && isset($meta['part2-description']) && !empty($meta['part2-description']) ? $meta['part2-description'] : '' ;				
                $part2Image = is_array($meta) && isset($meta['part2-image']) && !empty($meta['part2-image']) ? $meta['part2-image'] : '' ;
				
				$part3Title = is_array($meta) && isset($meta['part3-title']) && !empty($meta['part3-title']) ? $meta['part3-title'] : '' ;
				$part3SubTitle 	= is_array($meta) && isset($meta['part3-subtitle']) && !empty($meta['part3-subtitle']) ? $meta['part3-subtitle'] : '' ;
				$part3Desc 	= is_array($meta) && isset($meta['part3-description']) && !empty($meta['part3-description']) ? $meta['part3-description'] : '' ;				
                $part3Image = is_array($meta) && isset($meta['part3-image']) && !empty($meta['part3-image']) ? $meta['part3-image'] : '' ;
				
				$part4Title = is_array($meta) && isset($meta['part4-title']) && !empty($meta['part4-title']) ? $meta['part4-title'] : '' ;
				$part4SubTitle 	= is_array($meta) && isset($meta['part4-subtitle']) && !empty($meta['part4-subtitle']) ? $meta['part4-subtitle'] : '' ;
				$part4Desc 	= is_array($meta) && isset($meta['part4-description']) && !empty($meta['part4-description']) ? $meta['part4-description'] : '' ;				
                $part4Image = is_array($meta) && isset($meta['part4-image']) && !empty($meta['part4-image']) ? $meta['part4-image'] : '' ;
                $title = get_the_title();
                $image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
                $output .= '<div class="span6">';
				$output .= '<div><h1 class="right larger">'.$title.'</h1></div>';
                $output .= '<div><h3 class="right slim">'.$subTitle.'</h3></div>';
				$output .= '<div><h3 class="right">'.$shortDesc.'</h3></div>';
				$output .= '<div class="right">'.$video.'</div>';
                $output .= '</div>';
				$output .= '<div class="span6">';
                if (!empty($link)) {
                    $output .= '<div>'.$shortDesc.'</div><a href="' . $link . '" title="' . $title . '">' . $image . '</a>';
                } else {
                    $output .= $image;
                }
                $output .= '</div></div>';
				/*Part1*/
				if (!empty($part1Title)) {
					$output .= '<div class="row">';
						$output .= '<div class="span3 product-info">';
							$output .= '<div><h3 class="right large"><strong>'.$part1Title.'</strong></h3></div>';
							$output .= '<div><h6 class="right">'.$part1SubTitle.'</h6></div>';
							$output .= '<p class="right small">'.$part1Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span3">';
						if (!empty($part1Image)) {
							$output .= '<a title="' . $part1Title . '"><img src="' . $part1Image . '"/></a>';
						}
						$output .= '</div>';
						/*Part2*/
						if (!empty($part2Title)) {
						$output .= '<div class="span3 product-info">';
						$output .= '<div><h3 class="right large"><strong>'.$part2Title.'</strong></h3></div>';
						$output .= '<div><h6 class="right">'.$part2SubTitle.'</h6></div>';
						$output .= '<p class="right small">'.$part2Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span3">';
		
						if (!empty($part2Image)) {
							$output .= '<a title="' . $part2Title . '"><img src="' . $part2Image . '"/></a>';
						}
						$output .= '</div>';
						}
					$output .= '</div>';
				}
				
				/*Part3*/
				if (!empty($part3Title)) {
					$output .= '<div class="row">';
						$output .= '<div class="span3 product-info">';
						$output .= '<div><h3 class="right large">'.$part3Title.'</h3></div>';
						$output .= '<div><h6 class="right">'.$part3SubTitle.'</h6></div>';
						$output .= '<p class="right small">'.$part3Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span3">';
		
						if (!empty($part3Image)) {
							$output .= '<a title="' . $part3Title . '"><img src="' . $part3Image . '"/></a>';
						}
						$output .= '</div>';
						/*Part4*/
						if (!empty($part4Title)) {
						$output .= '<div class="span6" style="margin-left:20px;">';
						$output .= '<div><h3 class="right large">'.$part4Title.'</h3></div>';
						$output .= '<div><h6 class="right">'.$part4SubTitle.'</h6></div>';		
						if (!empty($part4Image)) {
							$output .= '<div class="right" style="float: right;"><a title="' . $part4Title . '"><img src="' . $part4Image . '"/></a></div>';
						}else{
							$output .= '<p class="right small">'.$part4Desc.'</p>';
						}
						$output .= '</div>';
						}
					$output .= '</div>';
				}
             }
         }
		$output .= '<div class="row lowerSection">';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/ds100_200x200.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>'.$part3Desc.'</i></p>';
				$output .= '<div class="center config"><button class="golden"><i>Configura</i></button></p></div>';
			$output .= '</div>';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/cartLarge.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>'.$part3Desc.'</i></p>';
				$output .= '<div class="center config"><button class="lightBlack"><i>Configura</i></button></p></div>';
			$output .= '</div>';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/searchLarge.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>Cerca il punto vendita piu vicino a te:</i></p>';
				$output .= '<div class="center search">
								<div class="input-append">
  									<input class="span2" id="appendedInput" type="text" placeholder="Citta">
  									<span class="add-on"></span>
							</div></div>';
			$output .= '</div>';
			$output .= '<div class="span3">';
				$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/phoneLarge.png'.'"></div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center large"></p>';
				$output .= '<div class="center large phone"><span><i>4050</i></spa></div>';
			$output .= '</div>';
		$output .= '</div>';
        $output .= '</div>';	
     }
     wp_reset_postdata();
     return $output;
}
function bip_shop($atts){
	extract(shortcode_atts(array(
		'limit' => '-1',
		'id'=>'0'
	), $atts));
	
	if($id){
		$limit = '1';	
	}
	
	$args = array(
		'post_type' => 'shop',
		'posts_per_page' => intval( $limit ),
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	
	if($id){
		$args['ID'] = intval( $id );	
	}
    
	$shop = new WP_Query($args);
	
    if ($shop->have_posts()) {
		$output = '<div>';
        $output .= '<div id="shop-detail" class="row">';
        while($shop->have_posts()) {
             $shop->the_post();
             if (has_post_thumbnail()) {
				$id 	= get_the_ID();
				$meta 	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
                $link 		= is_array($meta) && isset($meta['logoLink']) && !empty($meta['logoLink']) ? $meta['logoLink'] : '' ;
               	
				$image = get_the_post_thumbnail($id, BipCore::IMAGE_SIZE_SHOP_ITEM , array('title' => get_the_title(), 'alt' => get_the_title()));
				$title	= strtoupper(get_the_title());
				
				$output .= '<div class="span6">';
				$output .= '<div><h3 class="large">'.$title.'</h3></div>';
                $output .= '<div class="shop-info"><div class="row-fluid"><div class="span4">Indirizo</div><div class="span6">'.$meta['address'].'</div></div>';
				$output .= '<div class="row-fluid"><div class="span4">Telefono</div><div class="span6">'.$meta['phone'].'</div></div>';
				$output .= '<div class="row-fluid"><div class="span4">Orari d\'apertura</div><div class="span6">'.renderOpeningHours($meta['opening']).'</div></div></div>';
                $output .= '</div>';
				$output .= '<div class="span6">'.$image.'</div>';
             }
			$output .= '</div>';
			$output .= '<div class="clear"></div><hr>';
			$output .= bip_corner().'</div>';
        }		
     }
     wp_reset_postdata();
     return $output;
}
function renderOpeningHours($str){
	$str	= trim($str);
	$strArr	= explode(',', $str);
	$out	= '';
	foreach($strArr as $strAr){
		$hrs 	= explode(':', trim($strAr), 2);
		$out	.= '<div class="row-fluid"><div class="span5">'.$hrs[0].':</div><div class="span7">'.$hrs[1].'</div></div>';
	}
	return $out;
}
function bip_corner(){
    $out = '<div id="bipCorner" class="row">
        <div class="span2 offset5 bipCornerTitle">BIP <b>CORNER</b></div>
        <div class="clear"></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/trony.png" /></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/euronics.png" /></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/eldo.png" /></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/mediaworld.png" /></div>
    </div>';
	return $out;
}
function bip_googlemap($atts, $content = ''){
     $template_directory_uri = get_template_directory_uri();
     // Hardcoded demo data
     $atts = shortcode_atts(array(
              'apikey' => '',
	      'latitude' => '34.092809',
              'longitude' => '-118.328661',
              'marker_title' => __('Hello from Bip!', BIP_DOMAIN),
              'marker_image' => $template_directory_uri . '/assets/img/marker.png'
     ), $atts);
     extract($atts);
     $shortcode_unique_id = md5(serialize($atts) . $content);
     $object_name = 'bipMapMarkerInfo_' . $shortcode_unique_id;
     unset($atts['marker_title'], $atts['marker_image'], $atts['apikey']);
     $map_data_atts = '';
     foreach ($atts as $attr => $val) {
         $map_data_atts .= ' data-' . $attr . '="' . esc_attr( $val ) . '"';
     }
     // Load scripts in footer
     wp_register_script(BipCore::prefix('bip-google-map'), $template_directory_uri . '/assets/js/bip-google-map.js', array('jquery'), '', true);
     $google_loader_url = 'http://www.google.com/jsapi';
     if (!empty($apikey)) {
         $google_loader_url .= '?key=' . $apikey;
     }
     wp_register_script(BipCore::prefix('google-loader'), $google_loader_url, array(), '', true);
     // Order is important!
     wp_enqueue_script(BipCore::prefix('google-loader'));
     wp_enqueue_script(BipCore::prefix('bip-google-map'));
     $object_data = array(
         'title' => $marker_title,
         'image' => $marker_image,
         'content' => $content
     );
     wp_localize_script(BipCore::prefix('bip-google-map'), $object_name, $object_data);
     return '<div id="' . $object_name . '" class="bip-google-map"' . $map_data_atts . '></div>';
}
function bip_contact($atts, $content = ''){
     extract(shortcode_atts(array(
              'subject' => __('Bip Contact Form', BIP_DOMAIN),
	      'emailto' => get_bloginfo('admin_email'),
              'success_msg' => __('Your email was successfully sent and I will be in touch with you soon.', BIP_DOMAIN),
              'error_msg' => __('Please check if you\'ve filled all the fields with valid information.', BIP_DOMAIN)
     ), $atts));
     if(isset($_POST['submit']) && wp_verify_nonce($_POST['_wpnonce'], 'bip-contact-form') ) {
         $submit_done = true;
         $name = isset($_POST['contactname']) ? trim($_POST['contactname']) : '' ;
         $email = isset($_POST['email']) ? trim($_POST['email']) : '' ;
         $message = isset($_POST['message']) ? trim(stripslashes($_POST['message'])) : '' ;
         $error = false;
         //Check to make sure required fields are not empty
         foreach (compact('name', 'email', 'message') as $field) {
             if (empty($field)) {
                 $error = true;
                 break;
             }
         }
         if (!$error && !is_email($email)) {
             $error = true;
         }
         if (!$error) {
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nMessage:\n $message";
		$headers = 'From: ' . bloginfo('name'). ' <'.$emailto.'>' . "\r\n" . 'Reply-To: ' . $email;
		$email_sent = wp_mail($emailto, $subject, $body, $headers);
                if (!$email_sent)
                    $error = true;
         }
     }
     $output = '<div class="address">';
     $output .= '<div class="row">';
     $output .= '<div class="span6">';
     $output .= $content;
     $output .= '</div>';
     $output .= '<div class="span5 offset1">';
     if (isset($submit_done)) {
         if ($error) {
             $output .= '<p class="alert alert-error">' . $error_msg . '</p>';
         } else {
             $output .= '<p class="alert alert-success">' . $success_msg . '</p>';
         }
     }
     $output .= '<form action="' . esc_url( $_SERVER['PHP_SELF'] . '#' . basename(get_permalink())) . '" method="POST" id="contact">';
     $output .= wp_nonce_field('bip-contact-form', '_wpnonce', true, false);
     $output .= '<input type="text" id="contactname" name="contactname" placeholder="Name">';
     $output .= '<input type="text" id="email" name="email" placeholder="Email">';
     $output .= '<div class="textarea-container"><textarea id="message" name="message" placeholder="Message"></textarea></div>';
     $output .= '<input type="submit" id="submit" name="submit" value="Send">';
     $output .= '</form>';
     $output .= '</div>';
     $output .= '</div>';
     $output .= '</div>';
     return $output;
}

function bip_connect($atts, $content = ''){
     $output = '';
     $output .= '<ul class="connect">';
     $output .= do_shortcode($content);
     $output .= '</ul>';
     return $output;
}
function bip_connect_item($atts){
     extract(shortcode_atts(array(
	      'image' => '',
	      'link' => '',
	      'title' => '',
     ), $atts));
     $output = '';
     if (empty($link)) {
         $output .= '<li><img src="' . esc_url($image) . '" alt="' . esc_attr($title) .  '"></li>';
     } else {
         $output .= '<li><a title="' . esc_attr($title) . '" href="' .esc_url($link) .'"><img src="' . esc_url($image) . '" alt="' . esc_attr($title) . '"></a></li>';
     }
     return $output;
}
add_shortcode('bip_slider', 'bip_slider');
add_shortcode('bip_portfolio', 'bip_portfolio');
add_shortcode('bip_tariffs', 'bip_tariffs');
add_shortcode('bip_googlemap', 'bip_googlemap');
add_shortcode('bip_contact', 'bip_contact');
add_shortcode('bip_shop', 'bip_shop');
add_shortcode('bip_connect', 'bip_connect');
add_shortcode('bip_connect_item', 'bip_connect_item');
add_shortcode('bip_products', 'bip_products');
?>