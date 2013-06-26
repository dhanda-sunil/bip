<?php
/*
Plugin Name: Apple Icons and Loading Screen
Plugin URI: http://developerextensions.com
Description: Simply add the Icons and loading screens for various versions of iPhone and iPad.
Version: 1.0
Author: Surinder Singh and Sunil Kumar
Author URI: http://developerextensions.com
License: GPL2
*/
//for admin dashboard add_dashboard_page();

class deAppleIcons {
	var $browserName;
	var $nonceName = 'deAppleIcons';
	var $menuSlug	= 'deAppleIcons';
	function deAppleIcons(){
		if (is_admin()){
			add_action( 'admin_init', array($this, 'deAppleIconsRegisterSettings') );
			add_action('activate_appleicons/appleicons.php',array($this,'addDefaultIconImages')); 
			add_action( 'admin_menu', array($this, 'deAddToAdminMenu') );
			add_filter('plugin_action_links', array($this, 'pluginActionLinks'), 10, 2 );
		}
		add_action('wp_head', array($this, 'deAppleIconReplaceText'));
	}
	function addDefaultIconImages(){
		$alreadyInstall = get_option('iphone_icon');
		if($alreadyInstall){
			return;
		}
		$options = array(
			'iphone_icon'=>'icon.png',
			'iphone_icon4'=>'icon@2x.png',
			'ipad_icon'=>'icon-72.png',
			'ipad_icon2'=>'icon-72@2x.png',
			'iphone_image'=>'Default~iphone320x460.png',
			'iphone_image4'=>'Default@2x640x920~iphone.png',
			'ipad_image'=>'Default-Portrait~ipad768x1004.png',
			'ipad_image2'=>'Default-Portrait~ipad2-1536x2008.png'
		);
		foreach($options as $option=>$image){
			update_option($option,$this->getDynamicUrl('/wp-content/plugins/appleicons/images/icons/'.$image));
		}
	}
	function pluginActionLinks( $links, $file ) {
		//var_dump($file);
		if ( strpos($file, '/appleicons.php' )>0 ) {
			$links[] = '<a href="admin.php?page='.$this->menuSlug.'">'.__('Settings').'</a>';
		} 
		return $links;
	}

