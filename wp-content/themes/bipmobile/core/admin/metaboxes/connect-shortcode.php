<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
                <tr>
                    <th><label for="tariff-link"><?php esc_html_e('Social Profiles', BIP_DOMAIN); ?></label></th>
                    <td>
                        <a style="float:right; margin:0 10px;" href="#" class="dodelete-social-profiles button"><?php esc_html_e('Remove All', BIP_DOMAIN); ?></a>
                        <p><?php esc_html_e('Add your social profiles by entering in a title, icon and URL.', BIP_DOMAIN); ?></p>
                        <?php while($mb->have_fields_and_multi('social-profiles', array('length' => 1, 'limit' => 6))): ?>
                        <?php $mb->the_group_open(); ?>
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th style="padding-left: 0px;"><label for="bip-connect-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
                                        <td>
                                            <?php $mb->the_field('title'); ?>
                                            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="social-profile-title" id="bip-shop-title"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 0px;"><label for="bip-shop-url"><?php esc_html_e('URL', BIP_DOMAIN); ?></label></th>
                                        <td>
                                            <?php $mb->the_field('link'); ?>
                                            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="social-profile-url" id="bip-shop-url"/>
                                            <p class="description">
                                                <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 0px;"><label for="bip-shop-image"><?php esc_html_e('Icon', BIP_DOMAIN); ?></label></th>
                                        <td>
                                            <?php $mb->the_field('image'); ?>
                                            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="social-profile-icon" id="bip-shop-image"/>
                                            <p>
                                                <p class="description"><?php esc_html_e('Predefined Icons (82x73px)', BIP_DOMAIN); ?></p>
                                                <?php
                                                $template_directory_uri = get_template_directory_uri();
                                                $icons = array(
                                                    __('Dribbble', BIP_DOMAIN) => '/assets/img/c-dribbble.png',
                                                    __('Forrst', BIP_DOMAIN) => '/assets/img/c-forrst.png',
                                                    __('Twitter', BIP_DOMAIN) => '/assets/img/c-twitter.png',
                                                    __('Facebook', BIP_DOMAIN) => '/assets/img/c-facebook.png',
                                                    __('Linkedin', BIP_DOMAIN) => '/assets/img/c-linkedin.png',
                                                    __('Pinterest', BIP_DOMAIN) => '/assets/img/c-pinterest.png',
                                                );
                                                ?>
                                                <?php foreach ($icons as $title => $icon) : ?>
                                                <a href="#" onclick="jQuery(this).closest('.wpa_group').find('input.social-profile-icon').val(jQuery('img', this).attr('src')); jQuery(this).closest('.wpa_group').find('input.social-profile-title').val(jQuery('img', this).attr('alt')); return false;"><img src="<?php echo esc_url($template_directory_uri . $icon) ?>" alt="<?php echo esc_attr($title); ?>" /></a>
                                                <?php endforeach; ?>
                                            </p>
                                            <p>
                                                <a href="#" class="dodelete button"><?php esc_html_e('Remove Social Profile', BIP_DOMAIN); ?></a>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php $mb->the_group_close(); ?>
                        <?php endwhile; ?>
                        <p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-social-profiles button"><?php esc_html_e('Add New Social Profile', BIP_DOMAIN) ?></a></p>
                    </td>
                </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-connect" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
