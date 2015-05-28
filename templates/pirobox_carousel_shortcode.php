carousel
<br/>
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