	function deAddToAdminMenu(){
		add_options_page('Apple Icon Settings', 'Apple Icons', 'administrator', $this->menuSlug, array($this, 'pluginPageContentCallback'));
	}
	function pluginsImageSrc($image_name){
		return plugins_url( 'images/'.$image_name , __FILE__ );
	}
	function pluginPageContentCallback(){
		?>
        <style>
			a.deHelp{
				padding-left:25px;
				font-size:12px;
			}
			th.vMiddle, td.vMiddle{
				vertical-align: middle;
			}
			.deIconContainer{
				position:relative;
			}
			table div.precomposed{
				display:none;
			}
			table.deApplePrecomposed div.precomposed{
				display:block;
				position:absolute;
				top:0px;
				left:0px;
				background:url(<?php echo $this->pluginsImageSrc('glossy.png');?>);
				background-size:100% 100%;
				width:100%;
				height:100%;
			}
			div.deIconContainer img{
				border-radius:12px;
			}
			div.current_url{
				font-size:9px;
				color:#aaa;
			}
		</style>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Apple Icons and Loading Screens<a class="deHelp" href="http://developerextensions.com" title="Help" target="_blank">Help</a></h2>
			<form method="post" action="options.php" enctype="multipart/form-data"> 
				<?php settings_fields( 'de-apple-icon-group' );?>
				<?php do_settings_fields('page_url_slug', 'de-apple-icon-group' );
				wp_nonce_field( plugin_basename( __FILE__ ), $this->nonceName );?>
				
				<table class="form-table <?php echo (get_option('precomposed'))?'':'deApplePrecomposed'; ?>">
					<tr valign="top">
						<th class="vMiddle" scope="row">Precomposed</th>
						<td class="vMiddle">
							<input type="checkbox" onclick="jQuery(this).parents('table').toggleClass('deApplePrecomposed');" name="precomposed" value="yes" <?php if(get_option('precomposed')){ echo 'checked';} ?>  />
							
						</td>
					 </tr>
				
					<tr valign="top">
						<th scope="row" width="10%">iPhone 3</th>
						<th width="10%">Icon <br> (57x57)</th>
						<td width="10%">
							<div class="deIconContainer">
								<img width="57" height="57" src="<?php echo get_option('iphone_icon'); ?>" title="iPhone Icon (57x57)"/>
								<div class="precomposed"></div>
							</div>
						</td>
						<td width="20%">
                        	<input type="file" name="iphone_icon" value="<?php echo get_option('iphone_icon'); ?>" />
                            <div class="current_url"><?php echo get_option('iphone_icon'); ?></div>
                        </td>
						<th width="10%">StartUp Image (320x460)</th>
						<td width="20%"><img width="80" height="80" src="<?php echo get_option('iphone_image'); ?>" title="iPhone StartUp Image (640x1136)"/></td>
						<td width="20%">
                            <input type="file" name="iphone_image" value="<?php echo get_option('iphone_image'); ?>" />
                            <div class="current_url"><?php echo get_option('iphone_image'); ?></div>
                        </td>
					</tr>
				 
					<tr valign="top">
						<th scope="row">iPhone 4</th>
						<th>Icon <br> (114x114)</th>
						<td>
							<div class="deIconContainer">
								<img width="57" height="57" src="<?php echo get_option('iphone_icon4'); ?>" title="iPhone Icon (114x114)"/>
								<div class="precomposed"></div>
							</div>
						</td>
						<td>
                            <input type="file" name="iphone_icon4" value="<?php echo get_option('iphone_icon4'); ?>" />
                            <div class="current_url"><?php echo get_option('iphone_icon4'); ?></div>
                        </td>
						<th>StartUp Image (640x920)</th>
						<td><img width="80" height="80"  src="<?php echo get_option('iphone_image4'); ?>" title="iPhone Icon (640x920)"/></td>
						<td>
                            <input type="file" name="iphone_image4" value="<?php echo get_option('iphone_image4'); ?>" />
                            <div class="current_url"><?php echo get_option('iphone_image4'); ?></div>
                        </td>
					</tr>
                    <!--<tr valign="top">
						<th scope="row">iPhone 5</th>
						<th>Icon <br> (114x114)</th>
						<td>
							<div class="deIconContainer">
								<img width="57" height="57" src="<?php echo get_option('iphone_icon5'); ?>" title="iPhone Icon (114x114)"/>
								<div class="precomposed"></div>
							</div>
						</td>
						<td>
                            <input type="file" name="iphone_icon5" value="<?php echo get_option('iphone_icon5'); ?>" />
                            <div class="current_url"><?php echo get_option('iphone_icon5'); ?></div>
                        </td>
						<th>StartUp Image (640x1096)</th>
						<td><img width="80" height="80"  src="<?php echo get_option('iphone_image5'); ?>" title="iPhone Icon (640x1096)"/></td>
						<td>
                            <input type="file" name="iphone_image5" value="<?php echo get_option('iphone_image5'); ?>" />
                            <div class="current_url"><?php echo get_option('iphone_image5'); ?></div>
                        </td>
					</tr>-->
					
					<tr valign="top">
						<th scope="row">iPad</th>
						<th>Icon <br> (72x72)</th>
						<td>
							<div class="deIconContainer">
								<img width="57" height="57" src="<?php echo get_option('ipad_icon'); ?>" title="iPad Icon (72x72)"/>
								<div class="precomposed"></div>
							</div>
						</td>
						<td>
                            <input type="file" name="ipad_icon" value="<?php echo get_option('ipad_icon'); ?>" />
                            <div class="current_url"><?php echo get_option('ipad_icon'); ?></div>
                        </td>
						<th>StartUp Image (768x1004)</th>
						<td><img width="80" height="80"  src="<?php echo get_option('ipad_image'); ?>" title="iPad Icon (768x1004)"/></td>
						<td>
                            <input type="file" name="ipad_image" value="<?php echo get_option('ipad_image'); ?>" />
                            <div class="current_url"><?php echo get_option('ipad_image'); ?></div>
                        </td>
					</tr>
						
					<tr valign="top">
						<th scope="row">iPad 2</th>
						<th>Icon <br> (144x144)</th>
						<td>
							<div class="deIconContainer">
									<img width="57" height="57" src="<?php echo get_option('ipad_icon2'); ?>" title="iPad2 Icon (144x144)"/>
								<div class="precomposed"></div>
							</div>
						</td>
						<td>
                            <input type="file" name="ipad_icon2" value="<?php echo get_option('ipad_icon2'); ?>" />
                            <div class="current_url"><?php echo get_option('ipad_icon2'); ?></div>
                        </td>
						<th>StartUp Image (1536x2008)</th><td><img width="80" height="80"  src="<?php echo get_option('ipad_image2'); ?>" title="iPad2 Icon (1536x2008)"/></td>
						<td>
                            <input type="file" name="ipad_image2" value="<?php echo get_option('ipad_image2'); ?>" />
                            <div class="current_url"><?php echo get_option('ipad_image2'); ?></div>
                        </td>
					</tr>
			</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}


