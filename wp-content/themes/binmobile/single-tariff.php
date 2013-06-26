<?php get_header();?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post();$id = get_the_ID()?>
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div class="container">
        	<div class="widget-area">
            <?php
			if (has_post_thumbnail($id)) {
				$title 		= get_the_title();
				$meta 		= get_post_meta($id, '_' . BipCore::prefix('tariff'), TRUE);
				$link 		= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
				$image_size = is_array($meta) && isset($meta['image_size']) && !empty($meta['image_size']) ? $meta['image_size'] : 'full' ;
				
				$image = get_the_post_thumbnail($id, $image_size , array('title' => $title, 'alt' => $title));
				
				$shortDesc1	= is_array($meta) && isset($meta['short-des-1']) && !empty($meta['short-des-1']) ? $meta['short-des-1'] : '' ;
				$shortDesc2	= is_array($meta) && isset($meta['short-des-2']) && !empty($meta['short-des-2']) ? $meta['short-des-2'] : '' ;
				$description= is_array($meta) && isset($meta['description']) && !empty($meta['description']) ? $meta['description'] : '' ;
				$video1		= is_array($meta) && isset($meta['video_1']) && !empty($meta['video_1']) ? $meta['video_1'] : '' ;
				$video2		= is_array($meta) && isset($meta['video_2']) && !empty($meta['video_2']) ? $meta['video_2'] : '' ;	
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
				
				$output .= '<div class="row hr_shadow_down">';
				$output .= '<div class="span6">';
				if (!empty($link)){
					$output .= '<a href="' . $link . '" title="' . $title . '">';
					$output .= '<div><h1 class="right larger">'.$title.'</h1></div>';
					$output .= '<div><h3 class="right slim">'.$shortDesc1.'</h3></div>';
					$output .= '<div><h3 class="right">'.$shortDesc2.'</h3></div></a>';
				}else{
					$output .= '<a href="' . get_permalink($id) . '" title="' . $title . '">';
					$output .= '<div><h1 class="right larger">'.$title.'</h1></div>';
					$output .= '<div><h3 class="right slim">'.$shortDesc1.'</h3></div>';
					$output .= '<div><h3 class="right">'.$shortDesc2.'</h3></div></a>';
				}
				$output .= '<div class="right">'.$video1.'</div><div class="right">'.$video2.'</div>';
				$output .= '</div>';
				$output .= '<div class="span6">';
				if (!empty($link)) {
					$output .= '<div>'.$meta['short-desc'].'</div><a href="' . $link . '" title="' . $title . '">' . $image . '</a>';
				} else {
					$output .= '<a href="' . get_permalink($id) . '" title="' . $title . '">'.$image.'</a>';
				}
				$output .= '</div></div>';
				
				/*Part1*/
				if (!empty($part1Title)) {
					$output .= '<div class="row hr_shadow_up_down">';
						$output .= '<div class="span8 product-info">';
							$output .= '<h3 class="large">'.$part1Title.'</h3>';
							$output .= '<h6>'.$part1SubTitle.'</h6>';
							$output .= '<p class="small">'.$part1Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span4">';
						if (!empty($part1Image)) {
							$output .= '<img src="' . $part1Image . '" alt="'.esc_attr($part1Title).'"/>';
						}
						$output .= '</div>';
					$output .= '</div>';
						/*Part2*/
					if (!empty($part2Title)) {
					$output .= '<div class="row">';
						$output .= '<div class="span4">';
						if (!empty($part2Image)) {
							$output .= '<img src="' . $part2Image . '" alt="' . esc_attr($part2Title) . '"/>';
						}
						$output .= '</div>';
						$output .= '<div class="span8 product-info">';
						$output .= '<h3 class=" large">'.$part2Title.'</h3>';
						$output .= '<h6 class="">'.$part2SubTitle.'</h6>';
						$output .= '<p class=" small">'.$part2Desc.'</p>';
						$output .= '</div>';
					}
					$output .= '</div>';
				}
				
				/*Part3*/
				if (!empty($part3Title)) {
					$output .= '<div class="row hr_shadow_up_down">';
						$output .= '<div class="span8 product-info">';
							$output .= '<h3 class=" large">'.$part3Title.'</h3>';
							$output .= '<h6 class="">'.$part3SubTitle.'</h6>';
							$output .= '<p class=" small">'.$part3Desc.'</p>';
						$output .= '</div>';
						$output .= '<div class="span4">';
						if (!empty($part3Image)) {
							$output .= '<img src="' . $part3Image . '" alt="' . esc_attr($part3Title) . '"/></a>';
						}
						$output .= '</div>';
					$output .= '</div>';
					/*Part4*/
					if (!empty($part4Title)) {
					$output .= '<div class="row">';
						$output .= '<div class="span4">';	
						if (!empty($part4Image)) {
							$output .= '<img src="' . $part4Image . '" alt="' . $part4Title . '"/>';
						}
						$output .= '</div>';
						$output .= '<div class="span8 product-info">';
							$output .= '<h3 class=" large">'.$part4Title.'</h3>';
							$output .= '<h6 class="">'.$part4SubTitle.'</h6>';
							$output .= '<p class=" small">'.$part4Desc.'</p>';	
						$output .= '</div>';
					}
					$output .= '</div>';
				}
			}
		 
		$output .= '<div class="row hr_shadow_down lowerSection">';
			$output .= '<div class="span3">';
				$output .= '<div class="center image">'.get_the_post_thumbnail($id, array(200) , array('title' => $title, 'alt' => $title)).'</div>';
				$output .= '<div><h6 class="center">'.$title.'</h6></div>';
				$output .= '<p class="center small"><i>'.$description.'</i></p>';
				$output .= '<div class="center config"><button class="golden"><i>'.$options[$shortname.'_productpage_bottombox1_button'].'</i></button></p></div>';
			$output .= '</div>';
			$output .= renderProductBottomBoxes();  
		$output .= '</div>';
			echo  $output;?>
        </div>
        <?php comment_form(); ?>
        <?php comments_template(); ?>
        <?php wp_link_pages(); ?>
    </div>
    <?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<div class="clear"></div>
<?php get_footer(); ?>