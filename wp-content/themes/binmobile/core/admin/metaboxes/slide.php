<div class="my_meta_control">
    <table class="form-table">
        <tbody>
                    <tr>
                        <th><label for="slide-link"><?php esc_html_e('Link', BIP_DOMAIN); ?></label></th>
                        <td>
                            <?php $mb->the_field('link'); ?>
                            <input type="text" value="<?php $mb->the_value(); ?>" name="<?php $mb->the_name(); ?>" id="slide-link"/>
                            <p class="description">
                                <?php esc_html_e('&laquo;http://&raquo; prefix required', BIP_DOMAIN) ?>
                            </p>
                        </td>
                    </tr>
        </tbody>
    </table>
</div>