	function deAppleIconReplaceText(){
		$this->getUserBrowser();
		$icons		= array(
			'iphone_icon'=>'57x57',
			'iphone_icon4'=>'114x114',
			/*'iphone_icon5'=>'114x114',*/
			'ipad_icon'=>'72x72',
			'ipad_icon2'=>'144x144'
		);
		$appleTouchIconPrecomposed 	= 'apple-touch-icon'.((get_option('precomposed')!='')?'-precomposed':'');
		if($this->browserName == "safari" || true){?>
			<meta name="apple-mobile-web-app-capable" content="yes" />
            <script>
            	function appleIconsBuildStartUpImagesLinks(){
					function AddLink(url){
						var link 	= document.createElement("link");
						link.rel	= "apple-touch-startup-image";
						link.href	= url;
						document.getElementsByTagName("head")[0].appendChild(link);
					}
					var appleIcons_startUpImages = {
						"iphone":"<?php echo $this->getDynamicUrl(get_option('iphone_image'));?>",
						"iphone4":"<?php echo $this->getDynamicUrl(get_option('iphone_image4'));?>",
						//"iphone5":"<?php //echo $this->getDynamicUrl(get_option('iphone_image5'));?>",
						"ipad":"<?php echo $this->getDynamicUrl(get_option('ipad_image'));?>",
						"ipad2":"<?php echo $this->getDynamicUrl(get_option('ipad_image2'));?>"
					};
					var image = false;
					if(navigator.userAgent.indexOf("iPhone")>-1){
						if( window.devicePixelRatio && window.devicePixelRatio>1){	
							image = appleIcons_startUpImages["iphone4"];
						}else{
							image = appleIcons_startUpImages["iphone"];
						}
					}else if(navigator.userAgent.indexOf("iPad")>-1){
						if(window.devicePixelRatio && window.devicePixelRatio>1){	
							image = appleIcons_startUpImages["ipad2"];
						}else{
							image = appleIcons_startUpImages["ipad"];
						}
					}
					if(image!='false'){
						AddLink(image);
					}
				}
				appleIconsBuildStartUpImagesLinks();
            </script>
			<?php
			foreach ($icons as $key=>$value){
				$url = $this->getDynamicUrl(get_option($key));
				if($url){
					?>
					<link href="<?php echo $url;?>" rel="<?php echo $appleTouchIconPrecomposed;?>" sizes="<?php echo $value;?>" />
				<?php }
			 } 
		}
	}

	function validateSetting($name='11111'){
		$value = get_option($name);
		if ( !wp_verify_nonce( $_POST[$this->nonceName], plugin_basename( __FILE__ ) ) ){
			return $value;
		}
		$image 	= $_FILES[$name]; 
		if ($image['size']){   
			if (preg_match('/png$/', $image['type'])){       
				$override = array('test_form' =>false); 
				$file = wp_handle_upload( $image, $override );  
				if($file){     
					$value = $file['url'];
				}
			}
		}
		return $value;
	}
	function __call($name, $arguments){
		 $name  = explode('__', $name);
		 $functionName = $name[0]; 
		 return $this->$functionName($name[1]);
    }
	function deAppleIconsRegisterSettings(){
		// whitelist options precomposed
		register_setting( 'de-apple-icon-group', 'precomposed');
		register_setting( 'de-apple-icon-group', 'iphone_icon', array($this, 'validateSetting__iphone_icon'));
		register_setting( 'de-apple-icon-group', 'iphone_image', array($this, 'validateSetting__iphone_image'));
		register_setting( 'de-apple-icon-group', 'iphone_icon4', array($this, 'validateSetting__iphone_icon4'));
		register_setting( 'de-apple-icon-group', 'iphone_image4', array($this, 'validateSetting__iphone_image4'));
		/*register_setting( 'de-apple-icon-group', 'iphone_icon5', array($this, 'validateSetting__iphone_icon5'));
		register_setting( 'de-apple-icon-group', 'iphone_image5', array($this, 'validateSetting__iphone_image5'));*/
		register_setting( 'de-apple-icon-group', 'ipad_icon', array($this, 'validateSetting__ipad_icon'));
		register_setting( 'de-apple-icon-group', 'ipad_image', array($this, 'validateSetting__ipad_image'));
		register_setting( 'de-apple-icon-group', 'ipad_icon2', array($this, 'validateSetting__ipad_icon2'));
		register_setting( 'de-apple-icon-group', 'ipad_image2', array($this, 'validateSetting__ipad_image2'));
	}
	 
	function getUserBrowser(){
		if(!$this->browserName){
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
			if(preg_match('/Opera/i',$user_agent)){
				$this->browserName = "opera";
			}elseif(preg_match('/firefox/i',  $user_agent)){
				$this->browserName = "firefox";
			}elseif(preg_match('/chrome/i',  $user_agent)){ 
				$this->browserName = "chrome";
			}elseif(preg_match('/safari/i',  $user_agent)){
				$this->browserName = "safari";
			}
		}
	}
	
	function getDevice(){
		$device_name;
		$device_agent=$_SERVER['HTTP_USER_AGENT'];	
		if(preg_match('/iPad/i', $device_agent)){
			$device_name="iPad";
		}elseif(preg_match('/iPhone/i',$device_agent)){
			$device_name="iPhone";
		}
		return $device_name;
	}
	function getDynamicUrl($url){
		$siteUrl = site_url();
		if(!$url){
			return false;
		}
		$url = explode('wp-content',$url);
		$url = $siteUrl.'/wp-content'.$url[1];
		return $url;
	}
}

$deAppleIcons = new deAppleIcons();

?>