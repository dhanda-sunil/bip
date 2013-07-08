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
     if ('all' != $slides){
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
     if($slides->have_posts()){
        $output .= '<div class="flexslider"' . $slider_data_atts . '>';
        $output .= '<ul class="slides">';
        while ($slides->have_posts()) {
            $slides->the_post();
            if (has_post_thumbnail()){
                $title = get_the_title();
                $image = get_the_post_thumbnail(get_the_ID(), $image_size, array('title' => $title, 'alt' => $title));
                $slide = get_post_meta(get_the_ID(), '_' . BipCore::prefix('slide'), TRUE);
                $output .= '<li>';
                $output .= '<h1>' . $title . '</h1>';
                if (is_array($slide) && isset($slide['link']) && !empty($slide['link'])) {
                    $output .= '<a href="' . esc_attr($slide['link']) . '">';
                    $output .= $image;
                    $output .= '</a>';
                }else{
                    $output .= $image;
                }
                $output .= '</li>';
            }
        }
        $output .= '</ul>';
        $output .= '</div>';
     }
     wp_reset_postdata();
	 
	 $output = BipCore::changeUrlDynamically($output);
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
	 
	 $output = BipCore::changeUrlDynamically($output);
     return $output;
}
function bip_products($atts){
	$options 	= BipMobileThemeOptions::getOptions();
	$shortname 	= BipMobileThemeOptions::cfg('shortname');	
	
	extract(shortcode_atts(array(
		'limit' => '-1',
		'id'=>'0'
	), $atts));
    
	if($id){
		$limit = '1';	
	}
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => intval( $limit ),
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	if($id){
		$args['ID'] = intval( $id );	
		$products = get_post($id);	
	}else{
    	$products = new WP_Query($args);
	}
	
 	$output = '';
	$output .= '<div class="product-items">';
    if ((isset($products->ID) && $products->ID)){
       	$id 		= $products->ID;
		$output 	.= renderFrontItem($id);
     }elseif($products->have_posts()){
        while($products->have_posts()) {
             $products->the_post();
			 $id = get_the_ID();
             if (has_post_thumbnail()) {
				 $title			= get_the_title();
                 $meta 			= get_post_meta($id, '_' . BipCore::prefix('product'), TRUE);
                 $link 			= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
                 $image_size 	= is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
                
				$shortDesc1		= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
				$shortDesc2		= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
				$video1			= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
				$video2			= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;	
				$output			.= '<p><a href="'.get_permalink($id).'">'.$title.'</a></p>';
			}
		}
		wp_reset_postdata();
	}
	$output .= '</div>';
	
	$output = BipCore::changeUrlDynamically($output);
    return $output;
}
function bip_tariffs($atts){
	$options 	= BipMobileThemeOptions::getOptions();
	$shortname 	= BipMobileThemeOptions::cfg('shortname');
	
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
		$tariff = get_post($id);	
	}else{
    	$tariff = new WP_Query($args);
	}
	$output = '';
	$output .= '<div class="widget-area">';
    if ((isset($tariff->ID) && $tariff->ID)) {		
		$id 		= $tariff->ID;
		$output 	.= renderFrontItem($id);
    }elseif($tariff->have_posts()){
        while($tariff->have_posts()) {
             $tariff->the_post();
			 $id = get_the_ID();
             if (has_post_thumbnail()) {
				 $title			= get_the_title();
                 $meta 			= get_post_meta($id, '_' . BipCore::prefix('tariff'), TRUE);
                 $link 			= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
                 $image_size 	= is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
                
				$shortDesc1		= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
				$shortDesc2		= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
				$video1			= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
				$video2			= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;	
				$output			.= '<p><a href="'.get_permalink($id).'">'.$title.'</a></p>';
			}
		}
		wp_reset_postdata();
	}
    $output .= '</div>';
	
	$output = BipCore::changeUrlDynamically($output);
    return $output;
}
function bip_options($atts){
	extract(shortcode_atts(array(
		'limit' => '-1',
		'id'=>'0'
	), $atts));
    if($id){
		$limit = '1';	
	}
	$args = array(
		'post_type' => 'option',
		'posts_per_page' => intval( $limit ),
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	if($id){
		$args['ID'] = intval( $id );
		$option = get_post($id);	
	}else{
    	$option = new WP_Query($args);
	}
	$output = '';
	$output .= '<div class="widget-area">';
    if ((isset($option->ID) && $option->ID)) {		
		$id 		= $option->ID;
		$output 	.= renderFrontItem($id);
    }elseif($option->have_posts()){
        while($option->have_posts()) {
             $option->the_post();
			 $id = get_the_ID();
             if (has_post_thumbnail()) {
				 $title			= get_the_title();
                 $meta 			= get_post_meta($id, '_' . BipCore::prefix('option'), TRUE);
                 $link 			= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
                 $image_size 	= is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
                
				$shortDesc1		= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
				$shortDesc2		= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
				$video1			= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
				$video2			= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;	
				$output			.= '<p><a href="'.get_permalink($id).'">'.$title.'</a></p>';
			}
		}
		wp_reset_postdata();
	}
    $output .= '</div>';
	
	$output = BipCore::changeUrlDynamically($output);
    return $output;
}
function bip_ricariche($atts){
	extract(shortcode_atts(array(
		'limit' => '-1',
		'id'=>'0'
	), $atts));
    if($id){
		$limit = '1';	
	}
	$args = array(
		'post_type' => 'ricariche',
		'posts_per_page' => intval( $limit ),
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	if($id){
		$args['ID'] = intval( $id );
		$option = get_post($id);	
	}else{
    	$option = new WP_Query($args);
	}
	$output = '';
	$output .= '<div class="widget-area">';
    if ((isset($option->ID) && $option->ID)) {		
		$id 		= $option->ID;
		$output 	.= renderFrontItem($id);
    }
    $output .= '</div>';
	
	$output = BipCore::changeUrlDynamically($output);
    return $output;
}
function bip_tariff_table($atts){
	extract(shortcode_atts(array(
		'limit' => '-1',
		'id'	=> '0',
		'view'	=> 'open'
	), $atts));
    if($id){
		$limit = '1';	
	}
	$args = array(
		'post_type' => 'tariff_table',
		'posts_per_page' => intval($limit),
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	if($id){
		$args['ID'] = intval($id);
		$tt = get_post($id);	
	}else{
    	$tt = new WP_Query($args);
	}
	
	$output = '<div id="tariff_table">';
	if ((isset($tt->ID) && $tt->ID)) {		
		$id 			= $tt->ID;
		$title			= $tt->post_title;
		$meta 			= get_post_meta($id, '_' . BipCore::prefix('tariff_table'), TRUE);
	 
		$link 			= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
		$column1Name 	= is_array($meta) && isset($meta['column1-name']) && !empty($meta['column1-name']) ? $meta['column1-name'] : '' ;
	
		$column2Name	= is_array($meta) && isset($meta['column2-name']) && !empty($meta['column2-name']) ? $meta['column2-name'] : '' ;
		$column3Name	= is_array($meta) && isset($meta['column3-name']) && !empty($meta['column3-name']) ? $meta['column3-name'] : '' ;
		$column4Name	= is_array($meta) && isset($meta['column4-name']) && !empty($meta['column4-name']) ? $meta['column4-name'] : '' ;
		$items			= is_array($meta) && isset($meta['tt_items']) && !empty($meta['tt_items']) ? $meta['tt_items'] : 1 ;
		$columns		= is_array($meta) && isset($meta['tt_columns']) && !empty($meta['tt_columns']) ? $meta['tt_columns'] : 3 ;
		$state			= is_array($meta) && isset($meta['tt_state']) && ($meta['tt_state']=='Close') ? strtolower($meta['tt_state']) : 'open' ;
		
		$output			.= '<div class="tablebox">';
			$output			.= '<h3><span>'.$title.'</span><div class="handlediv '.$view.'" title="Click to toggle"><br></div></h3>';
			$output			.= '<div class="clear"></div>
								<div class="inside" '.(($view=='close')?'style="display:none"':'').'>
									<div style="width:100%;">
										<div class="tt_columns'.$columns.'">';
										for($i=1; $i<=$columns;$i++){
											$columnName = 'column'.$i.'Name';
											$output	.= '<div class="inline column'.$i.'">
												<div class="clm'.$i.' itemHead">'.$$columnName.'</div>
											</div>
											<div class="inline clear"></div>';
										}
										$output	.= '</div>';
										for($i=1; $i<=$items;$i++){	
											$item_title = isset($meta['item_'.$i.'_title']) && !empty($meta['item_'.$i.'_title']) ? $meta['item_'.$i.'_title'] : '';
											if($item_title){													
												$output	.='<div class="itemrow tt_columns'.$columns.'">
												<div class="inline itemtitle">'.$item_title.'</div>';
												
												for($j=1; $j<=$columns;$j++){
													$itemName = 'item_'.$i.'_column'.$j;
													$output	.='<div class="inline center itemClm'.$j.'">'.(isset($meta[$itemName]) && !empty($meta[$itemName]) ? $meta[$itemName] : '').'</div>';
												}
												$output	.='<div class="inline center description"> <a class="btn btn-black" href="'.(isset($meta['item_'.$i.'_button_link']) && !empty($meta['item_'.$i.'_button_link']) ? $meta['item_'.$i.'_button_link'] : '').'">'.(isset($meta['item_'.$i.'_button_text']) && !empty($meta['item_'.$i.'_button_text']) ? ucfirst(strtolower($meta['item_'.$i.'_button_text'])) : '').'</a></div>
												</div>';
												if($i!=$items){
													$output	.= '<div class="tt_columns'.$columns.'">';
													for($j=1; $j<=$columns;$j++){
														$output	.= '<div class="inline column'.$j.'">
															<div class="clm'.$j.' itemBody"></div>
														</div>
														<div class="inline clear"></div>';
													}
													$output	.= '</div>';
												}else{
													$output	.= '<div class="tt_columns'.$columns.'">';
													for($j=1; $j<=$columns;$j++){
														$output	.= '<div class="inline column'.$j.'">
															<div class="clm'.$j.' itemFoot"></div>
														</div>
														<div class="inline clear"></div>';
													}
													$output	.= '</div>';
												}
											}
										}
									$output	.='</div>
								</div>';
		$output			.= '</div>';
    }elseif($tt->have_posts()){
		if($tt->have_posts()){
			while($tt->have_posts()) {
				 $tt->the_post();
				 $id = get_the_ID();
				 //if (has_post_thumbnail()) {
						$title			= get_the_title();
						$meta 			= get_post_meta($id, '_' . BipCore::prefix('tariff_table'), TRUE);
					 
						$link 			= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
						$column1Name 	= is_array($meta) && isset($meta['column1-name']) && !empty($meta['column1-name']) ? $meta['column1-name'] : '' ;
					
						$column2Name	= is_array($meta) && isset($meta['column2-name']) && !empty($meta['column2-name']) ? $meta['column2-name'] : '' ;
						$column3Name	= is_array($meta) && isset($meta['column3-name']) && !empty($meta['column3-name']) ? $meta['column3-name'] : '' ;
						$column4Name	= is_array($meta) && isset($meta['column4-name']) && !empty($meta['column4-name']) ? $meta['column4-name'] : '' ;
						$items			= is_array($meta) && isset($meta['tt_items']) && !empty($meta['tt_items']) ? $meta['tt_items'] : 1 ;
						$columns		= is_array($meta) && isset($meta['tt_columns']) && !empty($meta['tt_columns']) ? $meta['tt_columns'] : 3 ;
						$state			= is_array($meta) && isset($meta['tt_columns']) && ($meta['tt_columns']=='Close') ? $meta['tt_columns'] : 'open' ;
						
						$output			.= '<div class="tablebox">';
							$output			.= '<h3><span>'.$title.'</span><div class="handlediv '.$view.'" title="Click to toggle"><br></div></h3>';
							$output			.= '<div class="clear"></div>
												<div class="inside"  '.(($view=='close')?'style="display:none"':'').'>
													<div style="width:100%;">
														<div class="tt_columns'.$columns.'">';
														for($i=1; $i<=$columns;$i++){
															$columnName = 'column'.$i.'Name';
															$output	.= '<div class="inline column'.$i.'">
																<div class="clm'.$i.' itemHead">'.$$columnName.'</div>
															</div>
															<div class="inline clear"></div>';
														}
														$output	.= '</div>';
														for($i=1; $i<=$items;$i++){	
															$item_title = isset($meta['item_'.$i.'_title']) && !empty($meta['item_'.$i.'_title']) ? $meta['item_'.$i.'_title'] : '';
															if($item_title){													
																$output	.='<div class="itemrow tt_columns'.$columns.'">
																<div class="inline itemtitle">'.$item_title.'</div>';
																
																for($j=1; $j<=$columns;$j++){
																	$itemName = 'item_'.$i.'_column'.$j;
																	$output	.='<div class="inline center itemClm'.$j.'">'.(isset($meta[$itemName]) && !empty($meta[$itemName]) ? $meta[$itemName] : '').'</div>';
																}
																$output	.='<div class="inline center description"> <a class="btn btn-black" href="'.(isset($meta['item_'.$i.'_button_link']) && !empty($meta['item_'.$i.'_button_link']) ? $meta['item_'.$i.'_button_link'] : '').'">'.(isset($meta['item_'.$i.'_button_text']) && !empty($meta['item_'.$i.'_button_text']) ?ucfirst(strtolower($meta['item_'.$i.'_button_text'])) : '').'</a></div>
																</div>';
																if($i!=$items){
																	$output	.= '<div class="tt_columns'.$columns.'">';
																	for($j=1; $j<=$columns;$j++){
																		$output	.= '<div class="inline column'.$j.'">
																			<div class="clm'.$j.' itemBody"></div>
																		</div>
																		<div class="inline clear"></div>';
																	}
																	$output	.= '</div>';
																}else{
																	$output	.= '<div class="tt_columns'.$columns.'">';
																	for($j=1; $j<=$columns;$j++){
																		$output	.= '<div class="inline column'.$j.'">
																			<div class="clm'.$j.' itemFoot"></div>
																		</div>
																		<div class="inline clear"></div>';
																	}
																	$output	.= '</div>';
																}
															}
														}
													$output	.='</div>
												</div>';
						$output			.= '</div>';
				//}
			}
		wp_reset_postdata();
		}
	}
    $output .= '</div>';
	
	$output = BipCore::changeUrlDynamically($output);
    return $output;
}
function bip_faq_table($atts){
	extract(shortcode_atts(array(
		'limit' => '-1',
		'id'	=> '0',
		'view'	=> 'open'
	), $atts));
    if($id){
		$limit = '1';	
	}
	$args = array(
		'post_type' => 'faq_table',
		'posts_per_page' => intval($limit),
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	if($id){
		$args['ID'] = intval($id);
		$ft = get_post($id);	
	}else{
    	$ft = new WP_Query($args);
	}
	
	$output = '<div id="faq_table">';
	if ((isset($ft->ID) && $ft->ID)) {		
		$id 			= $ft->ID;
		$title			= $ft->post_title;
		$meta 			= get_post_meta($id, '_' . BipCore::prefix('faq_table'), TRUE);
		
		$items			= is_array($meta) && isset($meta['ft_items']) && !empty($meta['ft_items']) ? $meta['ft_items'] : 1 ;
		$state			= is_array($meta) && isset($meta['ft_state']) && ($meta['ft_state']=='Close') ? strtolower($meta['ft_state']) : 'open' ;
		$output .= '<div class="itemFaq">
						<span class="quest" onclick="showSubQuest(\'quest'.$id.'\'); return false;">'.$title.'</span>
						<a href="#" onclick="showSubQuest(\'quest'.$id.'\'); return false;"><span class="arrowBottom" id="arrow_quest'.$id.'"> </span></a>
						
						<div class="subFaqWrapper" id="quest'.$id.'">';
						for($i=1; $i<=$items;$i++){
							$item_title = isset($meta['q_'.$i.'_title']) && !empty($meta['q_'.$i.'_title']) ? $meta['q_'.$i.'_title'] : '';
							$answer		= isset($meta['q_'.$i.'_answer']) && !empty($meta['q_'.$i.'_answer']) ? $meta['q_'.$i.'_answer'] : '';
							if($item_title){
								$output .= '<div class="subItemFaq">
									<span class="subQuest" onclick="showSubResponse(\'quest'.$id.'_sub'.$i.'\'); return false;">'.$item_title.'</span>
									<a href="#" onclick="showSubResponse(\'quest'.$id.'_sub'.$i.'\'); return false;"><span class="arrowWhiteBottom" id="arrow_quest'.$id.'_sub'.$i.'"> </span></a>
									<div class="subResponse" id="quest'.$id.'_sub'.$i.'">'.$answer.'</div>
								</div>';
							}
						}
						$output .='</div>
					</div>';
	}
	$output .='</div>';
	
	$output = BipCore::changeUrlDynamically($output);
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
        while($shop->have_posts()){
            $shop->the_post();
			$id 	= get_the_ID();
			$meta 	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
			$link 		= is_array($meta) && isset($meta['logoLink']) && !empty($meta['logoLink']) ? $meta['logoLink'] : '' ;
			
			$image = get_the_post_thumbnail($id, BipCore::IMAGE_SIZE_SHOP_ITEM , array('title' => get_the_title(), 'alt' => get_the_title()));
			$title	= strtoupper(get_the_title());
			
			$output .= '<div class="span6">';
				$output .= '<h3 class="large">'.$title.'</h3>';
				$output .= '<div class="shop-info"><div class="row-fluid"><div class="span4">Indirizo</div><div class="span6">'.$meta['address'].'</div></div>';
				$output .= '<div class="row-fluid"><div class="span4">Telefono</div><div class="span6">'.$meta['phone'].'</div></div>';
				$output .= '<div class="row-fluid"><div class="span4">Orari d\'apertura</div><div class="span6">'.renderOpeningHours($meta['opening']).'</div></div></div>';
			$output .= '</div>';
			$output .= '<div class="span6">'.$image.'</div>';
			$output .= '</div>';
			$output .= '<div class="clear"></div>';
        }		
     }
     wp_reset_postdata();
	 $output .= bip_corner().'</div></div>';
	 
	 $output = BipCore::changeUrlDynamically($output);
     return $output;
}
function renderOpeningHours($str=''){
	$str	= trim($str);
	$strArr	= explode(',', $str);
	$out	= '';
	if($str=='')
		return '&nbsp;';
		
	foreach($strArr as $strAr){
		$out	.= '<div class="row-fluid">';
		$strAr 	= trim($strAr);
		if(strpos($strAr, '::')!==false){
			$hrs 	= explode('::', $strAr, 2);
			$out	.= '<div class="span5">'.((isset($hrs[1]) && !empty($hrs[1]))?trim($hrs[0]):$strAr).'</div>';
			$out	.= '<div class="span7 semibold">'.((isset($hrs[1]) && !empty($hrs[1]))?trim($hrs[1]):'').'</div>';
		}else{
			$out	.= '<div class="span12">'.$strAr.'</div>';
		}
		$out	.= '</div>';
	}
	
	$output = BipCore::changeUrlDynamically($output);
	return $out;
}
function getLocation($data = '', $id = 0){
	$lat = '';
	$lng = '';
	if(is_array($data)){
		$address	= $data['address'];
		$title		= $data['title'];
	}else{
		$address	= $data;
		$title		= $data;
	}
	$locationContent = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($address.' italy').'&components=country:italy&sensor=false');
	if($locationContent){
		try{
			$locationObj = json_decode($locationContent);
			if($locationObj->status=='OK'){
				$location = $locationObj->results[0]->geometry->location;
				//var_dump( $locationObj->results[0]->geometry->location);
				$lat = $location->lat;
				$lng = $location->lng;				
			}
		} catch(Exception $e){
		
		}
	}
	$marker				= array('lat'=> $lat, 'lng'=>$lng, 'title'=>$title, 'id'=>$id);
	/*$location 			= new stdClass();
	$location->id		= $id;
	$location->title	= $title;
	$location->lat		= $lat;
	$location->lng 		= $lng;
	$location->marker 	= $marker;*/
	
	return $marker;
}
function render_shop_map($address, $size){
	if(!is_array($address)){
		$location = getLocation($address);
		ob_start();
		?>
		<iframe width="<?php echo $size['w'];?>" height="<?php echo $size['h'];?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $address;?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $address;?>&amp;t=m&amp;z=14&amp;iwloc=near&amp;output=embed&amp;sensor=false"></iframe><!--<br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=ROMA++Via+Appia+Nuova,+131&amp;sll=41.882537,12.513538&amp;sspn=0.009697,0.019248&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Appia+Nuova,+131,+Roma,+Lazio,+Italy&amp;ll=41.882537,12.513538&amp;spn=0.009697,0.019248&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>-->
		<?php
		$out = ob_get_contents();
		ob_clean();
		return $out;
	}else{
		$records			= new stdClass();
		$markersResults    	= array();
		if(count($address)>0){
			foreach($address as $id=>$add){
				/*$results					= getLocation($add, $id);
				$records->{'record_'.$id} 	= $results;*/
				$markersResults[]			= getLocation($add, $id);//$results->marker;
			}
			$location = (object)$markersResults[0];
		}else{
			/*$results				= getLocation();
			$records->{'record_0'} 	= getLocation();*/
			$markersResults[]		= getLocation();//$results->marker;
			$location 				= (object)$markersResults[0];
		}
		?>
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
		function getLocation(){
			//var g = new google.maps.Geocoder();
			//_dir(g)
			//return;
			if (navigator.geolocation){
				navigator.geolocation.getCurrentPosition(showPosition);
			}else{
				alert("Geolocation is not supported by this browser.");
			}
		}
		function showPosition(position){
			window.location.href = 'index.php?my_lat='+position.coords.latitude+'&my_lon='+position.coords.longitude;
		}
		
		var map, places, iw;
		var markers 			= [];
		var autocomplete;
		/*var resultRecordsJson 	= <?php echo json_encode($records); ?>;*/
		var markersResults 		= <?php echo json_encode($markersResults); ?>;
		var myMarkers 			= false;
		var newRecordMarker 	= false;
		
		function initialize() {
			var myLatlng 	= new google.maps.LatLng(<?php echo $location->lat; ?>, <?php echo $location->lng; ?>);
			var myOptions 	= {
				zoom: 14,
				label:true,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP //google.maps.MapTypeId.HYBRID
			};
			map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
			myMarkers = new google.maps.Marker({
				position: myLatlng,
				title:"<?php echo $location->title; ?>",
				map:map,
				draggable:false,
				icon:"<?php echo WPTHEME_URL;?>/assets/img/blueDrop.png"
			});
			google.maps.event.addListener(myMarkers, 'dragend', function(){ var me = this; setTimeout(function(){
				var position  = me.getPosition();
				/*_('myLatField').value = position.lat();
				_('myLonField').value = position.lng();*/
				//window.location.href = 'index.php?my_lat='+position.lat()+'&my_lon='+position.lng(); 
			}, 500)});
			placeMarkers(true);		
		}
		function placeMarkers(starting){
			try{
				clearMarkers();
				for (var i = 0; i < markersResults.length; i++) {
					var lat = markersResults[i].lat;
					var lng = markersResults[i].lng;
					markers[i] = new google.maps.Marker({
						position: new google.maps.LatLng(lat, lng),
						animation: google.maps.Animation.DROP,
						record_id:markersResults[i].id,
						markerIndex:i,
						title:markersResults[i].title
					});
					markers[i].setDraggable(false);
					//if(starting){
						markers[i].setIcon('<?php echo WPTHEME_URL;?>/assets/img/blueDrop.png');
					//}
					
					/*google.maps.event.addListener(markers[i], 'click', function(){ ShowRecordData(this.record_id)  });
					google.maps.event.addListener(markers[i], 'dragstart', function(){ ShowRecordData(this.record_id)  });
					google.maps.event.addListener(markers[i], 'dragend', function(){ var me = this; setTimeout(function(){updateFormLatLng(me.markerIndex)}, 500)});*/
					setTimeout(dropMarker(i), i * 100);
				}
			}catch(e){
				
			}
		}

		function clearMarkers() {
			for (var i = 0; i < markers.length; i++) {
				if (markers[i]) {
					markers[i].setMap(null);
					markers[i] == null;
				}
			}
			if(newRecordMarker){
				newRecordMarker.setMap(null);
				newRecordMarker == null;
			}
		}
		
		function dropMarker(i) {
			return function() {
				markers[i].setMap(map);
			}
		}
		function _(id){
			return document.getElementById(id);
		}
		/*function updateFormLatLng(i, marker){
			i = i?i:0;
			if(!marker){
				marker = markers[i];
			}
			var position  = marker.getPosition();
			_('latField').value = position.lat();
			_('lonField').value = position.lng();
		}*/
		/*function copyTiming(){
			var value = _('sunField').value
			_('monField').value = value;
			_('tueField').value = value;
			_('wedField').value = value;
			_('thuField').value = value;
			_('friField').value = value;
			_('satField').value = value;
		}*/
		function _dir(d){
			console.dir(d);
		}
		/*function submitForm(form){
			var elements = form.elements, ele, data={};
			for(var i=0; i<elements.length; i++){
				ele = elements[i];
				if(ele.type=='checkbox' || ele.type=='radio'){
					if(ele.checked){
					//_dir(data[ele.name] +', '+ele.name+', '+ele.value)
						if(data[ele.name]){
							data[ele.name] += ','+ele.value;
						}else{
							data[ele.name] = ele.value;
						}						
					}
				}else{
					data[ele.name] = ele.value;
				}				
			}
			//localStorage.lastUpdate = jsonencode(data);
			deHelper.ajax({
				url:'index.php',
				params:data,
				method:'POST',
				onSuccess:function(s, result){_dir(result);
					var result = (eval('('+result+')'));
					if(result.error){
						alert(result.error);
					}else{
						_('form_id').value = result.id;
						deHelper.alert('Saved');
					}
				}
			});
			return false;
		}*/
		
	  	google.maps.event.addDomListener(window, 'load', initialize);
		
		/*function ShowRecordData(id){
				if(resultRecordsJson['record_'+id]){
				var record = resultRecordsJson['record_'+id];
				var elements = _('detailForm').elements, ele, fName, value;
				for(var i=0; i<elements.length; i++){
					ele = elements[i];
					if(ele.className.indexOf('hid')>-1){
						continue;
					}
					fName = ele.name;
					if(ele.name=='form_id'){
						fName = 'id';
					}
					value = record[fName];
					if(ele.type=='radio'){
						if(value == ele.value){
							ele.checked = true;
						}else{
							ele.checked = false;
						}
					}else if(ele.type=='checkbox'){
						if(value.indexOf(ele.value)>-1){
							ele.checked = true;
						}else{
							ele.checked = false;
						}
					}else{
						ele.value = value;
					}				
				}
			}
		}*/
		
		function centerThis(index){
			if(markers[index]){
				markers[index].setIcon('<?php echo WPTHEME_URL;?>/assets/img/blueDrop.png');
				map.setCenter(markers[index].getPosition());
			}
		}
		
		/*function newRecord(){
			 ShowRecordData(0);
			 newRecordMarker = new google.maps.Marker({
				position: map.getCenter(),
				title:'New',
				map:map,
				draggable:true,
				icon:'<?php echo WPTHEME_URL;?>/assets/img/newDrop.png'
			});
			google.maps.event.addListener(newRecordMarker, 'click', function(){ ShowRecordData(0)  });
			google.maps.event.addListener(newRecordMarker, 'dragstart', function(){ ShowRecordData(0)  });
			google.maps.event.addListener(newRecordMarker, 'dragend', function(){ var me = this; setTimeout(function(){updateFormLatLng(0, me)}, 500)});
		}
		
		function resetLocation(){
			var resLat = _('myLatField').value;
			var resLon = _('myLonField').value;
			window.location.href = 'index.php?my_lat='+resLat+'&my_lon='+resLon;
		}
		
		function copyCurrentLocation(){
			var resLat =  _('myLatField').value = _('latField').value;
			var resLon = _('myLonField').value = _('lonField').value;
			window.location.href = 'index.php?my_lat='+resLat+'&my_lon='+resLon;
		}
		
		function searchLocation(){
			window.location.href = 'index.php?searchLocation='+(_('searchLocationField').value);
		}
		
		function searchRecords(){
			window.location.href = 'index.php?mySearch='+(_('mySearchField').value);
		}
		
		function useMapsCenterLocation(){
			var center = map.getCenter();
			window.location.href = 'index.php?my_lat='+center.Ya+'&my_lon='+center.Za;
		}
		
		function checkKeyForSubmit(event, input, func){
			if(event.keyCode==13){
				func();
			}
		}*/
	</script>
        <?php
	}
	
}
function bip_corner(){
    /*$out = '<div id="bipCorner" class="row">
        <div class="span2 offset5 bipCornerTitle">BIP <b>CORNER</b></div>
        <div class="clear"></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/trony.png" /></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/euronics.png" /></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/eldo.png" /></div>
        <div class="span3 logo"><img src="'.get_stylesheet_directory_uri().'/assets/img/mediaworld.png" /></div>
    </div>';*/
	$out = '<div id="bipCorner" class="row"><img src="'.get_stylesheet_directory_uri().'/assets/img/bip_corner.jpg" /></div>';
	
	$output = BipCore::changeUrlDynamically($output);
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
	 
	 $output = BipCore::changeUrlDynamically($output);
     return $output;
}

function bip_connect($atts, $content = ''){
     $output = '';
     $output .= '<ul class="connect">';
     $output .= do_shortcode($content);
     $output .= '</ul>';
	 
	 $output = BipCore::changeUrlDynamically($output);
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
	 
	 $output = BipCore::changeUrlDynamically($output);
     return $output;
}
function bip_item_detail_bottom($atts){
	extract(shortcode_atts(array(
	  'id' => ''
	), $atts));
	$output = '';
	if (!empty($id)) {
		$options 	= BipMobileThemeOptions::getOptions();
		$shortname 	= BipMobileThemeOptions::cfg('shortname');
		$title 		= get_the_title($id);
		$postType	= get_post_type($id);
		//$link		= get_permalink($id);
		$meta 		= get_post_meta($id, '_' . BipCore::prefix($postType), TRUE);
		$shortDesc1	= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
		$shortDesc2	= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
		$bottom_box1_link= is_array($meta) && isset($meta['bottom_box1_link']) && !empty($meta['bottom_box1_link']) ? $meta['bottom_box1_link'] : '' ;
		$bottom_box2_link= is_array($meta) && isset($meta['bottom_box2_link']) && !empty($meta['bottom_box2_link']) ? $meta['bottom_box2_link'] : '' ;
		
		$output .= '<div class="row '.(($postType == 'ricariche')?'':'hr_shadow_down').' lowerSection">';
			$output .= '<div class="span3 border gray">';
				$output .= '<a href="'.$bottom_box1_link.'"><div class="center image200">'.get_the_post_thumbnail($id, array(200,200) , array('title' => $title, 'alt' => $title)).'</div>';
				/*$output .= '<div><h6 class="center">'.$title.'</h6></div></a>';
				$output .= '<p class="center small"><i>'.$shortDesc1.'</i><br><i>'.$shortDesc2.'</i></p>';*/
				$output .= '<div class="center config"><a class="btn btn-golden" href="'.$bottom_box1_link.'"><i>'.$options[$shortname.'_productpage_bottombox1_button'].'</i></a></div>';
			$output .= '</div>';
			$output .= renderProductBottomBoxes($bottom_box2_link);  
		$output .= '</div>';
	}
	
	$output = BipCore::changeUrlDynamically($output);
	return $output;
}
add_shortcode('bip_slider', 'bip_slider');
add_shortcode('bip_portfolio', 'bip_portfolio');
add_shortcode('bip_tariffs', 'bip_tariffs');
add_shortcode('bip_tariff_table', 'bip_tariff_table');
add_shortcode('bip_faq_table', 'bip_faq_table');
add_shortcode('bip_googlemap', 'bip_googlemap');
add_shortcode('bip_contact', 'bip_contact');
add_shortcode('bip_shop', 'bip_shop');
add_shortcode('bip_connect', 'bip_connect');
add_shortcode('bip_connect_item', 'bip_connect_item');
add_shortcode('bip_products', 'bip_products');
add_shortcode('bip_options', 'bip_options');
add_shortcode('bip_ricariche', 'bip_ricariche');
add_shortcode('bip_item_detail_bottom', 'bip_item_detail_bottom');
?>