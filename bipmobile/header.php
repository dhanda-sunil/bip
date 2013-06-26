<?php 
$options 		= BipMobileThemeOptions::getOptions();
$shortname 		= BipMobileThemeOptions::cfg('shortname');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php
            /*
             * Print the <title> tag based on what is being viewed.
             * We filter the output of wp_title() a bit -- see
             * BipCore::filterWpTitle() in functions.php.
             */
            wp_title( '|', true, 'right' );
    ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    	<?php if (file_exists( get_template_directory() . '/assets/img/'.$options[$shortname . '_gen_favicon'])){ ?>
        	<!--Favicon of your website-->
    		<link rel="shortcut icon" href="<?php echo get_template_directory_uri()."/assets/img/".$options[$shortname . '_gen_favicon'];   ?>" />
   		<?php }elseif (file_exists( get_template_directory() . '/favicon.ico')){?>
       		<!--Favicon of your website-->
        	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();  ?>/favicon.ico" />
        <?php } ?>
        <link href="http://fonts.googleapis.com/css?family=Carme" rel="stylesheet" type="text/css"/>
		<?php
        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         * @see BipCore::loadStyles() in functions.php.
         * @see BipCore::loadScripts() in functions.php.
         * @see BipCore::printStyles() in functions.php.
         * @see BipCore::printScripts() in functions.php.
         */
        wp_head();
		?>
        <script>
		jQuery(document).ready(function() {
		   jQuery('#tlogin').click(function() {
				jQuery("#tlogin").hide();
				jQuery("#loginArea").hide();    
			}); 
			jQuery("#frmLogin input").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					jQuery(".btLoginUser a").trigger('click');
				}
			});
			jQuery("#frmContact input").keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
					jQuery(".btRegisterNow a").trigger('click');
				}
			});
		});

		function openLogin(){
			if(jQuery("#loginArea").css('display')=="none"){	
				//jQuery(".forgt").show();
				jQuery("#tlogin").show();
				//jQuery(".forgtmsg").hide();
				jQuery("#loginArea").show();//.animate({ height : "400px;" }, { duration: 2500 });
			}else{
				jQuery("#tlogin").hide();
				jQuery("#loginArea").hide();//.animate({ height : "400px;" }, { duration: 2500 });
			}
		}	
        </script>
</head>
<body id="body_top" <?php body_class(); ?>>
<div style="position: fixed; width: 100%; height: 100%; z-index: 0; display: none;" id="tlogin"></div>
<!-- Header -->
<header id="header">
<!--<div class="login-cart-container" align="center">
	<div class="container row">
    	<?php
		$redirect = $_SERVER['PHP_SELF'];
		$current_user = wp_get_current_user();
		if ( 0 == $current_user->ID ) {?>
			<div class="login span pull-right" onclick="openLogin();">LOGIN</div>
		<?php } else {?>
			<div class="span pull-right"><?php echo $current_user->display_name;?> <a href="<?php echo wp_logout_url( get_permalink()); ?>">Log Out</a></div>
		<?php }	?>
		
        <div class="loginUserContainer" id="loginDivInner">
            <div class="loginUserArea" id="loginArea" style="display:none;">
                <h2 class="forgt">Login to <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h2>
                <h2 class="forgtmsg" style="display:none;">Recover to Bip</h2>
                <div id="mainError" class="redText">&nbsp;</div>
                <form id="frmLogin" method="post" action="<?php echo home_url( '/wp-login.php')?>">
                	<p class="loginInputFields">
                    	<label>Username
                        	<input class="text" name="log" type="text" id="user_login" size="13" maxlength="40" value="">
                  		</label>
                    	<label>Password
                        	<input class="text" name="pwd" type="password" id="user_pass" size="13" maxlength="40">
                    	</label>
                        <div>(<a href="<?php echo home_url( '/wp-login.php')?>">forgot?</a>) or <a href="<?php echo home_url( '/wp-login.php?action=register')?>">Register</a>
                    	<input type="submit" class="btn" name="wp-submit" id="wp-submit" value="Log in">
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['PHP_SELF'];?>">
                    	</div>
                    </p>
                </form>    
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>-->
<div id="head_container" class="container">
	<div class="row">
    <?php if (get_header_image()) : ?>
        <!-- Logo -->
        <div id="logo" class="span3">
            <a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" href="<?php echo home_url( '/' ); ?>">
                <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            </a>
        </div>
    <?php elseif (BipCore::isAdministratorUserLoggedIn()) : ?>
        <div class="span5">
            <p class="alert clearfix">
                <?php printf(__('You can manage site logo <a href="%s">here</a>.', BIP_DOMAIN), admin_url('themes.php?page=custom-header')); ?>
                <br />
                <em class="pull-right"><small><?php esc_html_e('This tip is visible only for site administrators.', BIP_DOMAIN); ?></small></em>
            </p>
        </div>
    <?php endif; ?>
	<div class="menu span7">
    <!-- Navigation -->
    <?php $menu_result = wp_nav_menu( array( 'fallback_cb' => array('BipCore', 'emptyMenuFallback'), 'depth' => 3, 'menu_class' => 'primary-nav', 'theme_location' => BipCore::TOP_MENU_LOCATION, 'container' => 'nav') ); ?>
    <?php if ($menu_result === false) BipCore::emptyMenuFallback(array()); // For wp 3.5 only ?>
   	</div>
    <!-- Search -->
    <div class="search pull-right">
    	<div class="">
        <form action="<?php echo home_url( '/' ); ?>" method="get" role="search" >
            <input type="text" name="s" value="" class="" placeholder="<?php _e('Cerca nel sito',BIP_DOMAIN)?>">
            <input type="submit" value="<?php _e('',BIP_DOMAIN)?>" name="searchsubmit" class="button">
        </form>
        </div>
    </div>
    <div class="clear"></div>
    </div>
</div>
</header>
<div class="menu_shadow"></div><!-- #header -->