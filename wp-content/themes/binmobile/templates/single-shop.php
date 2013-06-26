<div>
    <div id="shop-detail" class="row">
    <!-- Shop Page -->
    <?php 
    $output = '';
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
echo $output;?>
