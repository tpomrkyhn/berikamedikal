/* ------------------------------------------------------------------------------
*
*  # Inbox page - Writing
*
*  Specific JS code additions for mail_list_write.html page
*
*  Version: 1.0
*  Latest update: Dec 5, 2016
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Plugins
    // ------------------------------

    // Summernote editor
    $('.summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['hr']],
            ['view', ['fullscreen']]
        ],
        lang: 'tr-TR'
    });

    // Related form components
    // ------------------------------

    // Styled checkboxes/radios
    $(".link-dialog input[type=checkbox], .note-modal-form input[type=radio]").uniform({
        radioClass: 'choice'
    });

    // Styled file input
    $(".note-image-input").uniform({
        fileButtonClass: 'action btn bg-warning-400'
    });

});
