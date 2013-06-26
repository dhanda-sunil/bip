<?php
/*-----------------------------------------------------------------------------------*/
/* Theme Core Files Includes
/*-----------------------------------------------------------------------------------*/
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
			$categories = array_merge_recursive2  ($categories, $child_categories);
			//echo 'after merge = ';print_r($categories );
		}
	}
	return $categories;
}
function getAllItems(){
	$args = array(
		 'post_type' 	=> array('product', 'tariff', 'option'),
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
function getProducts($limit=''){
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
function getTariffs($limit=''){
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
function renderProductBottomBoxes(){
	$options 	= BipMobileThemeOptions::getOptions();
	$shortname 	= BipMobileThemeOptions::cfg('shortname');	
	
	$output = '<div class="span3">';
		$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/cartLarge.png'.'"></div>';
		$output .= '<div><h6 class="center">'.$options[$shortname.'_productpage_bottombox1_title'].'</h6></div>';
		$output .= '<p class="center small"><i>'.$options[$shortname.'_productpage_bottombox1_desc'].'</i></p>';
		$output .= '<div class="center config"><button class="lightBlack"><i>'.$options[$shortname.'_productpage_bottombox1_button'].'</i></button></p></div>';
	$output .= '</div>';
	$output .= '<div class="span3">';
		$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/searchLarge.png'.'"></div>';
		$output .= '<div><h6 class="center">'.$options[$shortname.'_productpage_bottombox2_title'].'</h6></div>';
		$output .= '<p class="center small"><i>'.$options[$shortname.'_productpage_bottombox2_desc'].'</i></p>';
		$output .= '<div class="center search">
						<div class="input-append">
							<input class="span2" id="appendedInput" type="text" placeholder="'.$options[$shortname.'_productpage_bottombox2_button'].'">
							<span class="add-on"></span>
					</div></div>';
	$output .= '</div>';
	$output .= '<div class="span3">';
		$output .= '<div class="center image"><img src="'.get_stylesheet_directory_uri().'/assets/img/phoneLarge.png'.'"></div>';
		$output .= '<div><h6 class="center">'.$options[$shortname.'_productpage_bottombox3_title'].'</h6></div>';
		$output .= '<p class="center large">'.$options[$shortname.'_productpage_bottombox2_desc'].'</p>';
		$output .= '<div class="center large phone"><span><i>'.$options[$shortname.'_productpage_bottombox3_button'].'</i></spa></div>';
	$output .= '</div>';
	return $output;	
}