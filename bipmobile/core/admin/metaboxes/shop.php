<div class="my_meta_control">
<table class="form-table">
    <tbody>
        <tr>
            <th><label for="logoLink"><?php esc_html_e('Logo Link', BIP_DOMAIN); ?></label></th>
            <td>
				<?php $mb->the_field('logoLink'); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="logoLink" id="logoLink"/>
            </td>
        </tr>
        <tr>
            <th><label for="shopName"><?php esc_html_e('Name', BIP_DOMAIN); ?></label></th>
            <td>
				<?php $mb->the_field('shopName'); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="shopName" id="shopName"/>
            </td>
        </tr>
        <tr>
            <th><label for="address"><?php esc_html_e('Address', BIP_DOMAIN); ?></label></th>
            <td>
				<?php $mb->the_field('address'); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="address" id="address"/>
            </td>
        </tr>
        <tr>
            <th><label for="phone"><?php esc_html_e('Phone Number', BIP_DOMAIN); ?></label></th>
            <td>
				<?php $mb->the_field('phone'); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="phone" id="phone"/>
            </td>
        </tr>
        <tr>
            <th><label for="opening"><?php esc_html_e('Opening Hours', BIP_DOMAIN); ?></label></th>
            <td>
				<?php $mb->the_field('opening'); ?>
                <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="opening" id="opening"/>
                <p class="description">
                    <?php esc_html_e('Use comma(,) to separate multiple opening hours.', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
</div>