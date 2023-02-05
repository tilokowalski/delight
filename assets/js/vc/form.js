
$(document).ready(function() {

    $('.delight-vc.form').each(function() {

        const form = $(this);

        form.find('div.delight-vc.tinymce-editor span.collapse-editor').click(function() {
            form.find("div.vc-body[data-editor='" + $(this).attr('data-editor') + "']").fadeToggle();
        });

        form.find(':input').on('input', function() {
            var name = $(this).attr('name');
            var input_error = $('span.input-error#' + name);
            if (input_error.length) {
                input_error.remove();
                $(this).removeClass('error');
            }
        });

        form.find('button.vc-imgupload-button').click(function() {
            $(this).parent().find('input.vc-imgupload-input').click();
        });

        
        form.find('input.vc-imgupload-input').change(function() {
            var input = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    input.parent().find('img.vc-imgupload-img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        form.find('button.cancel').click(function() {
            history.back();
        });

        form.submit(function(e) {

            e.preventDefault();
        
            var may_be_submitted = true;
        
            $(this).find('[data-required]').each(function() {
                if (!$(this).val()) {
                    var name = $(this).attr('name');
                    if (!$('span.input-error#' + name).length) {
                        $("<span class='input-error' id='" + name + "'>Bitte füllen Sie dieses Feld aus</span>").insertAfter(this);
                        $(this).addClass('error');
                    }
                    may_be_submitted = false;
                }
            });
        
            $(this).find('[data-type=email]').each(function () {

                var email = $(this).val();
        
                const validateEmail = (email) => {
                    return String(email)
                    .toLowerCase()
                    .match(
                        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    );
                };
        
                if (!validateEmail(email)) {
                    may_be_submitted = false;
                    var name = $(this).attr('name');
                    if (!$('span.input-error#' + name).length) {
                        $("<span class='input-error' id='" + name + "'>Geben Sie eine gültige E-Mail Adresse an</span>").insertAfter('input[name=email]');
                        $(this).addClass('error');
                    }
                }

            });

            $(this).find('[data-type=phone]').each(function () {
        
                var phone = $(this).val()
                
                if (phone) {
            
                    phone = phone.replace(/ /g, '');
            
                    const validatePhone = (phone) => {
                        return String(phone)
                        .toLowerCase()
                        .match(
                            /(\+|00)(297|93|244|1264|358|355|376|971|54|374|1684|1268|61|43|994|257|32|229|226|880|359|973|1242|387|590|375|501|1441|591|55|1246|673|975|267|236|1|61|41|56|86|225|237|243|242|682|57|269|238|506|53|5999|61|1345|357|420|49|253|1767|45|1809|1829|1849|213|593|20|291|212|34|372|251|358|679|500|33|298|691|241|44|995|44|233|350|224|590|220|245|240|30|1473|299|502|594|1671|592|852|504|385|509|36|62|44|91|246|353|98|964|354|972|39|1876|44|962|81|76|77|254|996|855|686|1869|82|383|965|856|961|231|218|1758|423|94|266|370|352|371|853|590|212|377|373|261|960|52|692|389|223|356|95|382|976|1670|258|222|1664|596|230|265|60|262|264|687|227|672|234|505|683|31|47|977|674|64|968|92|507|64|51|63|680|675|48|1787|1939|850|351|595|970|689|974|262|40|7|250|966|249|221|65|500|4779|677|232|503|378|252|508|381|211|239|597|421|386|46|268|1721|248|963|1649|235|228|66|992|690|993|670|676|1868|216|90|688|886|255|256|380|598|1|998|3906698|379|1784|58|1284|1340|84|678|681|685|967|27|260|263)(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{4,20}$/
                        );
                    };
            
                    if (!validatePhone(phone)) {
                        may_be_submitted = false;
                        var name = $(this).attr('name');
                        if (!$('span.input-error#' + name).length) {
                            $("<span class='input-error' id='" + name + "'>Geben Sie eine gültige Nummer im folgenden Format an: +49 152 12345678</span>").insertAfter('input[name=phone]');
                            $(this).addClass('error');
                        }
                    }
            
                }

            });
        
            if (may_be_submitted) {
                $(this).unbind('submit').submit();
            }
        
        });

    });

});
