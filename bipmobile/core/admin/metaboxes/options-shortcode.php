<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
            <?php $options =  get_posts(array('post_type' => 'option')); if (empty($options)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some option items <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=option')); ?>
                </th>
            </tr>
            <?php endif; ?>
            
			<tr>
                <th><label for="options-id"><?php esc_html_e('Choose Option', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('id'); ?>
                    <select name="<?php $mb->the_name(); ?>" id="options-id">
                    	<option value="">Choose Option</option> 
                    	<?php foreach($options as $option):?>
                        <option value="<?php echo $option->ID?>"><?php echo $option->post_title?></option>
                        <?php endforeach;?>
                    </select>
                    <p class="description">
                        <?php esc_html_e('Choose a option from above dropdown for option detail or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="options-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('limit'); ?>
                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="options-limit"/>
                    <p class="description">
                        <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-options" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
