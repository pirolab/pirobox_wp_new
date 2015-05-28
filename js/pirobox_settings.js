jQuery(document).ready(function($) {

    $('.color-picker-preview').bind('pbchange', function(){
        $(this).css({backgroundColor: $(this).parent().find('input[type=text]').val() });
    }).trigger('pbchange');
    
    // color-picker init
    $('.pb-color-picker-field').iris({
        change: function(event, ui) {
            $(this).parent()
                    .find('.color-picker-preview, input').trigger('pbchange');
        },
        palettes: true
    }).click(function() {
        $(this).iris('show');
        $('.pb-color-picker-field').not(this).iris('hide');
    });

    // range init
    $('.pb-range-field').each(function() {
        select = $(this);
        $("<div class='wp-slider'></div>").insertAfter(select).slider({
                min: select.data('min'), 
                max: select.data('max'), 
                value: select.val(),
                step: select.data('step'),
                animate: true,
                range: "min",
                stop: function( event, ui ) { $(this).parent().find('select').val( ui.value ).trigger("pbchange");   }
        }).prepend('<span class="ui-slider-inner-label range-min">'+select.data('min')+ select.data('unity') + '</span>')
        .append('<span class="ui-slider-inner-label range-max">'+select.data('max')+ select.data('unity') + '</span>');   ;
        
        select.change( function(){
            $(this).parent().find('.wp-slider').slider( "value", $(this).val() );
        });
    });
    
    // restore defaults
    $('#submit').after('<input type="submit" name="restore" id="restore-defaults" class="button action" value="Restore Defaults">');
    $('input.button.action').click( function(event){
        event.preventDefault();
        $('input[type=text], select').each( function(){
            $(this).val($(this).data('default'));
        }).add('.color-picker-preview').trigger('pbchange').trigger('change');
    });

    function hexToRgb(hex, opacity) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return  'rgba(' + parseInt(result[1], 16) + ', ' + parseInt(result[2], 16) + ', ' + parseInt(result[3], 16) + ', ' + (opacity/100) + ')';
    }
    
    // update preview
    $('#pb_base_color').on('pbchange', function(){
        $('#piro_close_fake.piro_close_fake').css({ backgroundColor : $(this).val() });
    });
    $('#pb_box_color, #pb_box_border_opacity').on('pbchange', function(){
        $('#pb_test_lightbox').css({ backgroundColor : hexToRgb( $('#pb_box_color').val(), $('#pb_box_border_opacity').val() ) });
    });
    $('#pb_box_border_width').on('pbchange', function(){
        $('#pb_test_lightbox, #pb_test_lightbox_container').css({ padding : $(this).val()+'px' });
    });
    $('#pb_box_border_radius').on('pbchange', function(){
        $('#pb_test_lightbox, #pb_test_lightbox img').css({ borderRadius : $(this).val()+'px' });
    });
    $('#pb_shadow_color, #pb_shadow_width, #pb_shadow_opacity').on('pbchange', function(){
        $('#pb_test_lightbox').css({ boxShadow : hexToRgb( $('#pb_shadow_color').val(), $('#pb_shadow_opacity').val() ) + ' 0px 0px ' + $('#pb_shadow_width').val() + 'px' });
    });
    $('#pb_background_color, #pb_background_opacity').on('pbchange', function(){
        $('#pb_test_overlay').css({ backgroundColor : hexToRgb( $('#pb_background_color').val(), $('#pb_background_opacity').val() ) });
    });
    
    $('#pb_base_color, #pb_box_color, #pb_box_border_opacity, #pb_box_border_width, #pb_box_border_radius, #pb_shadow_color, #pb_shadow_width, #pb_shadow_opacity, #pb_background_color, #pb_background_opacity, .color-picker-preview').trigger("pbchange");
});