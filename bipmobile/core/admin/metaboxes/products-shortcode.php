<div class="my_meta_control bip-shortcode-metabox">
<table class="form-table">
	<tbody>
            <?php $products =  get_posts(array('post_type' => 'product'));
			if (empty($products)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some products <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=products')); ?>
                </th>
            </tr>
            <?php endif; ?>
            
			<tr>
                <th><label for="products-id"><?php /*var_dump($products);*/ esc_html_e('Choose Product', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('id'); ?>
                    <select name="<?php $mb->the_name(); ?>" id="products-id">
                    	<option value="">Choose Product</option> 
                    	<?php foreach($products as $product):?>
                        <option value="<?php echo $product->ID?>"><?php echo $product->post_title?></option>
                        <?php endforeach;?>
                    </select>
                    <p class="description">
                        <?php esc_html_e('Choose a product from above dropdown for product detail or leave blank to show all products', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="products-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('limit'); ?>
                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="products-limit"/>
                    <p class="description">
                        <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            
	</tbody>
</table>
    <p class="alignleft">
        <input id="insert-products" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
