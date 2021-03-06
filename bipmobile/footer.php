    <!-- Footer -->
    <footer id="footer">
    	<div class="container">
        	<div class="row">
				<div class="span2 offset5 center logo"><img class="pull-left" src="<?php echo BipCore::changeUrlDynamically(WPTHEME_URL.'/assets/img/footer-logo.png');?>"/></div>
            </div>
            <div class="clear"></div>
            <div class="row section1">
                <div class="span6">&nbsp;
                	<!--<a class="smaller">Site Map</a>
                    <a class="smaller">Diventa 	Partner</a>-->
                </div>
                <div class="span6 right">
               		<div>
                    	<span class="smaller" style="margin-right:10px;">Assistenza clienti: <b class="title-color">4050</b></span>
                    	<span class="smaller">Bip informa: <b class="title-color">06 62288213</b></span>
                    </div>
                    <div><span class="smaller">Email: <b class="title-color">contatto@bip.it<?php //bloginfo('admin_email');?></b></span></div>
                </div>
            </div>
            
           	<hr>
           	<div class="row section2"> 
            	<div>
                    <div class="span4">
                    	<img class="pull-left" src="<?php echo BipCore::changeUrlDynamically(WPTHEME_URL.'/assets/img/soddisfatti.png');?>"/>
                    	<span class="pull-left"><div>SODDISFATTI</div><div>O RIMBORSATI</div></span>
                    </div>
                    <div class="span4">
                    	<img class="pull-left" src="<?php echo BipCore::changeUrlDynamically(WPTHEME_URL.'/assets/img/spedizione.png');?>"/>
                    	<span class="pull-left"><div>SPEDIZIONE</div><div>GRATUITA</div></span>
                    </div>
                    <div class="span4">
                    	<img class="pull-left" src="<?php echo BipCore::changeUrlDynamically(WPTHEME_URL.'/assets/img/pagamenti.png');?>"/>
                    	<span class="pull-left"><div>PAGAMENTI</div><div>SICURI</div></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <hr>
            <?php 
			$fCategories	= getFooterCategories();
			$args = array(
				'post_type' 		=> array('footer_link'),
				'posts_per_page' 	=> -1,
				'order' 			=> 'ASC',
				'orderby' 			=> 'menu_order'
			);
			$links 	= get_posts($args);
			$fLinks	= array();
			foreach($links as $i=>$link){
				$id 			= $link->ID;
				$title			= $link->post_title;
				$postType		= get_post_type($id);
				$meta 			= get_post_meta($id, '_' . BipCore::prefix($postType), TRUE);
				$category	 	= is_array($meta) && isset($meta['category']) && !empty($meta['category']) ? $meta['category'] : '' ;
				$link		 	= is_array($meta) && isset($meta['link']) && !empty($meta['link']) ? $meta['link'] : '' ;
				foreach($fCategories as $fCategory){
					$count = (isset($fLinks[$category]))?count($fLinks[$category]):0;
					if($category==$fCategory){
						$fLinks[$category][$count]['name'] = $title;
						$fLinks[$category][$count]['link'] = $link;
					}
				}
				
			}
			?>
            <div class="row section3">   
                <div class="span8">
                	<div class="row-fluid">
                    <div class="span3" style=""><!--width:180px-->
                    	<h3 class="title-color">OFFERTA</h3>
                        <?php //echo getTariffs();?>
                        <ul>
                        	<?php
							if(isset($fLinks['TARIFFE'])){
                            foreach($fLinks['TARIFFE'] as $pLink){?>
							<li><a href="<?php echo $pLink['link']?>"><?php echo $pLink['name']?></a></li>
							<?php
                            }
                            }
							?>
                        </ul>
                        <h3 class="title-color">SERVIZI</h3>
                        <?php //echo getProducts();?>
                        <ul>
                        	<?php
							if(isset($fLinks['PRODOTTI'])){
                            foreach($fLinks['PRODOTTI'] as $pLink){?>
							<li><a href="<?php echo $pLink['link']?>"><?php echo $pLink['name']?></a></li>
							<?php
                            }
                            }
							?>
                        </ul>
                    </div>
                    <div class="span4">
                    	<h3 class="title-color">INFORMAZIONI</h3>
                        <ul>
							<?php
							if(isset($fLinks['INFORMAZIONI'])){
                            foreach($fLinks['INFORMAZIONI'] as $pLink){?>
							<li><a href="<?php echo $pLink['link']?>"><?php echo $pLink['name']?></a></li>
							<?php
                            }
                            }
							?>
                        </ul>
                    </div>
                    <div class="span5">
                    	<h3 class="title-color">IL MIO ACCOUNT</h3>
                        <ul>
                        	<?php
							if(isset($fLinks['IL MEO ACCOUNT'])){
                            foreach($fLinks['IL MEO ACCOUNT'] as $pLink){?>
							<li><a href="<?php echo $pLink['link']?>"><?php echo $pLink['name']?></a></li>
							<?php
                            }
                            }
							?>
                        </ul>
                    </div>
                    <div class="span9">
                    	<img style="margin:8px 0px 0px -50px" src="<?php echo BipCore::changeUrlDynamically(WPTHEME_URL.'/assets/img/pagamento.png');?>" />
                    </div>
                    </div>
                </div>
                <div class="span4">
                <!-- Footer Sidebar -->
                <?php if ( is_active_sidebar( 'footer-sidebar') ) : ?>
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                <?php endif; ?>
                </div>
            </div>
            <hr>
               
                <?php //elseif (BipCore::isAdministratorUserLoggedIn()): ?>
                    <!--<div class="span12">
                        <p class="alert clearfix">
                            <?php printf(__('No widgets to display in 3-column &laquo;Footer Sidebar&raquo;. You can manage the widgets <a href="%s">here</a>.', BIP_DOMAIN), admin_url('widgets.php')); ?>
                            <br />
                            <em class="pull-right"><small><?php esc_html_e('This tip is visible only for site administrators.', BIP_DOMAIN); ?></small></em>
                        </p>
                    </div>-->
                <?php //endif; ?>
            </div>
        </div>
       	<!-- Copyright -->
    	<section id="copyright">
	    	<div class="container">
                <!--<div class="pull-right">
                    <a href="#body_top" id="go-top">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/top.png'); ?>" alt="Go Top">
                    </a>
                </div>-->
                    <?php if ( is_active_sidebar( 'footer-copyright') ) : ?>
                        <div>
                            <!-- Footer Sidebar -->
                            <?php dynamic_sidebar( 'footer-copyright' ); ?>
                        </div>
                   <?php endif; ?>
                   <!-- <?php //elseif (BipCore::isAdministratorUserLoggedIn()): ?>
                        <div class="row">
                            <div class="span12">
                                <p class="alert clearfix">
                                    <?php printf(__('&laquo;Footer Copyright&raquo; widget area generally used in conjuction with simple text widget. You can manage the widgets <a href="%s">here</a>.', BIP_DOMAIN), admin_url('widgets.php')); ?>
                                    <br />
                                    <em class="pull-right"><small><?php esc_html_e('This tip is visible only for site administrators.', BIP_DOMAIN); ?></small></em>
                                </p>
                            </div>
                        </div>
                    <?php //endif; ?>-->
                </div>
        </section>
    </footer>
    <!-- #footer -->
    <?php wp_footer(); ?>
</body>
</html>
