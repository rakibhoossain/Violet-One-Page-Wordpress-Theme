//Widget MEDIAPICKER PLUGIN
     //MEDIA PICKER FUNCTION
     function mediaPicker(pickerid){
        var custom_uploader;
        var row_id 
        //e.preventDefault();
        row_id = jQuery('#'+pickerid).prev().attr('id');

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //CREATE THE MEDIA WINDOW
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Insert Images',
            button: {
                text: 'Insert Images'
            },
            type: 'image',
            multiple: false
        });

        //"INSERT MEDIA" ACTION. PREVIEW IMAGE AND INSERT VALUE TO INPUT FIELD
        custom_uploader.on('select', function(){
            var selection = custom_uploader.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();
                //INSERT THE SRC IN INPUT FIELD
                jQuery('#' + row_id).val(""+attachment.url+"").trigger('change');
                    //APPEND THE PREVIEW IMAGE
                    jQuery('#' + row_id).parent().find('.custom_media_image_counter').remove();
                    if(attachment.sizes.medium){
                        jQuery('#' + row_id).parent().prepend('<img class="custom_media_image_counter" style="max-width:100%;" src="'+attachment.sizes.medium.url+'" />');
                    }else{
                        jQuery('#' + row_id).parent().prepend('<img class="custom_media_image_counter" style="max-width:100%;" src="'+attachment.url+'" />');
                    }

                });
            jQuery(".media-picker-remove").on('click',function(e) {
                jQuery(this).parent().find('.custom_media_url_counter').val('').trigger('change');
                jQuery(this).parent().find('.custom_media_image_counter').remove();
            });
        });
        //OPEN THE MEDIA WINDOW
        custom_uploader.open();
    }