<?php
$categories_tree = get_categories_deep();// $categories_tree[%id%] = array ('values'=>/category names/, 'class'=> /level class names/);
$items			 = getAllItems(); 
//var_dump($items);
$categories_tree['values'] = array(0=>'All Categories') + $categories_tree['values'];
$categories_tree['class'] = array(0=>'level-none') + $categories_tree['class'];

$value_sets = array (
	'YES_NO' => array(
		'values'=>array(
			'yes'=>__('Yes',BIP_DOMAIN),
			'no' =>__('No',BIP_DOMAIN),
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	
	'LEFT_RIGHT_NONE' => array(
		'values'=>array(
			'none' =>__('None',BIP_DOMAIN),
			'left' =>__('Left',BIP_DOMAIN),
			'right' =>__('Right',BIP_DOMAIN),
		),
		'alt'=>array(
			'none' =>__('None',BIP_DOMAIN),
			'left' =>__('Left',BIP_DOMAIN),
			'right' =>__('Right',BIP_DOMAIN),
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	
	'LEFT_RIGHT' => array(
		'values'=>array(
			'left'=>__('Left Side',BIP_DOMAIN),
			'right' =>__('Right Side',BIP_DOMAIN),
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'NUMBER' => array(
		'values'=>'',
		'input_type' => 'text',
		'validate' => 'float'
	),	
	'TEXT' => array(
		'values'=>'',
		'input_type' => 'text',
		'validate' => 'string'
	),
	'FILE' => array(
		'values'=>'',
		'input_type' => 'file',
		'validate' => 'string'
	),
	'SLIDERS' => array(
		'values'=>array(
			'full_screen' =>__('Full Screen',BIP_DOMAIN),
			'regular' =>__('Regular',BIP_DOMAIN),
			'full_width' =>__('Regular with full width',BIP_DOMAIN),
		),
		'alt'=>array(
			'full_screen' =>__('Full Screen',BIP_DOMAIN),
			'regular' =>__('Regular',BIP_DOMAIN),
			'full_width' =>__('Regular with full width',BIP_DOMAIN),
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'SLIDES_TYPE' => array(
		'values'	=> $categories_tree['values'],
		'class'		=> $categories_tree['class'],
		/*'alt'=>array(
			'full_screen' =>__('Full Screen',BIP_DOMAIN),
			'regular' =>__('Regular',BIP_DOMAIN),
			'full_width' =>__('Regular with full width',BIP_DOMAIN),
		),*/
		'input_type' => 'select',
		/*'multiselect' => 1,*/
		'validate' => 'string'
	),
	'HomePagePosts' => array(
		'values'=>array(
			'full_screen' =>__('Category Options',BIP_DOMAIN),
			'regular' =>__('Most Recent Posts',BIP_DOMAIN),			
		),
		'alt'=>array(
			'full_screen' =>__('Category Options',BIP_DOMAIN),
			'regular' =>__('Most Recent Posts',BIP_DOMAIN),			
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'PAGE_LAYOUT' => array(
		'values'=>array(
			'full_screen' =>__('Full_screen',BIP_DOMAIN),
			'regular' =>__('Regular',BIP_DOMAIN),			
		),
		'alt'=>array(
			'full_screen' =>__('full_screen',BIP_DOMAIN),
			'regular' =>__('regular',BIP_DOMAIN),			
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	
	'SIDEBARS' => array(
		'values'=>array(
			'no_sidebars' =>'sidebars_no_sidebars.gif',
			'right_sidebar'=>'sidebars_right_sidebar.gif',
			'left_sidebar' =>'sidebars_left_sidebar.gif',
			'left_right_sidebars' =>'sidebars_left_right_sidebars.gif',
			'2_left_sidebars' =>'sidebars_2_left_sidebars.gif',
			'2_right_sidebars' =>'sidebars_2_right_sidebars.gif',
			'4_left_sidebars' =>'sidebars_4_left_sidebars.gif',
			'4_right_sidebars' =>'sidebars_4_right_sidebars.gif',
		),
		'alt'=>array(
			'no_sidebars' =>__('No sidebars',BIP_DOMAIN),
			'right_sidebar'=>__('Right sidebar',BIP_DOMAIN),
			'left_sidebar' =>__('Left sidebar',BIP_DOMAIN),
			'left_right_sidebars' =>__('Left and right sidebars',BIP_DOMAIN),
			'2_left_sidebars' =>__('Two sidebars at the left',BIP_DOMAIN),
			'2_right_sidebars' =>__('Two sidebars at the right',BIP_DOMAIN),
			'4_left_sidebars' =>__('Three or four sidebars at the left',BIP_DOMAIN),
			'4_right_sidebars' =>__('Three or four sidebars at the right',BIP_DOMAIN),
		),
		'input_type' => 'radio_image',
		'validate' => 'string'
	),
	'FOOTERS' => array(
		'values'=>array(
			'1' =>'footer_1.gif',
			'2'	=>'footer_2.gif',
			'3' =>'footer_3.gif',
			'4' =>'footer_4.gif',
		),
		'alt'=>array(
			'1' =>__('One column in the footer',BIP_DOMAIN),
			'2' =>__('Two columns in the footer',BIP_DOMAIN),
			'3' =>__('Three columns in the footer',BIP_DOMAIN),
			'4' =>__('Four columns in the footer',BIP_DOMAIN),
		),
		'input_type' => 'radio_image',
		'validate' => 'string'
	),
	'WIDTH_UOM' => array(
		'values'=>array(
			'px'=>'px',
			'%' =>'%',
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'FONT_FAMILY' =>	array(
		'values'=>array(
			'Arial, Helvetica, sans-serif'						=>'Arial, Helvetica, sans-serif',
			'Arial Black, Gadget, sans-serif' 					=>'Arial Black, Gadget, sans-serif',
			'Comic Sans MS, cursive' 							=>'Comic Sans MS, cursive',
			'Courier New, Courier, monospace' 					=>'Courier New, Courier, monospace',
			'Georgia, serif'									=>'Georgia, serif',
			'Impact, Charcoal, sans-serif' 						=>'Impact, Charcoal, sans-serif',
			'Lucida Console, Monaco, monospace' 				=>'Lucida Console, Monaco, monospace',
			'Lucida Sans Unicode, Lucida Grande, sans-serif' 	=>'Lucida Sans, Lucida Grande, sans-serif',
			'Palatino Linotype, Book Antiqua, Palatino, serif' 	=>'Palatino Linotype, Book Antiqua, serif',
			'Tahoma, Geneva, sans-serif' 						=>'Tahoma, Geneva, sans-serif',
			'Times New Roman, Times, serif' 					=>'Times New Roman, Times, serif',
			'Trebuchet MS, Helvetica, sans-serif' 				=>'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif' 						=>'Verdana, Geneva, sans-serif',
			'MS Sans Serif, Geneva, sans-serif' 				=>'MS Sans Serif, Geneva, sans-serif',
		),
		'styles'=>array(
			'Arial, Helvetica, sans-serif'						=>'font-size:12px; font-family: Arial, Helvetica, sans-serif',
			'Arial Black, Gadget, sans-serif' 					=>'font-size:12px; font-family: Arial Black, Gadget, sans-serif',
			'Comic Sans MS, cursive' 							=>'font-size:12px; font-family: Comic Sans MS, Comic Sans MS, cursive',
			'Courier New, Courier, monospace' 					=>'font-size:12px; font-family: Courier New, Courier, monospace',
			'Georgia, serif' 									=>'font-size:12px; font-family: Georgia, serif',
			'Impact, Charcoal, sans-serif' 						=>'font-size:12px; font-family: Impact, Charcoal, sans-serif',
			'Lucida Console, Monaco, monospace' 				=>'font-size:11px; font-family: Lucida Console, Monaco, monospace',
			'Lucida Sans Unicode, Lucida Grande, sans-serif' 	=>'font-size:11px; font-family: Lucida Sans Unicode, Lucida Grande, sans-serif',
			'Palatino Linotype, Book Antiqua, Palatino, serif' 	=>'font-size:12px; font-family: Palatino Linotype, Book Antiqua, Palatino, serif',
			'Tahoma, Geneva, sans-serif' 						=>'font-size:12px; font-family: Tahoma, Geneva, sans-serif',
			'Times New Roman, Times, serif' 					=>'font-size:12px; font-family: Times New Roman, Times, serif',
			'Trebuchet MS, Helvetica, sans-serif' 				=>'font-size:12px; font-family: Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif' 						=>'font-size:12px; font-family: Verdana, Geneva, sans-serif',
			'MS Sans Serif, Geneva, sans-serif' 				=>'font-size:12px; font-family: MS Sans Serif, Geneva, sans-serif',
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'FONT_SIZE_UOM' => array(
		'values'=>array(
			'px'=>'px',
			'em' =>'em',
			'pt' =>'pt',
			'%' =>'%',
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'FONT_WEIGHT' => array(
		'values'=>array(
			'normal'=>'normal',
			'bold' =>'bold',
		),
		'styles'=>array(
			'normal'=>'font-weight: normal',
			'bold' =>'font-weight: bold',
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	
	'TEXT_DECORATION' => array(
		'values'=>array(
			'none'=>'none',
			'underline' =>'underline',
			'overline' =>'overline',
			'line-through' =>'line-through',
			'blink' =>'blink',
		),
		'input_type' => 'select',
		'validate' => 'string'
	),

	'COLOR' => array(
		'input_type' => 'color',
		'validate' => 'string'
	),
	
	'BORDER_STYLE' => array(
		'values'=>array(
			'none'=>'none',
			'hidden' =>'hidden',
			'dotted' =>'dotted',
			'dashed' =>'dashed',
			'solid' =>'solid',
			'double' =>'double',
			'groove' =>'groove',
			'ridge' =>'ridge',
			'inset' =>'inset',
			'outset' =>'outset',
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	
	'TEXTAREA' => array(
		'input_type' => 'textarea',
		'validate' => 'string'
	),
	
	'SHOW_IN_COLUMN' => array(
		'values'=>array(
			'latest_posts'	=> __('Latest Posts',BIP_DOMAIN),
			'selected_posts' => __('Selected Posts Only',BIP_DOMAIN),
			'selected_pages' => __('Selected Pages Only',BIP_DOMAIN)
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'CATEGORY_SELECT' => array(
		'values'	=> $categories_tree['values'],
		'class'		=> $categories_tree['class'],
		'input_type' => 'select',
		'validate' => 'string'
	),
	'ITEMS_SELECT' => array(
		'values'	=> $items['values'],
		'input_type' => 'select',
		'multiselect' => 1,
		'validate' => 'string'
	),
	'SOCIAL' => array(
		'values'=>array(
			'instagram' =>'Instagram',
			'tumblr' =>'Tumblr',
			'facebook' =>'Facebook',
			'RSS' =>'RSS',
			'twitter' =>'Twitter',
			'google' =>'Google',
		),
		'input_type' => 'checkbox',
		'multiselect' => 1,
		'validate' => 'string'
	),
	
	'SOCIAL_' => array(
		'values'=>array(
			'green-jelly-icons' =>__('Green jelly',BIP_DOMAIN),
			'grey'				=>__('Grey',BIP_DOMAIN),
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
	'PAGE_TYPES' => array(
		'values'=>array(
			'index' =>'Index page',
			'category' =>'Category',
			'tag' =>'Tag',
			'archive' =>'Archive',
			'search' =>'Search results',
			'author' =>'Author page',
		),
		'input_type' => 'checkbox',
		'multiselect' => 1,
		'validate' => 'string'
	),
	'REGULAR_POST_THUMBNAIL_POSITION' => array(
		'values'=>array(
			'at_the_left_under_post_title'	=>__('Under post title, at the left of excerpt',BIP_DOMAIN),
			'at_the_left_of_title' 			=>__('At the left of post title and excerpt',BIP_DOMAIN),
		),
		'input_type' => 'select',
		'validate' => 'string'
	),
);
//echo"####"; print_r($value_sets['CATEGORY_SELECT']);
