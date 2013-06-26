<?php
$a = BipMobileThemeOptions::countOptions();
$template_url =  get_bloginfo('template_url');
$options_categories = array (
	'About' => array (
		'display_name' => __('About', BIP_DOMAIN),
		'description' =>__('<h1>Bip Mobile Theme Options</h1>
		The Bip Mobile Theme is a clear and very lightweight theme with ample opportunities of customization. 
		As for now the theme contains ${option_count[\'full-fledged\']} full-fledged options that consist of ${option_count[\'sub-options\']} sub-options.
		Here are some tips that can help you to understend them better.
		<h2>Translate the theme</h2>
		The theme is translation ready now! You can translate it and your translation will be available in the next theme release!<br/>
		
		<h2>Getting help</h2>
		
		To get help on a theme option just click it\'s title:<br/><br/>
		<img src="${template_url}/options/img/help/header_decs_option.gif"/>
		
		<h2>Inheritance</h2>
		
		The unique feature of the option page is the options inheritance. 
		With this feature, options can be set to their own values or be inherited from another "parent" option.
		Thanks to the inheritance, you can change color scheme (e.g. green to blue) by changing only three options.
		<br/>
		The following picture explains how it works<br/><br/>
		<img src="${template_url}/options/img/help/inherited_option.gif"/>
		<br/><br/>
		Note that you can create chains of inherited options.<br/>'
, BIP_DOMAIN)
/*		<h2>Help needed!</h2>
		If you are a native English speaker and you see mistakes of any kind in option titles and/or descriptions, please let me know of them.
		The best help is to edit the files <code>option_descriptions.php</code> and <code>options_categories.php</code>.
		I will appreciate your help very much.
*/
	),
	'General' => array (
		'display_name' => __('General', BIP_DOMAIN),
		'description' =>'',
	),
	'Homepage' => array (
		'display_name' => __('Homepage', BIP_DOMAIN),
		'description' =>'',
	),
	'ProductPage' => array (
		'display_name' => __('Product Page', BIP_DOMAIN),
		'description' =>'',
	),
	'Header' => array (
		'display_name' => __('Header', BIP_DOMAIN),
		'description' =>'',
	),
	'Footer' => array (
		'display_name' => __('Footer', BIP_DOMAIN),
		'description' =>'',
	),
	
	
	/*'Navigation' => array (
		'display_name' => __('Navigation', BIP_DOMAIN),
		'description' =>'',
	),
	'Sidebars' => array (
		'display_name' => __('Sidebars', BIP_DOMAIN),
		'description' =>'',
	),*/
	/*'Posts' => array (
		'display_name' => __('Posts', BIP_DOMAIN),
		'description' =>'',
	),*/
	
	/*'Post List' => array (
		'display_name' => __('Background', BIP_DOMAIN),
		'description' =>'',
	),*/
	'Background' => array (
		'display_name' => __('Background', BIP_DOMAIN),
		'description' =>'',
	),
	'Typography' => array (
		'display_name' => __('Typography', BIP_DOMAIN),
		'description' =>''
	),
	/*'Social' => array (
		'display_name' => __('Social', BIP_DOMAIN),
		'description' =>'',
	),*/
	/*'Headings' => array (
		'display_name' => __('Headings', BIP_DOMAIN),
		'description' =>'',
	),
	'Comments' => array (
		'display_name' => __('Comments', BIP_DOMAIN),
		'description' =>'',
	),
	'Images' => array (
		'display_name' => __('Images', BIP_DOMAIN),
		'description' =>'',
	),
	'Pagination' => array (
		'display_name' => __('Pagination', BIP_DOMAIN),
		'description' =>'',
	),
	'SEO' => array (
		'display_name' => __('SEO', BIP_DOMAIN),
		'description' =>'',
	),*/
);