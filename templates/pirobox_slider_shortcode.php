slider
<br/>

<script>
    if( piroboxSlider === undefined  || piroboxSlider === NULL ){
        var piroboxSlider = {};
    } 
    piroboxSlider.<?php echo 'pb_slider_'.get_the_ID().'_'.$atts['gallery_id']; ?>  =  {
                gallery_id : <?php echo $atts['gallery_id'] ?>,
                shadow: '<?php echo $atts['shadow'] ?>',
                slider_height: <?php echo $atts['slider_height'] ?>,
                speed_animation: <?php echo $atts['speed_animation'] ?>,
                animation_delay: <?php echo $atts['animation_delay'] ?>,
                control_position: '<?php echo $atts['control_position'] ?>',
                autoplay: '<?php echo $atts['autoplay'] ?>',
                pagination: '<?php echo $atts['pagination'] ?>',
            };
</script>

<?php
if( !function_exists ( 'vt_resize' ) ){
    include 'image_resize_custom.php';
}

$objects = json_decode($gallery_post['gallery_object_array'][0]);

foreach ($objects as $obj) {
    //print_r($obj);

    if ($obj->type == 'image') {
        $image_attributes = wp_get_attachment_url($obj->details);
        $image = vt_resize( '', $image_attributes , 300, 350, true );
 
 
        print '<img src="' . $image['url'] . '">';
    }
    //print_r('<br/>');
}


print_r('<br/>');
print_r($atts);
?>
<br/>
<br/>
<br/>
