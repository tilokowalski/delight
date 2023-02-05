
window.onload = function() {

    if (typeof window.jQuery == 'undefined') announceProblem('jquery');
    if (typeof $.cookie == 'undefined') announceProblem('jquery.cookie');

    var span = document.createElement('span');

    span.className = 'fa';
    span.style.display = 'none';
    document.body.insertBefore(span, document.body.firstChild);

    if ((css(span, 'font-family')) !== 'Font Awesome 6 Free') {
        announceProblem('@fortawesome/fontawesome-free');
    }
    document.body.removeChild(span);

    if ($('div.delight-vc.tinymce-editor').length) {
        if (typeof tinymce == 'undefined') announceProblem('tinymce (maybe also tinymce-i18n)');
    }

}

function announceProblem(plugin) {
    alert("delight dependency is missing: " + plugin + "\neither not included via npm or script tag with src missing / incorrect");
}

function css(element, property) {
    return window.getComputedStyle(element, null).getPropertyValue(property);
  }
