<table> 
    <tr valign="top" class="data-row">
        <th class="metabox_label_column">
            <label for="meta_a">Gallery</label>
        </th>
        <td>
            <textarea id="pirobox-gallery-objects-array" name="gallery_object_array" >
                <?php
                $gallery_array = get_post_meta($post->ID, 'gallery_object_array', true);
                echo $gallery_array;
                ?>
            </textarea>
        </td>
    </tr>      

    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_a">Add an element</label>
        </th>
        <td>
            <a href="#" id="insert-image-button" class="button" title="Add Image"><span class="wp-media-buttons-icon"></span> Add Image</a>
            <a href="#" id="insert-video-button" class="button" title="Add Video"><span class="wp-media-buttons-icon"></span> Add Video</a>
            <a href="#" id="insert-map-button" class="button" title="Add Map"><span class="wp-media-buttons-icon"></span> Add Map</a>
        </td>
    </tr>      

    <tr valign="top" class="visual-data-row">
        <td colspan="2" >
            <?php
            if ($gallery_array != '') {
                $gallery_array_decoded = json_decode($gallery_array);
                //print_r($gallery_array_decoded);


                echo '<ul id="sortable-gallery-list" class="ui-sortable">';

                foreach ($gallery_array_decoded as $key => $value) {
                    $type = $value->type;
                    $title = $value->title;
                    $id = $value->details;
                    $description = $value->description;

                    if ($type == 'image') {
                        $thumb = wp_get_attachment_image( $id, 'thumbnail', false, array('class' => 'imgPrev') );
                    } else {
                        $thumb = '<img src="' . plugins_url('../images/empty.jpg', __FILE__). '" class="imgPrev" />';
                    }

                    echo '<li class="" data-id="' . $id . '" data-type="' . $type . '"><span class="icon updown">&nbsp;</span>' .
                     $thumb . '<span class="icon ' . $type . '"> #' . $id . '</span>' . $title . '<span class="icon edit">&nbsp;</span>' .
                    '<div class="element-detail">' .
                    '<label for="pb_meta[title][' . $id . ']">Titolo  immagine<input type="text" placeholder="Inserisci il titolo dell\'immagine" name="pb_meta[title][' . $id . ']" value="' . $title . '"></label>' .
                    '<label for="pb_meta[description][' . $id . ']" style="position:relative;">Scrivi una descrizione<textarea placeholder="Scrivi una descrizione" maxlength="150" class="pb_description" name="pb_meta[description][' . $id . ']">' . $description . '</textarea></label>' .
                    '<input name="save" type="submit" class="button button-primary button-large" value="Update"><input name="save" type="submit" class="button button-large" value="Close"></div><span class="icon delete">&nbsp;</span></li>';
                }

                echo '</ul>';
            }
            ?>                        
        </td>
    </tr>      


</table>
