<?php
/* Template Name: Configuration */
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <!-- Configuration Page -->
    <div class="page <?php echo implode(' ', get_post_class()); ?>" id="<?php echo esc_attr(basename(get_permalink())); ?>">
        <div id="config" class="container">
           	<!--<div class="page-title">
                <a href="#<?php echo esc_attr(basename(get_permalink())); ?>"><h1><?php the_title(); ?></h1></a>
            </div>
            <?php the_content(); ?>-->
            <div id="item-detail" class="row">
                <div class="span6">
                    <h1 class="right larger"><?php the_title(); ?></h1>
                    <h3 class="right slim">Configura il telefonino</h3>
                    <h3 class="right">Doloro sit</h3>
                </div>
                <div class="span6 center">
                    <img src="<?php echo WPTHEME_URL;?>/assets/img/configurazioni.png"  />
                </div>
        	</div>
            <div class="clear">
            <div class="row">
            	<div class="span12">
                	<h2 class="orange">Configura il tuo telefonino per navigare in internet, configurare SMS ed inviare MMS.</h2>
                    <!--<p class="dark_gray"><i>Semplice, perché consente di <b>chiamare tutti gli operatori di telefonia fissa e mobile,</b> economica, perché a soli <b>a 3 centesimi al minuto</b> consente un risparmio notevole rispetto alle offerte dello stesso tipo attualmente disponibili e per sempre, perché <b>non è promozionale e non sarà soggetta a rialzi</b> rimanendo invariata nel tempo.</i></p>-->
                </div>
            </div>
            <hr class="shadow_down" />
            <div class="row mart40">
            	<div class="span6">
                	<div class="box1 bg_gray" style="height:340px;">
                        <h4 class="slim">configurazione <b>telefono:</b></h4>
                        <p class="light_gray marb40">Inserisci il numero di telefono per ricevere l’sms di configurazione.</p>
                        <br />
                        <div class="row-fluid marb40">
                        	<input class="span8" type="text" name="" placeholder="Numero di telefono" />
                            <a class="span3 btn btn-black" href="#" style="margin-left:20px;">Invia</a>
                        </div>
                        <br />
                        <p class="small light_gray">Per navigare configura rapidamente il punto di accesso <a href="javascript:void(0)" onclick="jQuery('#confBox1').modal();"><b class="orange">clicca qui</b></a></p>
                        <!-- Modal -->
                        <div id="confBox1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Per navigare configura rapidamente il punto di accesso</h3>
                          </div>
                          <div class="modal-body">
                            <p>Per navigare in internet è necessario configurare il punto di accesso o APN : segui le istruzioni contenute nella guida del tuo telefonino per accedere alla sua creazione o modifica. Inserisci nell'apposito campo APN il valore internet.vistream.it</p>
                          </div>
                        </div>
                        <p class="small light_gray">Se non hai trovato il tuo telefonino nella lista proposta per la configurazione tramite sms, <a href="<?php echo WPSITE_URL;?>/wp-content/uploads/2013/06/Configurazione_telefono.pdf"><b class="orange">clicca qui</b></a></p>
                    </div>
                </div>
                <div class="span6">
                	<div class="box1 bg_gray" style="height:340px;">
                        <h4 class="slim">configurazione <b>telefono:</b></h4>
                        <p class="light_gray">Segui questi semplici passi per configurare il tuo smartphone.</p>
                        <p class="light_gray"><h6>1. Quale sistema operativo usa il tuo smartphone?</h6></p>
                        <div class="row-fluid marb40">
                        	<div class="span4">
                            	<div class="image_holder">
                                    <img src="<?php echo WPTHEME_URL;?>/assets/img/apple.png" />
                                    <span class="radio_custome">
                                        <input id="phone_apple" type="radio" name="phone_type" value="ios" />
                                        <label for="phone_apple"></label>
                                    </span>
                                </div>
                                <h6 class="slim light_gray">Apple</h6>
                            </div>
                            <div class="span4 center">
                            	<div class="image_holder">
                                    <img src="<?php echo WPTHEME_URL;?>/assets/img/android.png" />
                                    <span class="radio_custome">
                                        <input id="phone_android" type="radio" name="phone_type" value="and" />
                                        <label for="phone_android"></label>
                                    </span>
                                </div>
                                <h6 class="slim light_gray left">Android</h6>
                            </div>
                            <div class="span4 right">
                            	<div class="image_holder">
                                    <img src="<?php echo WPTHEME_URL;?>/assets/img/window.png" />
                                    <span class="radio_custome">
                                        <input id="phone_window" type="radio" name="phone_type" value="win" />
                                        <label for="phone_window"></label>
                                    </span>
                                </div>
                                <h6 class="slim light_gray center">Windows</h6>
                            </div>
                        </div>
                        <div class="row-fluid">
                        	<div class="span6">
                            	<h6 class="light_gray">2. Quale versione?</h6>
                                <p></p>
                                <div id="ios_phone_version_div" class="selective">
                                    <select id="ios_phone_version">
                                        <option value="">Sistema operativo</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div id="and_phone_version_div" class="selective" style="display:none">
                                    <select id="and_phone_version">
                                        <option value="">Sistema operativo</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div id="win_phone_version_div" class="selective" style="display:none">
                                    <select id="win_phone_version">
                                        <option value="">Sistema operativo</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="span6">
                            	<h6 class="light_gray">3. Cosa vuoi configurare?</h6>
                                <p></p>
                                <p class="small light_gray" style="margin-top:25px">
                                <span class="radio_custome">
                                    <input id="phone_internet" type="radio" name="phone_confi" value="internet" />
                                    <label for="phone_internet"></label>
                                </span>
                                Internet
                                <span class="radio_custome">
                                    <input id="phone_mms" type="radio" name="phone_confi" value="mms" />
                                    <label for="phone_mms"></label>
                                </span>
                                <small>MMS</small>
                                </p>
                            </div>
                        </div>
                        <div id="phone_version_disable"></div>
                        <p></p>
                    </div>
                </div>
            </div>
            <iframe id="phone_config_frame" src="" frameborder="0" width="960" height="0"></iframe>
            <script>
            	jQuery(document).ready(function($){
					var disable_phone_versoin 	= true;
					var type					= 'ios';
					
                    jQuery('input[name="phone_type"]').bind('change', function(e){
						var type = jQuery(this).val();
						jQuery('.selective').each(function(i, e) {
                            jQuery(e).hide();
                        });
						disable_phone_versoin = false;
						
						if(disable_phone_versoin){
							$('#phone_version_disable').show();
						}else{
							$('#phone_version_disable').hide();
						}
						jQuery('#'+type+'_phone_version_div').show();
						set_phone_config(type);
					});
					$('input[name="phone_confi"]').bind('change', function(){
						jQuery('input[name="phone_type"]').each(function(i, e) {
							if(e.checked){
								type 	= e.value;
							}
						});
						set_phone_config(type);
					});
					$('#ios_phone_version').bind('change', function(){set_phone_config();});
					$('#and_phone_version').bind('change', function(){set_phone_config();});
					$('#win_phone_version').bind('change', function(){set_phone_config();});
                });
				function set_phone_config(type){
					var phone_type 		= 'ios';
					var phone_confi		= 'internet';
					if(type!=undefined){
						phone_type		= type;
					}else{
						jQuery('input[name="phone_type"]').each(function(i, e) {
							if(e.checked){
								phone_type 	= e.value;
							}
						});
					}
					jQuery('input[name="phone_confi"]').each(function(i, e) {
						if(e.checked){
							phone_confi	= e.value;
						}
					});
					var phone_version	= jQuery('#'+phone_type+'_phone_version').val();
					
					if(phone_version == '' || phone_version == 'undefined'){
						return false;
					}else{
						var data = {
							action: 'set_phone_config',
							phone_type: phone_type,
							phone_confi: phone_confi,
							phone_version: phone_version
						};
						var frame 		= jQuery('#phone_config_frame')[0];
						frame.height 	= 540;
						frame.src 	 	= '<?php echo WPTHEME_URL;?>/Interattive/'+phone_type+phone_version+'-'+phone_confi+'.html';
						/*var ajax_url = '<?php echo wp_nonce_url(admin_url('admin-ajax.php'), 'bip_ajax_set_phone_config' );?>';
						
						jQuery.post(ajax_url, data, function(response) {
							jQuery('#phone_config_frame')[0].src = '<?php echo WPTHEME_PATH;?>/Interattive/'+phone_type+phone_version+'-'+phone_confi+'.html';
						});*/
					}
				}
            </script>
            <div class="row marb40">
            	<div class="span6">
                	<div class="box1 bg_gray" style="height:365px;">
                        <h4 class="slim">configurazione <b>telefono:</b></h4>
                        <p class="light_gray">Seleziona la marca del tuo tablet e configuralo per la navigazione.</p>
                        <div class="row-fluid marb40">
                        	<div class="span4">
                            	<div class="image_holder">
                                    <img src="<?php echo WPTHEME_URL;?>/assets/img/apple.png" />
                                    <span class="radio_custome">
                                        <input id="tab_apple" type="radio" name="tab_type" value="" />
                                        <label for="tab_apple"></label>
                                    </span>
                                </div>
                                <h6 class="slim light_gray">Apple</h6>
                            </div>
                            <div class="span4 center">
                            	<div class="image_holder">
                                    <img src="<?php echo WPTHEME_URL;?>/assets/img/android.png" />
                                    <span class="radio_custome">
                                        <input id="tab_android" type="radio" name="tab_type" value="" />
                                        <label for="tab_android"></label>
                                    </span>
                                </div>
                                <h6 class="slim light_gray left">Android</h6>
                            </div>
                            <div class="span4 right">
                            	<div class="image_holder">
                                    <img src="<?php echo WPTHEME_URL;?>/assets/img/window.png" />
                                    <span class="radio_custome">
                                        <input id="tab_window" type="radio" name="tab_type" value="" />
                                        <label for="tab_window"></label>
                                    </span>
                                </div>
                                <h6 class="slim light_gray center">Windows</h6>
                            </div>
                        </div>
                        <br class="mart40 marb40">
                        <div class="row-fluid mart40 marb40">
                            	<a class="span4 offset4 btn btn-black disable" href="<?php echo WPSITE_URL;?>/wp-content/uploads/2013/06/Manuale-X230.pdf">Guida all’utilizzo</a>
                       	</div>
                        <br />
                    </div>
                </div>
                <div class="span6">
                	<div class="box1 bg_gray" style="height:365px;">
                        <h4 class="slim">configurazione <b>telefono:</b></h4>
                        <p class="light_gray">Lorem ipsum is a pseudo-Latin text used in web design, typography.</p>
                        <div class="row-fluid">
                        	<div class="span3"><img src="<?php echo WPTHEME_URL;?>/assets/img/chiavetta.png" /></div>
                            <div class="span9 mart40">
                            	<h3 class="orange">ALCATEL ONE TOUCH X230</h3>
                                <h6 class="slim light_gray">La tua chiavetta internet con 3 mesi di traffico incluso.</h6>
                                <p><h6 class="slim light_gray">Naviga veloce e senza pensieri fino a 1GB a settimana senza limiti di tempo.</h6></p>
                                <a class="span5 btn btn-black" href="<?php echo WPSITE_URL;?>/wp-content/uploads/2013/06/Manuale-X230.pdf">Guida all’utilizzo</a>
                                <a class="span5 offset1 btn btn-black" href="javascript:void(0)" onclick="jQuery('#confBox2').modal();">Scheda tecnica</a>
                                <!-- Modal -->
                                <div id="confBox2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel2">ALCATEL ONE TOUCH X230</h3>
                                  </div>
                                  <div class="modal-body">
                                    <div class="container">
                                    	<div class="row">
                                        	<div class="span4">
                                            	<div id="DIMENSIONI" class="marb40">
                                                	<div><b>DIMENSIONI:</b>87X27X10MM</div>
                                                    <div><b>PESO:</b>23 g</div>
                                                </div>
                                                <div id="SISTEMA">
                                                	<div><b>REQUISITI MINIMI DI SISTEMA</b></div>
                                                    <div class="row-fluid">
                                                    	<div class="span4">CPU:</div>
                                                        <div class="span8">Pentium 500MHz o superiore</div>
                                                    </div>
                                                    <div class="row-fluid">
                                                    	<div class="span4">Memoria:</div>
                                                        <div class="span8">128MB RAM o superiore</div>
                                                    </div>
                                                    <div class="row-fluid">
                                                    	<div class="span4">Hard Disk:</div>
                                                        <div class="span8">160MB di spazio disponibile</div>
                                                    </div>
                                                    <div class="row-fluid">
                                                    	<div class="span4">Display:</div>
                                                        <div class="span8">
                                                        	800x600 pixels o superiore
                                                            <br>(raccomandata 1024x768)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span4">
                                            	<div id="OPERATIVI" class="marb20">
                                                	<div><b>COMPATIBILITA' CON I SISTEMI OPERATIVI</b></div>
                                                    <div>
                                                        Windows XP, Vista, Windows 7, Mac OS
                                                        <br>10.4.9-10.7; Linux driver
                                                    </div>
                                                </div>
                                                <div id="PRINCIPALI">
                                                	<div><b>CARATTERISTICHE PRINCIPALI</b></div>
                                                    <div>
                                                    	<div>HSDPA/UMTS (2100 MHz)-GPRS/EDGE</div>
                                                    	<div>(850/900/1800/1900 MHz) Invio e </div>
                                                    	<div>ricezione SMS - Gestione rubrica SIM -</div>
                                                    	<div>Supporto memoria MicroSD fino a 16GB -</div>
                                                    	<div>Software autoinstallante</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <p class="small light_gray">Vuoi usare la Bip Card con altre chiavette? <a href="<?php echo WPSITE_URL;?>/wp-content/uploads/2013/06/BIP_Chiavetta_Internet.pdf"><b class="orange">Clicca qui</b></a></p>
                    </div>
                </div>
            </div>
            <div class="row marb40">
                <div class="span12">
                    <div class="box bg_yellow pad1015">
                        <h4 class="slim light_gray">Per supporto o assistenza sim dati o chiavetta scrivi a <i class="white"><a href="<?php echo WPSITE_URL;?>/utilita/contatti/">contatto@bip.it</a></i></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Configuration -->
    <?php endwhile; ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>