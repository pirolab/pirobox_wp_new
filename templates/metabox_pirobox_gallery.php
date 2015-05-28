<table> 
    <tr valign="top">
        <th colspan="3" class="title" >
            Choose Pirobox Gallery display mode 
        </th>
    </tr>      
    <tr valign="top" class="choise">
        <td >
            <a class="preview button form-button" id="gallery-form-button" href="#" data-form="gallery">
                Gallery
                <img src="<?php echo plugins_url('../images/gallery.png', __FILE__); ?>" class="imgPrev" /></a>
        </td>
        <td >
            <a class="preview button form-button" id="slider-form-button" href="#" data-form="slider">Slider
                <img src="<?php echo plugins_url('../images/slider.png', __FILE__); ?>" class="imgPrev" /></a>
        </td>
        <td >
            <a class="preview button form-button" id="carousel-form-button" href="#" data-form="carousel">Carousel
                <img src="<?php echo plugins_url('../images/carousel.png', __FILE__); ?>" class="imgPrev" /></a>
        </td>
    </tr>      

    <tr valign="top">
        <th colspan="3" class="title title-form" >
            Options
        </th>
    </tr>   

    <!-- Gallery  -->
    <tr valign="top" class="gallery-form">
        <th>
            <label>Gallery ID</label>
        </th>
        <td colspan="2" >
            <?php $this->metabox_pirobox_form_gallery_id('gallery'); ?>
        </td>
    </tr>      
    <tr valign="top" class="gallery-form">
        <th>
            <label>Columns</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_column('gallery'); ?>
        </td>
    </tr>      
    <tr valign="top" class="gallery-form">
        <th>
            <label>Shadow</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_checkbox('gallery', 'shadow')?>            
        </td>
    </tr>      


    <!-- Slider  -->
    <tr valign="top" class="slider-form">
        <th>
            <label>Gallery ID</label>
        </th>
        <td colspan="2" >
            <?php $this->metabox_pirobox_form_gallery_id('slider'); ?>
        </td>
    </tr>      
    <tr valign="top" class="slider-form">
        <th>
            <label>Shadow</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_checkbox('slider', 'shadow')?>   
        </td>
    </tr>      
    <tr valign="top" class="slider-form">
        <th>
            <label>Slider Height</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_height('slider', 350); ?>
        </td>
    </tr>      
    <tr valign="top" class="slider-form">
        <th>
            <label>Speed Animation</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_animation_duration('slider'); ?>            
        </td>
    </tr>      
    <tr valign="top" class="slider-form">
        <th>
            <label>Animation delay</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_autoplay_delay('slider'); ?>            
        </td>
    </tr>   
    <tr valign="top" class="slider-form">
        <th>
            <label>Controls position</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_controls('slider'); ?>  
        </td>
    </tr>      
    <tr valign="top" class="slider-form">
        <th>
            <label>Autoplay</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_checkbox('slider', 'autoplay')?>   
        </td>
    </tr>      
    <tr valign="top" class="slider-form">
        <th>
            <label>Pagination</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_checkbox('slider', 'pagination', false)?>
        </td>
    </tr>      



    <!-- Carousel  -->
    <tr valign="top" class="carousel-form">
        <th>
            <label>Gallery ID</label>
        </th>
        <td colspan="2" >
            <?php $this->metabox_pirobox_form_gallery_id('carousel'); ?>
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Columns</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_column('carousel'); ?>
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Shadow</label>
        </th>
        <td colspan="2" >
           <?php  $this->metabox_pirobox_form_checkbox('carousel', 'shadow')?>
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Carousel Height</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_height('carousel', 220); ?>
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Speed Animation</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_animation_duration('carousel'); ?>            
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Animation delay</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_autoplay_delay('carousel'); ?>            
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Controls position</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_controls('carousel'); ?> 
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label>Autoplay</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_checkbox('carousel', 'autoplay')?>
        </td>
    </tr>      
    <tr valign="top" class="carousel-form">
        <th>
            <label for="pb_carousel_pagination">Pagination</label>
        </th>
        <td colspan="2" >
            <?php  $this->metabox_pirobox_form_checkbox('carousel', 'pagination', false)?>
        </td>
    </tr>
    
    
    <tr valign="top">
        <th colspan="3" class="title title-form" >
            Output
        </th>
    </tr>   
    <tr class="title-form">
        <td colspan="3">
            <input name="output" type="text" id="pb_output" value="" size="35" > 
        </td>
    </tr>
    <tr class="title-form">
        <td colspan="3">
          <span class="preview button button-primary" id="pb_generate_output">Preview Changes</span></td>
    </tr>


</table>
