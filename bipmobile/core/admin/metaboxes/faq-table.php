<div class="my_meta_control">
<table class="form-table">
    <tbody>
    	<tr>
        	<td colspan="2">
				<?php $mb->the_field('ft_items'); $items =  $mb->get_the_value();?>
                <input type="hidden" value="<?php echo ($items)?$items:1; ?>" name="<?php $mb->the_name(); ?>" id="ft-items" />
            </td>
        </tr>
        <tr>
            <th><label for="ft-state"><?php esc_html_e('Default State', BIP_DOMAIN); ?></label></th>
            <td class="image-size">
                <?php $mb->the_field('ft_state'); $stats = array('Open', 'Close');?>
                <?php foreach ($stats  as $state) : ?>
                    <label style="display:inline; margin-right:20px;">
                        <input id="tariff-image-size" type="radio" name="<?php $mb->the_name(); ?>" <?php $mb->the_radio_state(esc_attr($state)) ?> value="<?php echo esc_attr($state); ?>" />
                        <em><?php echo esc_html($state); ?></em>
                    </label>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php if($items){
			for($i=1; $i<=$items; $i++){
				?>
                <tr>
                    <th colspan="2"><h3 style="cursor:auto; margin:0px;"><span style="display:inline-block;">Question <?php echo $i;?></span><!--<div style="float:right;cursor:pointer;" onclick="deleteItem(<?php echo $i;?>);">Delete</div>--></h3></th>
                </tr>
                <tr>
                    <th><label for="ft-item<?php echo $i;?>-title"><?php esc_html_e('Question', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('q_'.$i.'_title'); ?>
                        <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="ft-item<?php echo $i;?>-title" />
                    </td>
                </tr>
                <tr class="last_tr_<?php echo $i;?>">
                    <th><label for="ft-item<?php echo $i;?>-answer"><?php esc_html_e('Answer', BIP_DOMAIN); ?></label></th>
                    <td>
                        <?php $mb->the_field('q_'.$i.'_answer'); ?>
                        <textarea name="<?php $mb->the_name(); ?>" id="ft-item<?php echo $i;?>-answer" ><?php $mb->the_value(); ?></textarea>
                    </td>
                </tr>
                <?php
				}
				?>
		<?php }else{ ?>
       	<tr>
        	<th colspan="2"><h3 style="cursor:auto; margin:0px;"><span>Question 1</span></h3></th>
        </tr>
        <tr>
            <th><label for="ft-item1-title"><?php esc_html_e('Question', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('q_1_title'); ?>
                <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="ft-item1-title" />
            </td>
        </tr>
        <tr>
            <th><label for="ft-item1-answer"><?php esc_html_e('Answer', BIP_DOMAIN); ?></label></th>
            <td>
                <?php $mb->the_field('q_1_answer'); ?>
                <textarea name="<?php $mb->the_name(); ?>" id="ft-item1-answer" ><?php $mb->the_value(); ?></textarea>
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
			var i		= parseInt($('#ft-items').val())+1;
			var content	= '<tr>'+
			'<th colspan="2"><h3 style="cursor:auto; margin:0px;"><span>Question '+i+'</span></h3></th>'+
        '</tr>'+
		'<tr>'+
            '<th><label for="ft-item'+i+'-title"><?php esc_html_e('Question', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
                '<input type="text" value="" name="_BipCore_tariff_table[q_'+i+'_title]" id="ft-item'+i+'-title" />'+
            '</td>'+
        '</tr>'+
        '<tr>'+
            '<th><label for="ft-item'+i+'-answer"><?php esc_html_e('Answer', BIP_DOMAIN); ?></label></th>'+
            '<td>'+
				'<textarea name="_BipCore_tariff_table[q_'+i+'_answer]" id="ft-item'+i+'-answer" ></textarea>'+
            '</td>'+
        '</tr>';
			
			$('#addMoreItemTr').before(content);
			$('#ft-items').val(i);
			
		});
	});
</script>
</div>