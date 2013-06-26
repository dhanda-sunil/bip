<?php
/*
Plugin Name: Wordpress Dynamic Site Url
Plugin URI: http://Tiddu.com
Description: A Simple wordpress plugin which enable the user to login in wordress site with Google/Twitter/OpenId/LinkedIn/Facebook accounts with one click.
Version: 0.1
Author: Tiddu.com
Author URI: http://Tiddu.com
License:GPL2
*/

function getSiteUrl($url){
	if(is_admin()){
		return $url;
	}
	$urlParts = explode('/', $url, 4);
	$http    = $urlParts[0];
	if(isset($urlParts[3])){
		$home   = '/'.$urlParts[3];
	}else{
		$home	= '';
	}
	return $http.'//'.$_SERVER['HTTP_HOST'].$home;
}
function FilterMobile_siteurl($url){
	return getSiteUrl( $url);
}
function FilterMobile_home($url){ 
	return getSiteUrl( $url);
}

add_filter('option_home', 'FilterMobile_home', 10000); 
add_filter('option_siteurl', 'FilterMobile_siteurl', 10000);

/*
// MobileTheme hack
foreach ( (array) get_option( 'active_plugins', array() )  as $plugin ){
 if(strpos($plugin, 'p-site-url.php')>0){
  include_once( 'wp-content/plugins/wp-site-url.php' );
  break;
 }
}

// Define constants that rely on the API to obtain the default value.
// Define must-use plugin directory constants, which may be overridden in the sunrise.php drop-in.
wp_plugin_directory_constants( );*/
?>