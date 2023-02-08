
$(document).ready(function() {

    $('div.delight-vc.vc-imgupload button').click(function() {
        $(this).parent().find('input').click();
    });


    $('div.delight-vc.vc-imgupload input').change(function() {
        var input = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                input.parent().find('img').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

});