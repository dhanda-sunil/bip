        <div class="container footer-background">
            <div class="shadow-separator-footer"></div>

            <!-- BEGIN #footer-container -->
            <footer class="footer-container full-width">             
                        
                <!-- BEGIN .widget-section -->
                <div class="widget-section six columns no-bottom">
                    
                    <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer One' ) ) ?>
                    
                <!-- END .widget-section -->   
                </div>
                        
                <!-- BEGIN .widget-section -->
                <div class="widget-section five columns no-bottom">
                    <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Two' ) ) ?>
                            
                <!-- END .widget-section -->   
                </div>
                        
                <!-- BEGIN .widget-section -->
                <div class="widget-section five columns no-bottom">
                        
                    <?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Three' ) ) ?>
                            
                <!-- END .widget-section -->   
                </div>              
                        
            <!--END #footer-container -->
            </footer>		

        <!--END .container -->
        </div>

    </div>

        <div class="footer-background2">
            <div class="container">
                <!--Begin .alignright .copyright -->
                <div class="six columns alpha omega row no-bottom" style="clear:both;">
                
                        <p class="copyright" style="margin-bottom: 10px">

                        <?php 
						preg_match('|(<a.*?.>.*?.</a>)|i', get_option('icy_footer_text'),$match);
						echo str_replace($match[0],'',get_option(' icy_footer_text ')); 
						?>

                        </p>
                <!--/.alignright-->
                </div>
				<!--Begin .alignright .privacy -->
                <div class="five columns alpha omega row no-bottom" style="" >
                    <p class="copyright" style="margin-bottom: 10px; float:none; text-align:center;z-index:1">
                    <?php echo $match[0]; ?>
                    </p>
                <!--/.alignright-->
                </div>
                <div class="five columns omega social-icons"  >
                    <?php get_template_part('/includes/social-icons'); ?>
                </div>

            </div>
        </div>

<!-- END #wrapper -->
</div>

        <!-- Theme Hook -->
    	<?php wp_footer(); ?>
			
<!--END body-->
</body>
<!--END html-->
</html>