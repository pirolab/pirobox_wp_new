jQuery(function($) {
    var frame = wp.media({frame: 'post'});
    frame.on('close', function() {
        var selection = frame.state().get('selection');
        if (!selection.length) {
            clearField();
        } else {
            var elementsList = createSortableList(),
                    elements = createList();

            selection.each(function(attachment) {
                id = attachment.attributes.id;

                if (elements.indexOf(id) == -1) {
                    title = attachment.attributes.title;
                    id = attachment.attributes.id;
                    caption = attachment.attributes.caption;
                    thumb = attachment.attributes.sizes.thumbnail.url;

                    elementsList.append('<li class="" data-id="' + id + '" data-type="image"><span class="icon updown">&nbsp;</span>' +
                            '<img src="' + thumb + '" class="imgPrev" /><span class="icon image"> #' + id + '</span>' + title + '<span class="icon edit">&nbsp;</span>' +
                            '<div class="element-detail">' +
                            '<label for="pb_meta[title][' + id + ']">Titolo  immagine<input type="text" placeholder="Inserisci il titolo dell\'immagine" name="pb_meta[title][' + id + ']" value="' + title + '"></label>' +
                            '<label for="pb_meta[description][' + id + ']" style="position:relative;">Scrivi una descrizione<textarea placeholder="Scrivi una descrizione" maxlength="150" class="pb_description" name="pb_meta[description][' + id + ']">' + caption + '</textarea></label>' +
                            '<input name="save" type="submit" class="button button-primary button-large" value="Update"><input name="save" type="submit" class="button button-large" value="Close"></div><span class="icon delete">&nbsp;</span></li>');
                }
            });
            elementsListSync();
        }
    });

    frame.on('select', function() {
        var state = frame.state();
        var selection = state.get('selection');
        if (!selection)
            return;

        //clearField();

        selection.each(function(attachment) {
            console.log(attachment.attributes);
        });
    });

    $('a#insert-image-button').click(function() {
        event.preventDefault();
        frame.open();
    });

    $('.icon.delete').live('click', function() {
        $(this).parents('li').remove();
        elementsListSync();
    });
    $('.icon.edit').live('click', function() {

        if ($(this).parents('li').find('.element-detail').css('display') == 'none') {
            $(this).parents('li').find('.element-detail').css({display: 'block'});
        } else {
            $(this).parents('li').find('.element-detail').css({display: 'none'});
        }

    });

    $('#insert-video-button').live('click', function() {
        getOverlay('video');
    });
    $('#insert-map-button').live('click', function() {
        getOverlay('map');
    });

    $('.map-video-overlay .media-modal-close').live('click', function() {
        $('.map-video-overlay, .media-modal-backdrop').remove();
    });

    $('.add-video.button').live('click', function() {
        title = $('#video_id').val();
        id = Math.round(Math.random()*100);
        caption = $('#video_url').val();
        thumb = '/wp-content/plugins/pirobox-wp/images/empty.jpg';

        elementsList = createSortableList(); 
        elementsList.append('<li class="" data-id="' + id + '" data-type="video"><span class="icon updown">&nbsp;</span>' +
                '<img src="' + thumb + '" class="imgPrev" /><span class="icon video"> #' + id + '</span>' + title + '<span class="icon edit">&nbsp;</span>' +
                '<div class="element-detail">' +
                '<label for="pb_meta[title][' + id + ']">Titolo  immagine<input type="text" placeholder="Inserisci il titolo dell\'immagine" name="pb_meta[title][' + id + ']" value="' + title + '"></label>' +
                '<label for="pb_meta[description][' + id + ']" style="position:relative;">Scrivi una descrizione<textarea placeholder="Scrivi una descrizione" maxlength="150" class="pb_description" name="pb_meta[description][' + id + ']">' + caption + '</textarea></label>' +
                '<input name="save" type="submit" class="button button-primary button-large" value="Update"><input name="save" type="submit" class="button button-large" value="Close"></div><span class="icon delete">&nbsp;</span></li>');


        elementsListSync();
        $('.map-video-overlay, .media-modal-backdrop').remove();
    });
    $('.add-map.button').live('click', function() {
        title = $('#map_id').val();
        id = Math.round(Math.random()*100);
        caption = $('#map_url').val();
        thumb = '/wp-content/plugins/pirobox-wp/images/empty.jpg';

        elementsList = createSortableList(); 
        elementsList.append('<li class="" data-id="' + id + '" data-type="map"><span class="icon updown">&nbsp;</span>' +
                '<img src="' + thumb + '" class="imgPrev" /><span class="icon map"> #' + id + '</span>' + title + '<span class="icon edit">&nbsp;</span>' +
                '<div class="element-detail">' +
                '<label for="pb_meta[title][' + id + ']">Titolo  immagine<input type="text" placeholder="Inserisci il titolo dell\'immagine" name="pb_meta[title][' + id + ']" value="' + title + '"></label>' +
                '<label for="pb_meta[description][' + id + ']" style="position:relative;">Scrivi una descrizione<textarea placeholder="Scrivi una descrizione" maxlength="150" class="pb_description" name="pb_meta[description][' + id + ']">' + caption + '</textarea></label>' +
                '<input name="save" type="submit" class="button button-primary button-large" value="Update"><input name="save" type="submit" class="button button-large" value="Close"></div><span class="icon delete">&nbsp;</span></li>');


        elementsListSync();
        $('.map-video-overlay, .media-modal-backdrop').remove();
    });


    function createSortableList() {
        if (!$("#sortable-gallery-list").length) {
            $('<ul id="sortable-gallery-list"></ul>').appendTo('.visual-data-row td');
            $('#sortable-gallery-list').sortable({
                stop: function(event, ui) {
                    elementsListSync();
                }
            });
        }

        return $("#sortable-gallery-list");
    }

    function createList() {
        var baseElement = {
            type: 'image', // or 'video' or 'map'
            details: '', // image#id if type=='image'
            // video URL if type=='video'
            // map URL if type=='map'
            title: '',
            description: '',
            link: '' // or page/article link 
        };

        elementList = [];
        $('#sortable-gallery-list li').each(function() {
            
            if( $(this).data('type') == 'image' ){
                elementList.push({
                    type: $(this).data('type'),
                    details: $(this).data('id'),
                    title: $(this).find('[name="pb_meta[title][' + $(this).data('id') + ']"]').val(),
                    description: $(this).find('[name="pb_meta[description][' + $(this).data('id') + ']"]').val()
                });
            } else if ( $(this).data('type') == 'video' ){
                elementList.push({
                    type: $(this).data('type'),
                    details: $(this).data('id'),
                    title: $(this).find('[name="pb_meta[title][' + $(this).data('id') + ']"]').val(),
                    description: $(this).find('[name="pb_meta[description][' + $(this).data('id') + ']"]').val()
                });
            } else {
                elementList.push({
                    type: $(this).data('type'),
                    details: $(this).data('id'),
                    title: $(this).find('[name="pb_meta[title][' + $(this).data('id') + ']"]').val(),
                    description: $(this).find('[name="pb_meta[description][' + $(this).data('id') + ']"]').val()
                });
            }
        });

        console.log(elementList);
        return elementList;
    }

    function elementsListSync() {
        var data = {
            'action': 'pirobox_gallery',
            'gallery': createList()
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            $('#pirobox-gallery-objects-array').val(response);
        });
    }



    function getOverlay(overlay) {
        content_mappa = '<h1>Inserisci Mappa</h1><div class="pb_inner inside"><label for="pb_meta_map_id">Titolo mappa<input type="text" placeholder="Inserisci titolo mappa" name="pb_meta[map_id]" id="map_id" value=""></label><label for="pb_meta_map_url">Inserisci URL mappa<input type="text" placeholder="Inserisci URL mappa" class="get_address" name="pb_meta[map_url]" id="map_url" value=""></label><label for="media_width">Larghezza mappa<input type="text" placeholder="Insert  Map width" name="pb_meta[media_width]" id="media_width" value=""></label><label for="media_height">Altezza Mappa<input type="text" placeholder="Inserisci altezza mappa" name="pb_meta[media_height]" id="media_height" value=""></label><span class="pb_elements_wrap"><span class="pb_addmap" style="margin: 13px 0 0 12px;"></span><a href="#" class="add-map button media-button button-primary button-large media-button-insert">Salva mappa</a></span><div style="clear:both;"></div></div>';
        content_video = '<h1>Inserisci Video</h1><div class="pb_inner inside"><label for="pb_meta_video_id">Titolo Video<input type="text" placeholder="Scrivi titolo video" name="pb_meta[video_id]" id="video_id" value=""></label><label for="pb_meta_video_url">Video url<input type="text" placeholder="Inserisci URL video" name="pb_meta[video_url]" id="video_url" value=""></label><label for="media_width">Larghezza video<input type="text" placeholder="Inserisci larghezza video" name="pb_meta[media_width]" id="media_width" value=""></label><label for="media_height">Altezza video<input type="text" placeholder="Inserisci altezza video" name="pb_meta[media_height]" id="media_height" value=""></label><span class="pb_elements_wrap"><span class="pb_addvideo" style="margin: 13px 0 0 12px;"></span><a href="#" class="add-video button media-button button-primary button-large media-button-insert">Salva video</a></span><div style="clear:both;"></div></div>';
        content = '';

        if (overlay == 'map') {
            content = content_mappa;
        } else {
            content = content_video;
        }


        baseOverlay = '<div class="map-video-overlay"><div class="media-modal wp-core-ui"><a class="media-modal-close" href="#"><span class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span></a>' +
                '<div class="media-modal-content">' + content +
                '</div></div></div><div class="media-modal-backdrop"></div></div>';

        $('body').append(baseOverlay);
    }

});