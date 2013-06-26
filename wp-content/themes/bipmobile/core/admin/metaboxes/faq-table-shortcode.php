<div class="my_meta_control bip-shortcode-metabox">
    <table class="form-table">
        <tbody>
            <?php $faq_tables =  get_posts(array('post_type' => 'faq_table')); 
            if (empty($faq_tables)) : ?>
            <tr>
                <th colspan="2">
                    <?php printf(__('Please add some faq tables <a href="%s">here</a> before continue shortcode generating.', BIP_DOMAIN), admin_url('post-new.php?post_type=faq_table')); ?>
                </th>
            </tr>
            <?php endif; ?>
            
            <tr>
                <th><label for="faq-table-id"><?php esc_html_e('Choose Faq Table', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('id'); ?>
                    <select name="<?php $mb->the_name(); ?>" id="faq-table-id">
                        <option value="">Choose Faq Table</option> 
                        <?php foreach($faq_tables as $faq_tables):?>
                        <option value="<?php echo $faq_tables->ID?>"><?php echo $faq_tables->post_title?></option>
                        <?php endforeach;?>
                    </select>
                    <p class="description">
                        <?php esc_html_e('Choose a Faq Table from above dropdown for faq table detail or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="faq-table-state"><?php esc_html_e('Table State', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('state'); ?>
                    <input type="checkbox" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="faq-table-state">
                    <p class="description">
                        <?php esc_html_e('Cheched Table will be shown open', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="faq-table-limit"><?php esc_html_e('Number of Items', BIP_DOMAIN); ?></label></th>
                <td>
                    <?php $mb->the_field('limit'); ?>
                    <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="faq-table-limit"/>
                    <p class="description">
                        <?php esc_html_e('Use "-1" or leave blank to show all items', BIP_DOMAIN) ?>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="alignleft">
        <input id="insert-faq-tables" type="button" value="<?php esc_attr_e('Insert Shortcode', BIP_DOMAIN) ?>" class="button button-highlighted" />
    </p>
    <div class="clear"></div>
</div>
