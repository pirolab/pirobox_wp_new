carousel
<br/>

<script>
    if( piroboxCarousel === undefined  || piroboxCarousel === NULL ){
        var piroboxCarousel = {};
    } 
    piroboxCarousel.<?php echo 'carouselID_45'; ?>  =  {
                gallery_id : <?php echo $atts['gallery_id'] ?>,
                shadow: '<?php echo $atts['shadow'] ?>',
                columns: <?php echo $atts['columns'] ?>,
                carousel_height: <?php echo $atts['carousel_height'] ?>,
                speed_animation: <?php echo $atts['speed_animation'] ?>,
                animation_delay: <?php echo $atts['animation_delay'] ?>,
                control_position: '<?php echo $atts['control_position'] ?>',
                autoplay: '<?php echo $atts['autoplay'] ?>',
                pagination: '<?php echo $atts['pagination'] ?>'
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
