<?php
$generate_ms_options = create_function('', '
                $options = array();
                for ($i=1; $i<=20; $i++) {
                        $ms = $i*500;
                        $options[$ms] = number_format($ms/1000, 1);
                }
                return $options;
');
?>
<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
                <tr>
                    <th><label><?php esc_html_e('Slides', BIP_DOMAIN); ?></th>
                    <td>
                        <?php $mb->the_field('slides'); ?>
                        <?php
                        $args = array('numberposts' => '-1', 'post_type' => 'slides');
                        $slides = get_posts($args);
                        if (!empty($slides)) :
                        ?>
                        <input type="checkbox" value="all" <?php $mb->the_checkbox_state(NULL); ?> name="<?php $mb->the_name(); ?>" id="slides-all"/>&nbsp;<label for="slides-all"><?php esc_html_e('All Slides', BIP_DOMAIN); ?></label>
                        <br />
                        <select name="<?php $mb->the_name(); ?>" multiple="multiple" id="slides" class="hidden">
                        <?php
                        foreach ( $slides as $post ) {
                            echo '<option value="'.$post->ID.'">' . $post->post_title . '</option>';
                        }
                        ?>
                        </select>
                        <?php else : ?>
                            <?php printf(__('Please add a couple of slides <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=slides')); ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="slider-animation"><?php esc_html_e('Animation', BIP_DOMAIN); ?></th>
                    <td>
                        <?php $mb->the_field('animation'); ?>
                        <select name="<?php $mb->the_name(); ?>" id="slider-animation">
                            <option <?php $mb->the_select_state('fade'); ?> value="fade"><?php esc_html_e('Fade', BIP_DOMAIN); ?></option>
                            <option <?php $mb->the_select_state('slide'); ?> value="slide"><?php esc_html_e('Slide', BIP_DOMAIN); ?></option>
                            <option <?php $mb->the_select_state('show'); ?> value="fade"><?php esc_html_e('Show', BIP_DOMAIN); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="slideshow-speed"><?php esc_html_e('Slideshow Speed', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('speed'); ?>
                        <select name="<?php $mb->the_name(); ?>" id="slideshow-speed">
                        <?php foreach(call_user_func($generate_ms_options) as $ms => $number) : ?>
                            <option <?php $mb->the_select_state($ms); ?> value="<?php echo esc_attr($ms); ?>"><?php echo esc_html($number); ?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="animation-delay"><?php esc_html_e('Animation Delay', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('delay'); ?>
                        <select name="<?php $mb->the_name(); ?>" id="animation-delay">
                        <?php foreach(call_user_func($generate_ms_options) as $ms => $number) : ?>
                            <option <?php $mb->the_select_state($ms); ?> value="<?php echo esc_attr($ms); ?>"><?php echo esc_html($number); ?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="slider-autoplay"><?php esc_html_e('Play Slideshow Automatically', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('autoplay'); ?>
                        <input type="checkbox" value="1" <?php $mb->the_checkbox_state(NULL); ?> name="<?php $mb->the_name(); ?>" id="slider-autoplay"/>
                    </td>
                </tr>
                <tr>
                    <th><label for="slider-image-size"><?php esc_html_e('Image Size', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('image_size'); ?>
                        <?php foreach (BipCoreAdmin::getImageSizes() as $size) : ?>
                            <label>
                                <input class="slider-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($size['name'])) ?> value="<?php echo esc_attr($size['name']); ?>" />
                                <em><?php echo esc_html($size['name']); ?></em>&nbsp;<?php if (isset($size['width']) && isset($size['height'])) : ?>(<?php echo esc_html($size['width']); ?>x<?php echo esc_html($size['height']); ?><?php if ($size['crop']) echo '&nbsp;' . esc_html(__('cropped', BIP_DOMAIN)); ?>)<?php endif; ?>
                            </label>
                            <br/>
                        <?php endforeach; ?>
                            <p class="description">
                                <?php esc_html_e('If you want to use full size images then leave this field blank', BIP_DOMAIN); ?>
                            </p>
                    </td>
                </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-slider" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
