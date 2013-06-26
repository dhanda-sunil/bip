<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
    <tbody>
            <?php $ricariche =  get_posts(array('post_type' => 'ricariche')); if (empty($ricariche)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some ricariche items <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=ricariche')); ?>
                </th>
            </tr>
            <?php endif; ?>
            
			<tr>
                <th><label for="ricariche-id"><?php esc_html_e('Choose ricariche', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('id'); ?>
                    <select name="<?php $mb->the_name(); ?>" id="ricariche-id">
                    	<option value="">Choose ricariche</option> 
                    	<?php foreach($ricariche as $ricarich):?>
                        <option value="<?php echo $ricarich->ID?>"><?php echo $ricarich->post_title?></option>
                        <?php endforeach;?>
                    </select>
                    <p class="description">
                        <?php esc_html_e('Choose a ricariche from above dropdown for option detail or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="ricariche-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('limit'); ?>
                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="ricariche-limit"/>
                    <p class="description">
                        <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
    </tbody>
</table>
    <p class="alignleft">
        <input id="insert-ricariche" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
