/**
 * -----------------------------------------------------------------------
 * Scripts de coṕia para àrea de transferência.
 * -----------------------------------------------------------------------
 *
 * Esse arquivo contém os scripts usados para copiar os valores para
 * a área de transferẽncia.
 *
 * @author Ronaldo Stiene <ronaldo.stiene@outlook.com>
 * @since 18/02/2020
 */

/**
 * Copia o texto completo.
 * 
 * @param {string} element 
 * @param {bool} content 
 */
function copyFullText(element, content = false) {
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

/**
 * Copia o texto em uma linha.
 * 
 * @param {string} element 
 * @param {bool} content 
 */
function copyOneLineText(element, content = false) {
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

/**
 * Realiza a operação de cópia. 
 * 
 * @param {string} textArea 
 */
function copyTextClipboard(textArea) {
    textArea.select();
    textArea.setSelectionRange(0, 99999); /*For mobile devices*/
    document.execCommand("copy");
}