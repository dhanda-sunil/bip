<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="portfolio-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('title'); ?>
                <input id="portfolio-title" type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" />
                <p class="description">
                    Leave this field blank if you want to use post title
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="portfolio-product"><?php esc_html_e('Product', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('product'); ?>
                <input id="portfolio-product" type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="portfolio-year"><?php esc_html_e('Year', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('year'); ?>
                <input id="portfolio-year" type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="portfolio-tariffs"><?php esc_html_e('Tariffs', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('tariffs'); ?>
                <input id="portfolio-tariffs" type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" />
            </td>
        </tr>
    </tbody>
</table>
<div id="portfolio-item-fields"></div>
</div>
