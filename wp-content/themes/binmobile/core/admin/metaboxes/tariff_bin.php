<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="tariff-link"><?php esc_html_e('Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-link" />
                <p class="description">
                    <?php esc_html_e('Featured image link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-sub-title"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('sub-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-sub-title" />
                <p class="description">
                    <?php esc_html_e('Sub Title shown under Main Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-short-desc"><?php esc_html_e('Short Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('short-desc'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-short-desc" />
                <p class="description">
                    <?php esc_html_e('Short Description shown below Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-video"><?php esc_html_e('Video', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-video" />
                <p class="description">
                    <?php esc_html_e('Video shown below Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-image-size"><?php esc_html_e('Image Size', BIP_DOMAIN); ?></label></th>
            <td class="image-size">
                <?php $mb->the_field('image_size'); ?>
                <?php foreach (BipCoreAdmin::getImageSizes() as $size) : ?>
                    <label>
                        <input id="tariff-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($size['name'])) ?> value="<?php echo esc_attr($size['name']); ?>" />
                        <em><?php echo esc_html($size['name']); ?></em>&nbsp;<?php if (isset($size['width']) && isset($size['height'])) : ?>(<?php echo esc_html($size['width']); ?>x<?php echo esc_html($size['height']); ?><?php if ($size['crop']) echo '&nbsp;' . esc_html(__('cropped', BIP_DOMAIN)); ?>)<?php endif; ?>
                    </label>
                    <br/>
                <?php endforeach; ?>
                    <p class="description">
                        <?php esc_html_e('If you want to use full size image then leave this field blank', BIP_DOMAIN); ?>
                    </p>
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Tariff Information-Part 1</h3></th>
        </tr>
        <tr>
            <th><label for="tariff-part1-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part1-title" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part1-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part1-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part1-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="tariff-part1-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part1-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part1-image" />
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Tariff Information-Part 2</h3></th>
        </tr>
        <tr>
            <th><label for="tariff-part2-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part2-title" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part2-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part2-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part2-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="tariff-part2-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part2-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part2-image" />
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Tariff Information-Part 3</h3></th>
        </tr>
        <tr>
            <th><label for="tariff-part3-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part3-title" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part3-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part3-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part3-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="tariff-part3-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part3-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part3-image" />
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Tariff Information-Part 4</h3></th>
        </tr>
        <tr>
            <th><label for="tariff-part4-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part4-title" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part4-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part4-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part4-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="tariff-part4-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="tariff-part4-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-part4-image"/>
            </td>
        </tr>
    </tbody>
</table>
</div>