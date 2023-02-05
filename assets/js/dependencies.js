
window.onload = function() {

    if (typeof window.jQuery == 'undefined') announceProblem('jquery');
    if (typeof $.cookie == 'undefined') announceProblem('jquery.cookie');

    // Font Awesome prüfen

    if ($('div.tinymce-editor').length) {
        if (typeof tinymce == 'undefined') announceProblem('tinymce (maybe also tinymce-i18n)');
    }

    if ($('div.g-recaptcha').length) {
        if (typeof grecaptcha == 'undefined') announceProblem('google recaptcha');
    }

}

function announceProblem(plugin) {
    alert("delight dependency is missing: " + plugin + "\neither files dont exist (maybe npm?) or script tag src is missing / incorrect");
}
