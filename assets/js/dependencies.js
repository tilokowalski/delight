
window.onload = function() {

    if (typeof window.jQuery == 'undefined') announceProblem('jquery');
    if (typeof $.cookie == 'undefined') announceProblem('jquery.cookie');

    // Font Awesome prüfen

    if ($('div.delight-vc.tinymce-editor').length) {
        if (typeof tinymce == 'undefined') announceProblem('tinymce (maybe also tinymce-i18n)');
    }

}

function announceProblem(plugin) {
    alert("delight dependency is missing: " + plugin + "\neither not included via npm or script tag with src missing / incorrect");
}
