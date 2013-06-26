<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="option-link"><?php esc_html_e('Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-link" />
                <p class="description">
                    <?php esc_html_e('Featured image link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-desc-link"><?php esc_html_e('Description Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('desc-link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-desc-link" />
                <p class="description">
                    <?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-type"><?php esc_html_e('Type', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('option_type'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-type" />
                <p class="description">
                    <?php esc_html_e('Type shown above Main Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-short-desc-1"><?php esc_html_e('Short Description 1', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('short-desc-1'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-short-desc-1" />
                <p class="description">
                    <?php esc_html_e('Short Description 1 shown under Main Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-short-desc-2"><?php esc_html_e('Short Description 2', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('short-desc-2'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-short-desc-2" />
                <p class="description">
                    <?php esc_html_e('Short Description 2 shown below Short Description 1', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-desc"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="option-desc"><?php $mb->the_value(); ?></textarea>
                <p class="description">
                    <?php esc_html_e('Description of Option', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('button-text'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-button-text" />                
            </td>
        </tr>
        <!--<tr>
            <th><label for="option-video-1"><?php esc_html_e('Video 1', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video_1'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-video-1" />
                <p class="description">
                    <?php esc_html_e('Video 1 shown below Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="option-video-2"><?php esc_html_e('Video 2', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video_2'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="option-video-2" />
                <p class="description">
                    <?php esc_html_e('Video 2 shown below Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>-->
        <tr>
            <th><label for="option-image-size"><?php esc_html_e('Image Size', BIP_DOMAIN); ?></label></th>
            <td class="image-size">
                <?php $mb->the_field('image_size'); ?>
                <?php foreach (BipCoreAdmin::getImageSizes() as $size) : ?>
                    <label>
                        <input id="option-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($size['name'])) ?> value="<?php echo esc_attr($size['name']); ?>" />
                        <em><?php echo esc_html($size['name']); ?></em>&nbsp;<?php if (isset($size['width']) && isset($size['height'])) : ?>(<?php echo esc_html($size['width']); ?>x<?php echo esc_html($size['height']); ?><?php if ($size['crop']) echo '&nbsp;' . esc_html(__('cropped', BIP_DOMAIN)); ?>)<?php endif; ?>
                    </label>
                    <br/>
                <?php endforeach; ?>
                    <p class="description">
                        <?php esc_html_e('If you want to use full size image then leave this field blank', BIP_DOMAIN); ?>
                    </p>
            </td>
        </tr>
    </tbody>
</table>
</div>