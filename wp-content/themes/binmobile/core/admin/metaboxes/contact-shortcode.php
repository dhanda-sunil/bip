<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
        <tr>
            <th colspan="2">
                <strong><?php esc_html_e('Google Map', BIP_DOMAIN); ?></strong>
            </th>
        </tr>
                <tr>
                    <th><label for="bip-google-map-api-key"><?php esc_html_e('API Key', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('apikey'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="bip-google-map-api-key"/>
                        <p class="description">
                            <?php esc_html_e('To be able to use nice marker information you should load the Maps API using an API key.', BIP_DOMAIN) ?>
                            <a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key"><?php esc_html_e('Obtaining an API Key', BIP_DOMAIN); ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th><label for="bip-google-map-marker-title"><?php esc_html_e('Marker Title', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('marker_title'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="bip-google-map-marker-title"/>
                        <p class="description">
                            <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th><label for="bip-google-map-latitude"><?php esc_html_e('Point', BIP_DOMAIN); ?></label></th>
                    <td>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th><label for="bip-google-map-latitude"><span style="color: red">*</span> <?php esc_html_e('Latitude', BIP_DOMAIN); ?></label></th>
                                    <td>
                                    <?php $mb->the_field('latitude'); ?>
                                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="bip-google-map-latitude"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="bip-google-map-longitude"><span style="color: red">*</span> <?php esc_html_e('Longitude', BIP_DOMAIN); ?></label>
                                    </th>
                                    <td>
                                    <?php $mb->the_field('longitude'); ?>
                                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="bip-google-map-longitude"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="description">
                            <?php esc_html_e('Set the point in geographical coordinates: latitude and longitude.', BIP_DOMAIN) ?>
                        </p>
                    </td>
                </tr>
        <tr>
            <th colspan="2">
                <strong><?php esc_html_e('Contact Form', BIP_DOMAIN); ?></strong>
            </th>
        </tr>
        <tr>
            <th><label for="bip-contact-subject"><?php esc_html_e('Subject', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('subject'); ?>
                <input type="text" value="<?php esc_attr_e('Bip Contact Form', BIP_DOMAIN); ?>" name="<?php $mb->the_name(); ?>" id="bip-contact-subject"/>
            </td>
        </tr>
        <tr>
            <th><label for="bip-contact-emailto"><?php esc_html_e('Email To', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('emailto'); ?>
                <input type="text" value="<?php echo esc_attr( get_bloginfo('admin_email') ); ?>" name="<?php $mb->the_name(); ?>" id="bip-contact-emailto"/>
            </td>
        </tr>
        <tr>
            <th><label for="bip-contact-success"><?php esc_html_e('Success Message', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('success_msg'); ?>
                <input type="text" value="<?php esc_attr_e('Your email was successfully sent and I will be in touch with you soon.', BIP_DOMAIN) ?>" name="<?php $mb->the_name(); ?>" id="bip-contact-success"/>
            </td>
        </tr>
        <tr>
            <th><label for="bip-contact-error"><?php esc_html_e('Error Message', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('error_msg'); ?>
                <input type="text" value="<?php esc_attr_e('Please check if you\'ve filled all the fields with valid information.', BIP_DOMAIN) ?>" name="<?php $mb->the_name(); ?>" id="bip-contact-error"/>
            </td>
        </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-contact-and-map" type="button" value="<?php esc_attr_e('Insert Shortcodes', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
