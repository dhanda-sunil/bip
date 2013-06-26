jQuery(document).ready( function($) {
    $.each(bipPointers.pointers, function(i, pointer){
        var options = $.extend({}, pointer.options, {
            close: function() {
                $.post( ajaxurl, {
                    pointer: pointer.pointer_id,
                    action: 'dismiss-wp-pointer'
                });
            }
        });
        $(pointer.target).pointer( options ).pointer('open');
    });
});