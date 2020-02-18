function copyFullText(element, content = false) {
    /* Get the text field */
    if (content) {
        var textArea = document.getElementById(element);
        textArea.value = textArea.value.trim().replace(/\n/g, "").replace(/(<br>|<\/p>)/g, "\n").replace(/\n$/, "").replace(/<\/?[^>]+(>|$)/g, "");
    } else {
        var copyText = document.getElementById(element).innerHTML;
        var textArea = document.getElementById(element + "-textarea");
        textArea.value = copyText.trim().replace(/\n/g, "").replace(/(<br>|<\/p>)/g, "\n").replace(/(<hr>)/g, '='.repeat(50) + "\n").replace(/\n$/, "").replace(/<\/?[^>]+(>|$)/g, "");
    }
    copyTextClipboard(textArea);
}
function copyOneLineText(element, content = false) {
    /* Get the text field */
    if (content) {
        var textArea = document.getElementById(element);
        textArea.value = content.trim().replace(/(\r\n|\n|\r)/gm, " ").replace(/ +(?= )/g, '');
    } else {
        var copyText = document.getElementById(element).innerHTML;
        var textArea = document.getElementById(element + "-textarea");
        textArea.value = copyText.trim().replace(/(\r\n|\n|\r)/gm, " ").replace(/ +(?= )/g, '');
    }
    copyTextClipboard(textArea);
}

function copyTextClipboard(textArea) {
    /* Select the text field */
    textArea.select();
    textArea.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");
}