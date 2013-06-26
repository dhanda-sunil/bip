<?php
/*-----------------------------------------------------------------------------------*/
/* Theme Core Files Includes
/*-----------------------------------------------------------------------------------*/
bloginfo('site_url');
$template_directory = get_template_directory();
define('WPTHEME_PATH', $template_directory);
define('WPTHEME_URL', get_template_directory_uri());
define('BIP_DOMAIN', 'bipmobile');
require_once $template_directory . '/core/init.php'; // Frontend and core wordpress features (styles, scripts, widgets, taxanomies, post types, thumbnails, etc.)
require_once $template_directory . '/core/shortcodes.php'; // Shortcodes
require_once ('options/options.php');

if (is_admin()) {
    require_once ( $template_directory . '/core/admin/init.php' ); // Setup admin area (metaboxes, sctipts, styles, panel options, etc.)
}
function html2txt($document){ 
	$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
				   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
				   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
				   '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
	); 
	$text = preg_replace($search, '', $document); 
	return $text; 
} 

function getFooterCategories(){
	$categories	= array('PRODOTTI','TARIFFE','INFORMAZIONI','IL MEO ACCOUNT');
	return $categories;
}
function get_categories_deep ($parent_id = 0, $level = 0){
	//echo '<br>deep'.$level.'<br>'."\n";
	global $wpdb;
	$sql = "SELECT t.term_id, t.name 
			FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt 
			ON t.term_id = tt.term_id
			WHERE tt.taxonomy = 'category' AND tt.parent = $parent_id";	
	
	$items = $wpdb->get_results ($sql);
	//if ($items) {echo 'items = ';print_r($items );}
	$categories='';
	foreach ($items as $item){
		$categories['values'][(string) $item->term_id] = str_repeat("- ", $level) . $item->name;
		$categories['class'][(string) $item->term_id] = 'level-'.$level;
		//echo '<br>cur item '.$item->name.' '.$item->term_id.' <br>'."\n";
		$child_categories = get_categories_deep ($item->term_id, $level+1);
		//echo '<br>cur item '.$item->name.' <br>'."\n";
		//echo '<br>ret to deep'.$level.'<br>'."\n";
		//echo 'child_categories = ';print_r($child_categories );
		if (is_array($child_categories)){
			//echo 'before merge = ';print_r($categories );
			//$categories = array_merge_recursive  ($categories, $child_categories);
			$categories = array_merge_recursive  ($categories, $child_categories);
			//echo 'after merge = ';print_r($categories );
		}
	}
	return $categories;
}
function getAllItems(){
	$args = array(
		 'post_type' 	=> array('product', 'tariff', 'option'),
		 'posts_per_page' 	=> -1,
		 'order' 		=> 'ASC',
		 'orderby' 		=> 'menu_order'
	);
	$array = array();
	$items = get_posts($args);
	if ($items) {
		foreach($items as $item) {
			$array['values'][$item->ID] = $item->post_title;
		}
	}
	return $array;
}
function getProducts($limit='-1'){
	$args = array(
		 'post_type' => 'product',
		 'posts_per_page' => intval($limit),
		 'order' => 'ASC',
		 'orderby' => 'menu_order'
	);
	$products = get_posts($args);
	$output = '<ul>';
	if ($products) {
		foreach($products as $product) {
			$output .='<li><a href="?p='.$product->ID.'">'.$product->post_title.'</a></li>';
		}
	}
	$output .= '</ul>';
	return $output;
}
function getTariffs($limit='-1'){
	$args = array(
		 'post_type' => 'tariff',
		 'posts_per_page' => intval($limit),
		 'order' => 'ASC',
		 'orderby' => 'menu_order'
	);
	$products = get_posts($args);
	$output = '<ul>';
	if ($products) {
		foreach($products as $product) {
			$output .='<li><a href="?p='.$product->ID.'">'.$product->post_title.'</a></li>';
		}
	}
	$output .= '</ul>';
	return $output;
}
function renderFrontItem($id){
	$options 	= BipMobileThemeOptions::getOptions();
	$shortname 	= BipMobileThemeOptions::cfg('shortname');
	
	$title 		= get_the_title($id);
	$output		= '';
	if (has_post_thumbnail($id)) {
		$postType	= get_post_type($id);
		$meta 		= get_post_meta($id, '_' . BipCore::prefix($postType), TRUE);
		$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : get_permalink($id) ;
		$image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
		
		$image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
		preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches );
		$postImageSrc 	= $matches[1][0];
		$videoImage_1 = $meta['video_1_image'];
		$videoImage_2 = $meta['video_2_image'];
		$shortDesc1	= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
		$shortDesc2	= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
		$description= is_array($meta) && isset($meta['description']) && !empty($meta['description']) ? $meta['description'] : '' ;
		$bottom_box1_link= is_array($meta) && isset($meta['bottom_box1_link']) && !empty($meta['bottom_box1_link']) ? $meta['bottom_box1_link'] : '' ;
		$bottom_box2_link= is_array($meta) && isset($meta['bottom_box2_link']) && !empty($meta['bottom_box2_link']) ? $meta['bottom_box2_link'] : '' ;
		$video1		= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
		$video2		= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;	
		$gray_box_title		= is_array($meta) && isset($meta['gray_box_title']) && !empty($meta['gray_box_title']) ? $meta['gray_box_title'] : '' ;	
		$gray_box_image		= is_array($meta) && isset($meta['gray_box_image']) && !empty($meta['gray_box_image']) ? $meta['gray_box_image'] : '' ;	
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
		$ajax_url		= wp_nonce_url( admin_url('admin-ajax.php?action=render_video&post_id=' . $id ), 'bip_ajax_render_video' );	
		$output .= '<div id="item-detail" class="row ">';
		$output .= '<div class="span6">';
			$output .= '<a href="' . $link . '" title="' . html2txt($title) . '">';
			$output .= '<div><h1 class="right larger">'.$title.'</h1></div>';
			$output .= '<div><h3 class="right slim">'.$shortDesc1.'</h3></div>';
			$output .= '<div><h3 class="right slim">'.$shortDesc2.'</h3></div>';
			$output .= '</a>';
			if($video1!=""){
				$img1 = ($videoImage_1)?$videoImage_1:$postImageSrc;
				$output .= '<div class="pull-right video" style="background:url('.$img1.') center center;" onclick=showVideo(this,"'.$video1.'","' .$ajax_url.'");><div class="right carousel-control" style="display: block;">›</div></div>';
			}
			if($video2!=""){
				$img2 = ($videoImage_2)?$videoImage_2:$postImageSrc;
				$output .= '<div class="pull-right video" style="background:url('.$img2.') center center;" onclick=showVideo(this,"'.$video2.'","' .$ajax_url.'");><div class="right carousel-control" style="display: block;">›</div></div>';
			}
		$output .= '</div>';
		$output .= '<div class="span6 center">';
		if (!empty($link)) {
			$output .= '<a href="' . $link . '" title="' . html2txt($title) . '">' . $image . '</a>';
		} else {
			$output .= '<a href="' . get_permalink($id) . '" title="' . html2txt($title) . '">'.$image.'</a>';
		}
		$output .= '</div></div><div class="clear"></div>';
		
		
		if($postType == 'ricariche'){//Ricariche template
			$output .= '<p>'.$description.'</p>';
			$output .= '<div class="hr_shadow_down" style="height:70px;margin-top:45px;"></div>';
			/*Part1*/
			if (!empty($part1Title)) {
				$output .= '<div class="'.$postType.' row">';
					
					$output .= '<div class="span6 hr_shadow_down_small">';
						$output .= '<div class="product_image">';
						if (!empty($part1Image)) {
							$output .= '<img src="' . $part1Image . '" alt="'.html2txt($part1Title).'"/>';
						}
						$output .= '</div>';
						$output .= '<div class="product_content"><h1>'.$part1Title.'</h1>';
						$output .= '<h3>'.$part1SubTitle.'</h3></div>';
						$output .= '<p>'.$part1Desc.'</p>';
					$output .= '</div>';
					
				/*Part2*/
				if (!empty($part2Title)) {
					$output .= '<div class="span6 hr_shadow_down_small">';
						$output .= '<div class="product_image">';
						if (!empty($part2Image)) {
							$output .= '<img src="' . $part2Image . '" alt="' . html2txt($part2Title) . '"/>';
						}
						$output .= '</div>';
						$output .= '<div class="product_content"><h1>'.$part2Title.'</h1>';
						$output .= '<h3>'.$part2SubTitle.'</h3></div>';
						$output .= '<p>'.$part2Desc.'</p>';
					$output .= '</div>';
					
				}
				$output .= '</div>';
			}
			/*Part3*/
			if (!empty($part3Title)) {
				$output .= '<div class="'.$postType.' row">';
					$output .= '<div class="span6 hr_shadow_down_small">';
						$output .= '<div class="product_image">';
						if (!empty($part3Image)) {
							$output .= '<img src="' . $part3Image . '" alt="' . html2txt($part3Title) . '"/></a>';
						}
						$output .= '</div>';
						$output .= '<div class="product_content"><h1>'.$part3Title.'</h1>';
						$output .= '<h3>'.$part3SubTitle.'</h3></div>';
						$output .= '<p>'.$part3Desc.'</p>';
					$output .= '</div>';
					
				/*Part4*/
				if (!empty($part4Title)){
					$output .= '<div class="span6 hr_shadow_down_small">';
						$output .= '<div class="product_image">';	
						if (!empty($part4Image)) {
							$output .= '<img src="' . $part4Image . '" alt="' . html2txt($part4Title) . '"/>';
						}
						$output .= '</div>';
						$output .= '<div class="product_content"><h1>'.$part4Title.'</h1>';
						$output .= '<h3>'.$part4SubTitle.'</h3></div>';
						$output .= '<p>'.$part4Desc.'</p>';
					$output .= '</div>';
				}
				$output .= '</div>';
			}
			$output .= '<div class="hr_shadow_down" style="height:60px;margin-top:20px;"></div>';
			/*Bottom Section*/
			$bottomTitle = is_array($meta) && isset($meta['bottom-title']) && !empty($meta['bottom-title']) ? $meta['bottom-title'] : '' ;
			$bottomSubTitle 	= is_array($meta) && isset($meta['bottom-subtitle']) && !empty($meta['bottom-subtitle']) ? $meta['bottom-subtitle'] : '' ;
			$bottomDesc 	= is_array($meta) && isset($meta['bottom-description']) && !empty($meta['bottom-description']) ? $meta['bottom-description'] : '' ;				
			$bottomImage = is_array($meta) && isset($meta['bottom-image']) && !empty($meta['bottom-image']) ? $meta['bottom-image'] : '' ;
			if (!empty($bottomTitle)){
				$output .= '<div class="row">';
					$output .= '<div class="span6 center">';	
					if (!empty($bottomImage)) {
						$output .= '<img src="' . $bottomImage . '" alt="' . html2txt($bottomTitle) . '"/>';
					}
					$output .= '</div>';
					$output .= '<div class="span6">';
						$output .= '<h2>'.$bottomTitle.'</h2>';
						/*$output .= '<h3>'.$bottomSubTitle.'</h3>';*/
						$output .= '<p>'.$bottomDesc.'</p>';	
					$output .= '</div>';
					
				$output .= '</div>';
				$output .= '<div class="hr_shadow_down" style="height:50px;margin-top:50px;"></div>';
			}
		}else{
			$output .= '<div class="row item_desc">
							<div class="span12">
								<p>'.$description.'</p>
							</div>
						</div>';
						
			if($gray_box_title!=''){
				$output .= '<div class="row hr_shadow_down" style="padding:30px 0px;">
								<div class="span12">
									<h1>'.$gray_box_title.'</h1>
									<div><img src="'.$gray_box_image.'" /></div>
								</div>
							</div>';
			}
			/*Part1*/
			if (!empty($part1Title)) {
				$output .= '<div class="row hr_shadow_up_down">';
					$output .= '<div class="span4">';
					if (!empty($part1Image)) {
						$output .= '<img src="' . $part1Image . '" width="300" alt="'.html2txt($part1Title).'"/>';
					}
					$output .= '</div>';
					$output .= '<div class="span8 product-info">';
						$output .= '<h3 class="large">'.$part1Title.'</h3>';
						$output .= '<h6>'.$part1SubTitle.'</h6>';
						$output .= '<p class="small">'.$part1Desc.'</p>';
					$output .= '</div>';
				$output .= '</div>';
			}
			/*Part2*/
			if (!empty($part2Title)) {
				$output .= '<div class="row">';
					$output .= '<div class="span8 product-info">';
						$output .= '<h3 class=" large">'.$part2Title.'</h3>';
						$output .= '<h6 class="">'.$part2SubTitle.'</h6>';
						$output .= '<p class=" small">'.$part2Desc.'</p>';
					$output .= '</div>';
					$output .= '<div class="span4">';
					if (!empty($part2Image)) {
						$output .= '<img src="' . $part2Image . '" width="300" alt="' . html2txt($part2Title) . '"/>';
					}
					$output .= '</div>';
				$output .= '</div>';
			}
			
			/*Part3*/
			if (!empty($part3Title)) {
				$output .= '<div class="row hr_shadow_up_down">';
					$output .= '<div class="span4">';
					if (!empty($part3Image)) {
						$output .= '<img src="' . $part3Image . '" width="300" alt="' . html2txt($part3Title) . '"/></a>';
					}
					$output .= '</div>';
					$output .= '<div class="span8 product-info">';
						$output .= '<h3 class=" large">'.$part3Title.'</h3>';
						$output .= '<h6 class="">'.$part3SubTitle.'</h6>';
						$output .= '<p class=" small">'.$part3Desc.'</p>';
					$output .= '</div>';
				$output .= '</div>';
			}
			/*Part4*/
			if (!empty($part4Title)) {
				$output .= '<div class="row">';
					$output .= '<div class="span8 product-info">';
						$output .= '<h3 class=" large">'.$part4Title.'</h3>';
						$output .= '<h6 class="">'.$part4SubTitle.'</h6>';
						$output .= '<p class=" small">'.$part4Desc.'</p>';	
					$output .= '</div>';
					$output .= '<div class="span4">';	
					if (!empty($part4Image)) {
						$output .= '<img src="'.$part4Image.'" width="300" alt="' . html2txt($part4Title) . '"/>';
					}
					$output .= '</div>';
				$output .= '</div>';
			}
		}
	}
		 
	$output .= '<div class="row '.(($postType == 'ricariche')?'':'hr_shadow_down').' lowerSection">';
		$output .= '<div class="span3">';
			$output .= '<a href="#"><div class="center image">'.get_the_post_thumbnail($id, array(200,300) , array('title' => $title, 'alt' => $title)).'</div>';
			$output .= '<div><h6 class="center">'.$title.'</h6></div></a>';
			$output .= '<p class="center small"><i>'.$shortDesc1.'</i><br><i>'.$shortDesc2.'</i></p>';
			$output .= '<div class="center config"><a class="button golden" href="'.$bottom_box1_link.'"><i>'.$options[$shortname.'_productpage_bottombox1_button'].'</i></a></div>';
		$output .= '</div>';
		$output .= renderProductBottomBoxes($bottom_box2_link);  
	$output .= '</div>';
	return $output;
}
function renderProductBottomBoxes($bottom_box2_link='#'){
	$options 	= BipMobileThemeOptions::getOptions();
	$shortname 	= BipMobileThemeOptions::cfg('shortname');	
	
	$output = '<div class="span3">';
		$output .= '<a href="#"><div class="center image"><img src="'.WPTHEME_URL.'/assets/img/cartLarge.png'.'"></div>';
		$output .= '<div><h6 class="center">'.$options[$shortname.'_productpage_bottombox2_title'].'</h6></div></a>';
		$output .= '<p class="center small"><i>'.$options[$shortname.'_productpage_bottombox2_desc'].'</i></p>';
		$output .= '<div class="center config"><a class="button lightBlack" href="'.$bottom_box2_link.'"><i>'.$options[$shortname.'_productpage_bottombox2_button'].'</i></a></div>';
	$output .= '</div>';
	$output .= '<div class="span3">';
		$output .= '<a href="'.WPTHEME_URL.'/../../"><div class="center image"><img src="'.WPTHEME_URL.'/assets/img/searchLarge.png'.'"></div>';
		$output .= '<div><h6 class="center">'.$options[$shortname.'_productpage_bottombox3_title'].'</h6></div></a>';
		$output .= '<p class="center small"><i>'.$options[$shortname.'_productpage_bottombox3_desc'].'</i></p>';
		$output .= '<div class="center search">
						<div class="input-append">
							<input class="span2" id="appendedInput" type="text" placeholder="'.$options[$shortname.'_productpage_bottombox3_button'].'">
							<span class="add-on"></span>
					</div></div>';
	$output .= '</div>';
	$output .= '<div class="span3">';
		$output .= '<div class="center image"><img src="'.WPTHEME_URL.'/assets/img/phoneLarge.png'.'"></div>';
		$output .= '<div><h6 class="center">'.$options[$shortname.'_productpage_bottombox4_title'].'</h6></div>';
		$output .= '<p class="center small">'.$options[$shortname.'_productpage_bottombox4_desc'].'</p>';
		$output .= '<div class="center large phone"><span><i>'.$options[$shortname.'_productpage_bottombox4_button'].'</i></span></div>';
	$output .= '</div>';
	return $output;	
}
