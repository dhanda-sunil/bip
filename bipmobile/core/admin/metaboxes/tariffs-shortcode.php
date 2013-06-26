<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
            <?php $tariffs =  get_posts(array('post_type' => 'tariff')); if (empty($tariffs)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some tariff items <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=tariff')); ?>
                </th>
            </tr>
            <?php endif; ?>
            
			<tr>
                <th><label for="tariffs-id"><?php esc_html_e('Choose Tariff', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('id'); ?>
                    <select name="<?php $mb->the_name(); ?>" id="tariffs-id">
                    	<option value="">Choose Tariff</option> 
                    	<?php foreach($tariffs as $tariff):?>
                        <option value="<?php echo $tariff->ID?>"><?php echo $tariff->post_title?></option>
                        <?php endforeach;?>
                    </select>
                    <p class="description">
                        <?php esc_html_e('Choose a tariff from above dropdown for tariff detail or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="tariffs-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('limit'); ?>
                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariffs-limit"/>
                    <p class="description">
                        <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-tariffs" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
