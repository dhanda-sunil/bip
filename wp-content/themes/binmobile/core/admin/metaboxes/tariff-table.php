<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="tt-column1-name"><?php esc_html_e('Column 1 Name', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('column1-name'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-column1-name" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-column2-name"><?php esc_html_e('Column 2 Name', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('column2-name'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-column2-name" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-column3-name"><?php esc_html_e('Column 3 Name', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('column3-name'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-column3-name" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item1["title"]'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-part1-subtitle" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column1"><?php esc_html_e('First Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item1["column1"]'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column1" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column2"><?php esc_html_e('Second Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item1["column2"]'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column2" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column3"><?php esc_html_e('Third Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item1["column3"]'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column3" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item1["button_text"]'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-button-text" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-button-link"><?php esc_html_e('Button Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item1["button_link"]'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-button-link" />
                <p class="description">
                    <?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
</div>