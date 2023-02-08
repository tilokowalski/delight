$(document).ready(function() {

    $('div.delight-vc.vc-tinymce-editor span.collapse-editor').click(function() {
        $("div.delight-vc.vc-tinymce-editor div.body[data-editor='" + $(this).attr('data-editor') + "']").fadeToggle();
    });

});