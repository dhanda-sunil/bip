<?php
//include (str_replace('//','/',dirname(__FILE__)).'/valuesets.php');

$themename = "Bip Mobile";
$shortname = "op_un";
$theme_url=get_stylesheet_directory_uri()."/assets/img/";
//$options_name = $shortname . '_options'

/*
Recordset:
	title 			//short option name
	category		//category / tab where to display the option
	std				//default value. May be an array
	description		//long description. May contain html tags
	valueset		//name of value set. may not be null. May be an array
	width			//width of html input element. may be null. May be an array
	inherrit		//describes from what options the value can be inherited.
*/
$op_un_admin_options = array (
	$shortname.'_current_tab' => array(
		'title' 		=> 'Current Tab',
		'category'		=> '',
		'std'			=> 'About',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 0,
	),
	$shortname.'_homepage_items' => array(
		'title' 		=> 'Home Products category',
		'category'		=> 'Homepage',
		'std'			=> '0',
		'description'	=> 'Slected Products will be showen on homepage.',
		'valueset'		=> 'ITEMS_SELECT',
		'width'			=> 0,
	),
	$shortname.'_homepage_item_shuffle' => array(
		'title' 		=> 'Shuffle Homepage Items',
		'category'		=> 'Homepage',
		'std'			=> 'yes',
		'description'	=> '',
		'valueset'		=> 'YES_NO',
		'width'			=> 0,
	),
	$shortname.'_productpage_bottombox1_title' => array(
		'title' 		=> 'Bottom Box 1 Title',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 50,
	),
	$shortname.'_productpage_bottombox1_desc' => array(
		'title' 		=> 'Bottom Box 1 Description',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXTAREA',
		'width'			=> 0,
	),
	$shortname.'_productpage_bottombox1_button' => array(
		'title' 		=> 'Bottom Box 1 Button Text',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 0,
	),
	$shortname.'_productpage_bottombox2_title' => array(
		'title' 		=> 'Bottom Box 2 Title',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 50,
	),
	$shortname.'_productpage_bottombox2_desc' => array(
		'title' 		=> 'Bottom Box 2 Description',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXTAREA',
		'width'			=> 0,
	),
	$shortname.'_productpage_bottombox2_button' => array(
		'title' 		=> 'Bottom Box 2 Button Text',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 0,
	),
	$shortname.'_productpage_bottombox3_title' => array(
		'title' 		=> 'Bottom Box 3 Title',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 50,
	),
	$shortname.'_productpage_bottombox3_desc' => array(
		'title' 		=> 'Bottom Box 3 Description',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXTAREA',
		'width'			=> 0,
	),
	$shortname.'_productpage_bottombox3_button' => array(
		'title' 		=> 'Bottom Box 3 Button Text',
		'category'		=> 'ProductPage', 
		'std'			=> '',
		'description'	=> '',
		'valueset'		=> 'TEXT',
		'width'			=> 0,
	),
	$shortname . '_footer_bg_color' => array(
		'title' 		=> 'Footer Background Color',
		'category'		=> 'Footer',
		'std'			=> array('background'=>'#212121'),
		'description'	=> '',
		'valueset'		=> array('background'=>'COLOR',),
		'width'			=> 8,
	),	
	
	$shortname . '_footer_postion' => array(
		'title' 		=> 'Footer Position',
		'category'		=> 'Footer',
		'std'			=> 'none',
		'description'	=> '',
		'valueset'		=> 'LEFT_RIGHT_NONE',
		'width'			=> 0,
	),	
	
	$shortname . '_backgroud_page_layout' => array(
		'title' 		=> 'Page Layout',
		'id'			=> $shortname . '_backgroud_page_layout',
		'category'		=> 'Background',
		'std'			=> 'Full screen',
		'description'	=> 'If regular, upload background photo.',
		'valueset'		=> 'PAGE_LAYOUT',
		'width'			=> 0,
	),
	
	$shortname . '_backgroud_page_photo' => array(
		'title' 		=> 'Background photo',
		'id'			=> $shortname . '_backgroud_page_photo',
		'category'		=> 'Background',
		'std'			=> 'regular',
		'description'	=> '',
		'valueset'		=> 'FILE',
		'width'			=> 0,
	),
	$shortname . '_gen_favicon' => array(
		'title' 		=> 'Custom Favicon',
		'id'			=> $shortname . '_gen_favicon',
		'category'		=> 'General',
		'std'			=>'favicon.ico',
		'description'	=> 'Custom Favicon',
		'valueset'		=> 'FILE',
		'width'			=> 0,
	),
	
	$shortname . '_gen_mainlogo' => array(
		'title' 		=> 'Custom Logo',
		'id'			=> $shortname . '_gen_mainlogo',
		'category'		=> 'General',
		'std'			=> 'untouchable-logo325x75.png',
		'description'	=> 'Custom Logo',
		'valueset'		=> 'FILE',
		'width'			=> 0,
	),
	
	$shortname . '_gen_footerlogo' => array(
		'title' 		=> 'Footer Logo',
		'id'			=> $shortname . '_gen_footerlogo',
		'category'		=> 'General',
		'std'			=> 'untouchable-logo325x75.png',
		'description'	=> 'Footer Logo',
		'valueset'		=> 'FILE',
		'width'			=> 0,
	),
	
	$shortname . '_gen_loginlogo' => array(
		'title' 		=> 'Login Logo',
		'id'			=> $shortname . '_gen_loginlogo',
		'category'		=> 'General',
		'std'			=>'untouchable-logo325x75.png',
		'description'	=> 'Login Logo',
		'valueset'		=> 'FILE',
		'width'			=>0,
	),
	
	$shortname . '_tracking_code' => array(
		'title' 		=> 'Tracking Code',
		'id'			=> $shortname . '_tracking_code',
		'category'		=> 'General',
		'std'			=> '',
		'description'	=> 'Paste here your Analytics (Google or other) tracking code',
		'valueset'		=> 'TEXTAREA',
		'width'			=> 0,
	),
	
	$shortname . '_slider' => array(
		'title' 		=> 'Slider',
		'id'			=> $shortname . '_slider',
		'category'		=> 'General',
		'std'			=> 'regular',
		'description'	=> 'Slider for front page',
		'valueset'		=> 'SLIDERS',
		'width'			=> 0,
	),	
	$shortname . '_header_bg_color' => array(
		'title' 		=> 'Header Background Color',
		'id'			=> $shortname . '_header_bg_color',
		'category'		=> 'Header',
		'std'			=> array('background'=>'#FFFFFF'),
		'description'	=> '',
		'valueset'		=> array('background'=>'COLOR',),
		'width'			=> 8,
	),
	$shortname . '_typography_body' => array(
		'title' 		=> 'Body Font Fonts',
		'category'		=> 'Typography',
		'std'			=> array ('family'=>'Trebuchet MS, Helvetica, sans-serif', 'weight'=>'normal','size'=>'90', 'uom'=>'%'),
		'description'	=> '',
		'valueset'		=> array ('family'=>'FONT_FAMILY', 'weight'=>'FONT_WEIGHT','size'=>'NUMBER', 'uom'=>'FONT_SIZE_UOM'),		
		'width'			=> 3,
	),
	
	$shortname . '_typography_heading' => array(
		'title' 		=> 'Heading Fonts',
		'category'		=> 'Typography',
		'std'			=> array ('family'=>'Trebuchet MS, Helvetica, sans-serif', 'weight'=>'normal','size'=>'90', 'uom'=>'%'),
		'description'	=> '',
		'valueset'		=> array ('family'=>'FONT_FAMILY', 'weight'=>'FONT_WEIGHT','size'=>'NUMBER', 'uom'=>'FONT_SIZE_UOM'),		
		'width'			=> 3,
	),
	
	$shortname . '_typography_footer' => array(
		'title' 		=> 'Footer Fonts',
		'category'		=> 'Typography',
		'std'			=> array ('family'=>'Trebuchet MS, Helvetica, sans-serif', 'weight'=>'normal','size'=>'90', 'uom'=>'%'),
		'description'	=> '',
		'valueset'		=> array ('family'=>'FONT_FAMILY', 'weight'=>'FONT_WEIGHT','size'=>'NUMBER', 'uom'=>'FONT_SIZE_UOM'),		
		'width'			=> 3,
	),
);
foreach ($op_un_admin_options as $k=>$v)
{
	$op_un_admin_options[$k]['id'] = $k;
}
