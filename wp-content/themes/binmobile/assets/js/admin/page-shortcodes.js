jQuery(document).ready( function($) {
    // Hardcode rocks!
    var template_to_metabox_map = {
        'templates/portfolio.php' : '#_BipCore_portfolio_shortcode_metabox',
        'templates/slider.php' : '#_BipCore_slider_shortcode_metabox',
        'templates/tariffs.php' : '#_BipCore_tariffs_shortcode_metabox',
        'templates/contact.php' : '#_BipCore_contact_shortcode_metabox',
        'templates/shop.php' : '#_BipCore_shop_shortcode_metabox',
        'templates/connect.php' : '#_BipCore_connect_shortcode_metabox',
        'templates/products.php' : '#_BipCore_products_shortcode_metabox'
    };
    var $page_template = $('select#page_template');
    // Hide metaboxes for bip shortcode generators
    $('.bip-shortcode-metabox').parents('.postbox').hide();
    function showShortcodeGenerator()
    {
        $('.bip-shortcode-metabox').parents('.postbox').hide('slow');
        if ( $page_template.val() in template_to_metabox_map ) {
            $(template_to_metabox_map[$page_template.val()]).show('slow');
        }
    }
    showShortcodeGenerator.call();
    $page_template.change(showShortcodeGenerator)
    $('#slides-all').change(function(){
        if ($(this).is(':checked')) {
            $('select#slides').hide('slow');
        } else {
            $('select#slides').show('slow');
        }
    });
    function portfolio_shortcode()
    {
        var shortcode = '';
        shortcode += '[bip_portfolio';
        if ($('#portfolio-limit').val()) {
            shortcode += ' limit="' + $('#portfolio-limit').val() + '"';
        }
        shortcode += ']';
        return shortcode;
    }
    function shop_shortcode()
    {
        var shortcode = '';
        shortcode += '[bip_shop';
        if ($('#shop-limit').val()) {
            shortcode += ' limit="' + $('#shop-limit').val() + '"';
        }
        shortcode += ']';
        return shortcode;
    }
    function tariffs_shortcode()
    {
        var shortcode = '';
        shortcode += '[bip_tariffs';
		if ($('#tariffs-id').val()) {
            shortcode += ' id="' + $('#tariffs-id').val() + '"';
        }
		
        if ($('#tariffs-limit').val()) {
            shortcode += ' limit="' + $('#tariffs-limit').val() + '"';
        }
        shortcode += ']';
        return shortcode;
    }
    function products_shortcode()
    {
        var shortcode = '';
        shortcode += '[bip_products';
		if ($('#products-id').val()) {
            shortcode += ' id="' + $('#products-id').val() + '"';
        }
		
        if ($('#products-limit').val()) {
            shortcode += ' limit="' + $('#products-limit').val() + '"';
        }
        shortcode += ']';
        return shortcode;
    }
    function slider_shortcode()
    {
        var shortcode = '';
        shortcode += '[bip_slider';
        if ( !$('#slides-all').is(':checked') ) {
            var slides = $('select#slides').val();
            if (slides) {
                shortcode += ' slides="' + slides.join(',') + '"';
            }
        }
        shortcode += ' animation="' + $('#slider-animation').val() + '"';
        shortcode += ' slideshowSpeed="' + $('#slideshow-speed').val() + '"';
        shortcode += ' animationDuration="' + $('#animation-delay').val() + '"';
        shortcode += ' slideshow="' + $('#slider-autoplay').is(':checked') + '"';
        if ($('input.slider-image-size').is(':checked'))  {
            shortcode += ' image_size="' + $('input.slider-image-size').filter(':checked').val() + '"';
        }
        shortcode += ']';
        return shortcode;
    }
    function map_and_contact_shortcode()
    {
        var shortcode = '';
        var latitude = $('#bip-google-map-latitude').val();
        var longitude = $('#bip-google-map-longitude').val();
        if (latitude && longitude) {
            shortcode += '[bip_googlemap';
            shortcode += ' latitude="' + latitude + '"';
            shortcode += ' longitude="' + longitude + '"';
            var api_key = $('#bip-google-map-api-key').val();
            if (api_key) {
                shortcode += ' apikey="' + api_key + '"';
                var marker_title = $('#bip-google-map-marker-title').val();
                if (marker_title) {
                    shortcode += ' marker_title="' + marker_title + '"';
                }
            }
            shortcode += ']';
            if (api_key) {
                shortcode += 'INSERT MARKER CONTENT HERE';
                shortcode += '[/bip_googlemap]';
            }
        }
        shortcode += '[bip_contact'
        var subject = $('#bip-contact-subject').val();
        var emailto = $('#bip-contact-emailto').val();
        var success_msg = $('#bip-contact-success').val();
        var error_msg = $('#bip-contact-error').val();
        if (subject) {
            shortcode += ' subject="' + subject + '"';
        }
        if (emailto) {
            shortcode += ' emailto="' + emailto + '"';
        }
        if (success_msg) {
            shortcode += ' success_msg="' + success_msg + '"';
        }
        if (error_msg) {
            shortcode += ' error_msg="' + error_msg + '"';
        }
        shortcode += ']';
        shortcode += 'INSERT CONTACT FORM CONTENT HERE';
        shortcode += '[/bip_contact]';
        return shortcode;
    }
    function connect_shortcode()
    {
        var shortcode = '';
        shortcode += '[bip_connect]';
        var $metabox = $('.bip-shortcode-metabox', '#_BipCore_connect_shortcode_metabox');
        var link = '';
        var image = '';
        var title = '';
        $('.wpa_group-social-profiles:visible', $metabox).each(function(){
             link = $('input[name$="[link]"]', this).val();
             image = $('input[name$="[image]"]', this).val();
             title = $('input[name$="[title]"]', this).val();
             if (image) {
                 shortcode += '[bip_connect_item';
                 shortcode += ' image="' + image + '"';
                 if (link) {
                    shortcode += ' link="' + link + '"';
                 }
                 if (title) {
                     shortcode += ' title="' + title + '"';
                 }
                 shortcode += ']';
             }
        });
        shortcode += '[/bip_connect]';
        return shortcode;
    }
    $('#insert-contact-and-map').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, map_and_contact_shortcode());
    })
    $('#insert-slider').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, slider_shortcode());
    })
    $('#insert-connect').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, connect_shortcode());
    })
    $('#insert-portfolio').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, portfolio_shortcode());
    })
    $('#insert-shop').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shop_shortcode());
    })
    $('#insert-tariffs').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tariffs_shortcode());
    })
    $('#insert-products').click(function(){
        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, products_shortcode());
    })
});