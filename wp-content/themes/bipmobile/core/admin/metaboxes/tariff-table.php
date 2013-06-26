<div class="my_meta_control">
<table class="form-table">
    <tbody>
    	<tr>
        	<td colspan="2">
				<?php $mb->the_field('tt_items'); $items =  $mb->get_the_value();?>
                <input type="hidden" value="<?php echo ($items)?$items:1; ?>" name="<?php $mb->the_name(); ?>" id="tt-items" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-columns"><?php esc_html_e('Number of Columns', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('tt_columns'); $columns =  $mb->get_the_value(); ?>
                <input type="text" value="<?php echo ($columns)?$columns:3; ?>" name="<?php $mb->the_name(); ?>" id="tt-columns" />
                <p class="description">
					<?php esc_html_e('Enter Number of Columns(2 or 3 or 4) here and fill the column name below and leave blank others', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="tt-state"><?php esc_html_e('Default State', BIP_DOMAIN); ?></label></th>
            <td class="image-size">
                <?php $mb->the_field('tt_state'); $stats = array('Open', 'Close');?>
                <?php foreach ($stats  as $state) : ?>
                    <label style="display:inline; margin-right:20px;">
                        <input id="tariff-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($state)) ?> value="<?php echo esc_attr($state); ?>" />
                        <em><?php echo esc_html($state); ?></em>
                    </label>
                <?php endforeach; ?>
            </td>
        </tr>
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
            <th><label for="tt-column4-name"><?php esc_html_e('Column 4 Name', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('column4-name'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-column4-name" />
            </td>
        </tr>
        <?php if($items){
			for($i=1; $i<=$items; $i++){
				?>
                <tr>
                    <th colspan="2"><h3 style="cursor:auto; margin:0px;"><span style="display:inline-block;">Item <?php echo $i;?></span><!--<div style="float:right;cursor:pointer;" onclick="deleteItem(<?php echo $i;?>);">Delete</div>--></h3></th>
                </tr>
                <tr>
                    <th><label for="tt-item<?php echo $i;?>-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_title'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-title" />
                    </td>
                </tr>
                <tr>
                    <th><label for="tt-item<?php echo $i;?>-column1"><?php esc_html_e('First Column item', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_column1'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-column1" />
                    </td>
                </tr>
                <tr>
                    <th><label for="tt-item<?php echo $i;?>-column2"><?php esc_html_e('Second Column item', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_column2'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-column2" />
                    </td>
                </tr>
                <tr>
                    <th><label for="tt-item<?php echo $i;?>-column3"><?php esc_html_e('Third Column item', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_column3'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-column3" />
                    </td>
                </tr>
                <tr>
                    <th><label for="tt-item<?php echo $i;?>-column4"><?php esc_html_e('Fourth Column item', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_column4'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-column4" />
                    </td>
                </tr>
                <tr>
                    <th><label for="tt-item<?php echo $i;?>-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_button_text'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-button-text" />
                    </td>
                </tr>
                <tr class="last_tr_<?php echo $i;?>">
                    <th><label for="tt-item<?php echo $i;?>-button-link"><?php esc_html_e('Button Link', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('item_'.$i.'_button_link'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item<?php echo $i;?>-button-link" />
                        <p class="description">
                            <?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;
                            <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                        </p>
                    </td>
                </tr>
                <?php
				}
				?>
		<?php }else{ ?>
       	<tr>
        	<th colspan="2"><h3 style="cursor:auto; margin:0px;"><span>Item 1</span></h3></th>
        </tr>
        <tr>
            <th><label for="tt-item1-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-title" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column1"><?php esc_html_e('First Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_column1'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column1" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column2"><?php esc_html_e('Second Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_column2'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column2" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column3"><?php esc_html_e('Third Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_column3'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column3" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-column4"><?php esc_html_e('Fourth Column item', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_column4'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-column4" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_button_text'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-button-text" />
            </td>
        </tr>
        <tr>
            <th><label for="tt-item1-button-link"><?php esc_html_e('Button Link', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('item_1_button_link'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="tt-item1-button-link" />
                <p class="description">
                    <?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;
                    <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                </p>
            </td>
        </tr>
        <?php }?>
        <tr id="addMoreItemTr">
            <th colspan="2"><div id="addMoreItem" class="btn pull-right" >Add More</div></th>
        </tr>
    </tbody>
</table>
<script>
	jQuery(document).ready(function($){
		$('#addMoreItem').click(function(){
			var i		= parseInt($('#tt-items').val())+1;
			var content	= '<tr>'+
			'<th colspan="2"><h3 style="cursor:auto; margin:0px;"><span>Item '+i+'</span></h3></th>'+
        '</tr>'+
		'<tr>'+
            '<th><label for="tt-item'+i+'-title"><?php esc_html_e('Title', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_title]" id="tt-item'+i+'-title" />'+
            '</td>'+
        '</tr>'+
        '<tr>'+
            '<th><label for="tt-item'+i+'-column1"><?php esc_html_e('First Column item', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_column1]" id="tt-item'+i+'-column1" />'+
            '</td>'+
        '</tr>'+
        '<tr>'+
            '<th><label for="tt-item'+i+'-column2"><?php esc_html_e('Second Column item', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_column2]" id="tt-item'+i+'-column2" />'+
            '</td>'+
        '</tr>'+
        '<tr>'+
            '<th><label for="tt-item'+i+'-column3"><?php esc_html_e('Third Column item', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_column3]" id="tt-item'+i+'-column3" />'+
            '</td>'+
        '</tr>'+
		'<tr>'+
			'<th><label for="tt-item<?php echo $i;?>-column4"><?php esc_html_e('Fourth Column item', BIP_DOMAIN); ?></label></th>'+
			'<td>'+
				'<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_column4]" id="tt-item'+i+'-column4" />'+
			'</td>'+
		'</tr>'+
        '<tr>'+
            '<th><label for="tt-item'+i+'-button-text"><?php esc_html_e('Button Text', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_button_text]" id="tt-item'+i+'-button-text" />'+
            '</td>'+
        '</tr>'+
        '<tr>'+
            '<th><label for="tt-item'+i+'-button-link"><?php esc_html_e('Button Link', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[item_'+i+'_button_link]" id="tt-item'+i+'-button-link" />'+
                '<p class="description">'+
                    '<?php esc_html_e('Description link', BIP_DOMAIN) ?>>&nbsp;'+
                    '<?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>'+
                '</p>'+
            '</td>'+
        '</tr>';
			
			$('#addMoreItemTr').before(content);
			$('#tt-items').val(i);
			
		});
	});
</script>
</div>