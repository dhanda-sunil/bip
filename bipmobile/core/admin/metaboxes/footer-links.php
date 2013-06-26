<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="footerLink"><?php esc_html_e('Link', BIP_DOMAIN); ?></label></th>
            <td>
				<?php $mb->the_field('link'); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" id="footerLink"/>
            </td>
        </tr>
        <tr>
            <th><label for="footerLinkCategory"><?php esc_html_e('Category', BIP_DOMAIN); ?></label></th>
            <td class="image-size">
                <?php $mb->the_field('category'); ?>
                <?php foreach (getFooterCategories() as $category) : ?>
                    <label>
                        <input id="tariff-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($category)) ?> value="<?php echo esc_attr($category); ?>" />
                        <em><?php echo esc_html($category); ?></em>
                    </label>
                    <br/>
                <?php endforeach; ?>
            </td>
        </tr>
    </tbody>
</table>
</div>