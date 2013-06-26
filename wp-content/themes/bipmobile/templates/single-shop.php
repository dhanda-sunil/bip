<!-- Shop Page -->
<div>
    <div id="shop-detail" class="row">
    <?php 
    $output = '';
	$id 	= get_the_ID();
	$meta 	= get_post_meta($id, '_' . BipCore::prefix('shop'), TRUE);
	$link 	= is_array($meta) && isset($meta['logoLink']) && !empty($meta['logoLink']) ? $meta['logoLink'] : '' ;
	$name 	= is_array($meta) && isset($meta['shopName']) && !empty($meta['shopName']) ? $meta['shopName'] : '' ;
	$address 	= is_array($meta) && isset($meta['address']) && !empty($meta['address']) ? $meta['address'] : '' ;
	
	$image = get_the_post_thumbnail($id, BipCore::IMAGE_SIZE_SHOP_ITEM , array('title' => get_the_title(), 'alt' => get_the_title()));
	$title	= strtoupper(get_the_title());
	$output .= '<div class="span12"><h1 class="shop_head">'.$title.'</h1></div>';
	$output .= '<div class="span3 map">'.render_shop_map($title.' '.$meta['address'].' Italy', array('w'=>220, 'h'=>313)).'</div>';
	$output .= '<div class="span6">'.(($image)?$image:'<img src="'.WPTHEME_URL.'/assets/img/shop492x335.jpg">').'</div>';
	$output .= '<div class="span3 shop-info">';
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<h4 class="slim">'.$name.'</h4>';
		$output .= '<div>'.$address.'</div>';
		$output .= '<div class="row-fluid phone"><div class="span5 lab">Telefono</div><div class="span7 semibold">'.$meta['phone'].'</div></div>';
		$output .= '<div class="time"><div class="lab">Orari</div><div>'.renderOpeningHours($meta['opening']).'</div></div>';
	$output .= '</div>';
    $output .= '<div class="clear"></div>';
    $output .= bip_corner();
	echo $output;
	?>
    </div>
</div>

