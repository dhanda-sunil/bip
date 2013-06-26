<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
            <?php $tariff_tables =  get_posts(array('post_type' => 'tariff_table')); 
			if (empty($tariff_tables)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some tariff tables <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=tariff_table')); ?>
                </th>
            </tr>
            <?php endif; ?>
            
			<tr>
                <th><label for="tariff-table-id"><?php esc_html_e('Choose Tariff Table', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('id'); ?>
                    <select name="<?php $mb->the_name(); ?>" id="tariff-table-id">
                    	<option value="">Choose Tariff Table</option> 
                    	<?php foreach($tariff_tables as $tariff_table):?>
                        <option value="<?php echo $tariff_table->ID?>"><?php echo $tariff_table->post_title?></option>
                        <?php endforeach;?>
                    </select>
                    <p class="description">
                        <?php esc_html_e('Choose a Tariff Table from above dropdown for tariff table detail or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="tariff-table-state"><?php esc_html_e('Table State', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('state'); ?>
                    <input type="checkbox" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-table-state">
                    <p class="description">
                        <?php esc_html_e('Cheched Table will be shown open', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="tariff-table-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('limit'); ?>
                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tariff-table-limit"/>
                    <p class="description">
                        <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-tariff-tables" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
