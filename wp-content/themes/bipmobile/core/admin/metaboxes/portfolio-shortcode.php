<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
            <?php $portfolio =  get_posts(array('post_type' => 'portfolio')); if (empty($portfolio)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some portfolio items <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=portfolio')); ?>
                </th>
            </tr>
            <?php endif; ?>
                <tr>
                    <th><label for="portfolio-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('limit'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="portfolio-limit"/>
                        <p class="description">
                            <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                        </p>
                    </td>
                </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-portfolio" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
