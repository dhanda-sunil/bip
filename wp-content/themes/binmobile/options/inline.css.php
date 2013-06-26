<?php
//header('Content-type: text/css');

$options = & BipMobileThemeOptions::getOptions();
$shortname = & BipMobileThemeOptions::cfg('shortname');
/*$layout = BipMobileThemeOptions::getLayoutCSS();
$sidebars = & BipMobileThemeOptions::getValueSets('SIDEBARS');
if (isset($sidebars ['values'][$layout])) include (TEMPLATEPATH . '/layouts/'.  $layout.'.css');*/

function getInherited($option_name, $sub_option_key){
	static $shortname = '';
	if (! $shortname) $shortname = BipMobileThemeOptions::cfg('shortname');
	$inherided = BipMobileThemeOptions::getInheritedOption($shortname . $option_name,$sub_option_key);
	return $inherided['value'];
}
function echoInherited($option_name, $sub_option_key){
	static $shortname = '';
	if (! $shortname) $shortname = BipMobileThemeOptions::cfg('shortname');
	$inherided = BipMobileThemeOptions::getInherited($shortname . $option_name,$sub_option_key);
	echo $inherided;
}
?>