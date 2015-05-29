jQuery(function($) {
    $('#pb_shortcode_generator  .form-button').click(function(){
        event.preventDefault();
        $('#pb_shortcode_generator .form-button').removeClass('selected');
        $(this).addClass('selected');
        
        $('.gallery-form, .slider-form, .carousel-form').css({display: 'none'});
        $('.' + $(this).data('form') + '-form, .title-form').css({display: 'block'});
    });
    
    $('#pb_generate_output').click(function(){
        stringShortcode = '[';
        
        if( $('#gallery-form-button').hasClass('selected') ){
            valOBj = {
                gallery_id : 112,
                columns: 3,
                shadow: 'true'
            };
            stringShortcode = stringShortcode + 'pirobox_gallery ';
            stringShortcode = stringShortcode + 'gallery_id=' + $('#pb_gallery_gallery_id').val() + ' ';
            
            if ( $('#pb_gallery_columns').val() != valOBj.columns )                
                stringShortcode = stringShortcode + 'columns=' + $('#pb_gallery_columns').val() + ' ';
            
            if ( $('#pb_gallery_shadow').val() != valOBj.shadow )
                stringShortcode = stringShortcode + 'shadow=' + $('#pb_gallery_shadow').val() + ' ';
             
        } else if( $('#slider-form-button').hasClass('selected') ){
            valOBj = {
                gallery_id : 112,
                shadow: 'true',
                slider_height: 350,
                speed_animation: 1000,
                animation_delay: 1500,
                control_position: 'bottom',
                autoplay: 'true',
                pagination: 'false'
            };
            stringShortcode = stringShortcode + 'pirobox_slider ';
            stringShortcode = stringShortcode + 'gallery_id=' + $('#pb_slider_gallery_id').val() + ' ';
            
            
            if ( $('#pb_slider_shadow').val() != valOBj.shadow )
                stringShortcode = stringShortcode + ' shadow=' + $('#pb_slider_shadow').val() + ' ';
            
            if ( $('#pb_slider_height').val() != valOBj.slider_height )
                stringShortcode = stringShortcode + ' slider_height=' + $('#pb_slider_height').val() + ' ';
            
            if ( $('#pb_slider_animation_duration').val() != valOBj.speed_animation )
                stringShortcode = stringShortcode + ' speed_animation=' + $('#pb_slider_animation_duration').val() + ' ';
            
            
            if ( $('#pb_slider_autoplay_delay').val() != valOBj.animation_delay )
                stringShortcode = stringShortcode + ' animation_delay=' + $('#pb_slider_autoplay_delay').val() + ' ';
            
           if ( !$('#pb_slider_autoplay').attr('checked') )
                stringShortcode = stringShortcode + ' autoplay=' + $('#pb_slider_autoplay').val() + ' ';
           
            if ( $('#pb_slider_pagination').attr('checked') )
                stringShortcode = stringShortcode + ' pagination=' + $('#pb_slider_pagination').val() + ' ';
            
        }else{
            valOBj = {
                gallery_id : 112,
                shadow: 'true',
                columns: 3,
                carousel_height: 220,
                speed_animation: 1000,
                animation_delay: 1500,
                control_position: 'bottom',
                autoplay: 'true',
                pagination: 'false'
            };
            
            stringShortcode = stringShortcode + 'pirobox_carousel ';
            stringShortcode = stringShortcode + 'gallery_id=' + $('#pb_carousel_gallery_id').val() + ' ';
            
            if ( $('#pb_carousel_shadow').val() != valOBj.shadow )
                stringShortcode = stringShortcode + ' shadow=' + $('#pb_carousel_shadow').val() + ' ';
                
            
            if ( $('#pb_carousel_columns').val() != valOBj.columns )
                stringShortcode = stringShortcode + ' columns=' + $('#pb_carousel_columns').val() + ' ';
            
            if ( $('#pb_carousel_height').val() != valOBj.carousel_height )
                stringShortcode = stringShortcode + ' carousel_height=' + $('#pb_carousel_height').val() + ' ';
            
            if ( $('#pb_carousel_animation_duration').val() != valOBj.speed_animation )
                stringShortcode = stringShortcode + ' speed_animation=' + $('#pb_carousel_animation_duration').val() + ' ';
             
            if ( $('#pb_carousel_autoplay_delay').val() != valOBj.animation_delay )
                stringShortcode = stringShortcode + ' animation_delay=' + $('#pb_carousel_autoplay_delay').val() + ' ';
           
            if ( !$('#pb_carousel_autoplay').attr('checked') )
                stringShortcode = stringShortcode + ' autoplay=' + $('#pb_carousel_autoplay').val() + ' ';
            
            if ( $('#pb_carousel_pagination').attr('checked') )
                stringShortcode = stringShortcode + ' pagination=' + $('#pb_carousel_pagination').val() + ' ';
            
        }    
        
        stringShortcode = stringShortcode + ']';
        $('#pb_output').val(stringShortcode);
    });
});