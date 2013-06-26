    <!-- Footer -->
    <footer id="footer">
    	<div class="container">
        	<div class="row">
				<div class="span2 offset5 center logo"><img class="pull-left" src="<?php echo get_stylesheet_directory_uri().'/assets/img/footer-logo.png';?>"/></div>
            </div>
            <div class="clear"></div>
            <div class="row section1">
                <div class="span6">
                	<a class="smaller">Site Map</a>
                    <a class="smaller">Diventa 	Partner</a>
                </div>
                <div class="span6 right">
               		<span class="smaller">Assistanza clietti: <b class="title-color">4050</b></span>
                    <span class="smaller">Bip informa: <b class="title-color">06 62288213</b></span>
                </div>
            </div>
            
           	<hr>
           	<div class="row section2"> 
            	<div>
                    <div class="span4">
                    	<img class="pull-left" src="<?php echo get_stylesheet_directory_uri().'/assets/img/soddisfatti.png';?>"/>
                    	<a class="pull-left"><div>SODDISFATTI</div><div>O RIMBORSATI</div></a>
                    </div>
                    <div class="span4">
                    	<img class="pull-left" src="<?php echo get_stylesheet_directory_uri().'/assets/img/spedizione.png';?>"/>
                    	<span><a class="pull-left" ><div>SPEDIZIONE</div><div>GRATUITA</div></a></span>
                    </div>
                    <div class="span4">
                    	<img class="pull-left" src="<?php echo get_stylesheet_directory_uri().'/assets/img/pagamenti.png';?>"/>
                    	<span><a class="pull-left" ><div>PAGAMENTI</div><div>SICURI</div></a></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <hr>
            
            <div class="row section3">   
                <div>
                    <div class="span4">
                    	<h3 class="title-color">PRODOTTI</h3>
                        <?php //echo getProducts();?>
                        <ul>
                        	<li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                        </ul>
                        <h3 class="title-color">TARIFFE</h3>
                        <?php //echo getTariffs();?>
                        <ul>
                        	<li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                        </ul>
                    </div>
                    <div class="span4">
                    	<h3 class="title-color">PRODOTTI</h3>
                        <ul>
                        	<li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                        </ul>
                    </div>
                    <div class="span4">
                    	<h3 class="title-color">PRODOTTI</h3>
                        <ul>
                        	<li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                            <li><a href="#">Assistanza clietti</a></li>
                        </ul>
                    </div>
                    <div class="span8">
                    	<h3 class="title-color">CI TROVI ANCHE SU: </h3>
                    </div>
                </div>
            </div>
            <hr>
                <!-- Footer Sidebar -->
                <!--<?php if ( is_active_sidebar( 'footer-sidebar') ) : ?>
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                <?php endif; ?>
                <?php //elseif (BipCore::isAdministratorUserLoggedIn()): ?>
                    <div class="span12">
                        <p class="alert clearfix">
                            <?php printf(__('No widgets to display in 3-column &laquo;Footer Sidebar&raquo;. You can manage the widgets <a href="%s">here</a>.', BIP_DOMAIN), admin_url('widgets.php')); ?>
                            <br />
                            <em class="pull-right"><small><?php esc_html_e('This tip is visible only for site administrators.', BIP_DOMAIN); ?></small></em>
                        </p>
                    </div>
                <?php //endif; ?>-->
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