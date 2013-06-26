<?php echo BipCoreAdmin::itemBackend($mb, 'product'); ?>
<!--<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="product-link"><?php esc_html_e('Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-link" />
                <p class="description">
                    <?php esc_html_e('Featured image link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-des-link"><?php esc_html_e('Description Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('des-link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-des-link" />
                <p class="description">
                    <?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-bottom-box1-link"><?php esc_html_e('Bottom Box 1 Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('bottom_box1_link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-bottom-box1-link" />
                <p class="description">
                    <?php esc_html_e('Bottom Box 1 link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-bottom-box2-link"><?php esc_html_e('Bottom Box 2 Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('bottom_box2_link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-bottom-box2-link" />
                <p class="description">
                    <?php esc_html_e('Bottom Box 2 link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-box-icon"><?php esc_html_e('Homepage Box Icon', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('box-icon'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-box-icon" />
                <p class="description">
                    <?php esc_html_e('Box Icon shown on homepage boxes', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-slider-icon"><?php esc_html_e('Slider Icon', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('slider-icon'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-slider-icon" />
                <p class="description">
                    <?php esc_html_e('Slider Icon shown on homepage slides', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-short-des-1"><?php esc_html_e('Short Description 1', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('short-des-1'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-short-des-1" />
                <p class="description">
                    <?php esc_html_e('Short Description 1 shown under Main Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-short-des-2"><?php esc_html_e('Short Description 2', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('short-des-2'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-short-des-2" />
                <p class="description">
                    <?php esc_html_e('Short Description 2 shown below Short Description 1', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-des"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="product-des"><?php $mb->the_value(); ?></textarea>
                <p class="description">
                    <?php esc_html_e('Description of Product', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('button-text'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-button-text" />                
            </td>
        </tr>
        <tr>
            <th><label for="product-video-1"><?php esc_html_e('Video 1', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video_1'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-video-1" />
                <p class="description">
                    <?php esc_html_e('Video 1 shown below Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-video-image-1"><?php esc_html_e('Video 1 Placeholder', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video_1_image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-video-image-1" />
            </td>
        </tr>
        <tr>
            <th><label for="product-video-2"><?php esc_html_e('Video 2', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video_2'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-video-2" />
                <p class="description">
                    <?php esc_html_e('Video 2 shown below Title', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="product-video-image-2"><?php esc_html_e('Video 2 Placeholder', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('video_2_image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-video-image-2" />
            </td>
        </tr>
        <tr>
            <th><label for="product-image-size"><?php esc_html_e('Image Size', BIP_DOMAIN); ?></label></th>
            <td class="image-size">
                <?php $mb->the_field('image_size'); ?>
                <?php foreach (BipCoreAdmin::getImageSizes() as $size) : ?>
                    <label>
                        <input id="product-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($size['name'])) ?> value="<?php echo esc_attr($size['name']); ?>" />
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
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 1</h3></th>
        </tr>
        <tr>
            <th><label for="product-part1-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part1-title" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part1-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part1-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part1-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="product-part1-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="product-part1-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part1-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part1-image" />
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 2</h3></th>
        </tr>
        <tr>
            <th><label for="product-part2-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part2-title" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part2-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part2-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part2-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="product-part2-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="product-part2-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part2-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part2-image" />
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 3</h3></th>
        </tr>
        <tr>
            <th><label for="product-part3-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part3-title" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part3-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part3-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part3-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="product-part3-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="product-part3-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part3-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part3-image" />
            </td>
        </tr>
        <tr>
        	<th colspan="2"><h3 style="cursor:none; margin:0px;">Product Information-Part 4</h3></th>
        </tr>
        <tr>
            <th><label for="product-part4-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part4-title" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part4-subtitle"><?php esc_html_e('Sub Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-subtitle'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part4-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="product-part4-description"><?php esc_html_e('Description', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-description'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="product-part4-description" ><?php $mb->the_value(); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="product-part4-image"><?php esc_html_e('Image Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('part4-image'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="product-part4-image"/>
            </td>
        </tr>
    </tbody>
</table>
</div>-->