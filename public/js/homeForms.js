/**
 * -----------------------------------------------------------------------
 * Scripts dos formulários da página inicial.
 * -----------------------------------------------------------------------
 *
 * Esse arquivo contém os scripts usados nos formulários de chamadas
 * da página principal.
 *
 * @author Ronaldo Stiene <ronaldo.stiene@outlook.com>
 * @since 18/02/2020
 * @version v1.0.0
 */

/**
 * Ativa e desativa os inputs com base no checkbox.
 * 
 * @version v1.0.0
 */
$('.cc-input-check').click(function () {
    if ($(this).find('.cc-input-checkbox').is(':checked')) {
        $(this).find(".cc-input-text").attr('readonly', false);
        $(this).find(".cc-input-date").attr('readonly', false);
        if ($(this).find(".cc-input-date").prop("value") == "") {
            $(this).find(".cc-input-date").prop("value", getFormatedDate());
        }
        $(this).find(".cc-input-select").attr('disabled', false);
    } else {
        $(this).find(".cc-input-text").attr('readonly', true);
        $(this).find(".cc-input-date").attr('readonly', true);
        $(this).find(".cc-input-select").attr('disabled', true);
    }
}); 

/**
 * Muda o placeholder da requisição de uma chamada normal.
 * 
 * @version v1.0.0
 */
$('.cc-normal-call-reason').click(function () {
    if ($(this).find('.cc-reason-type').val() == 'rds') {
        $(this).find(".cc-reason-value").attr('placeholder', "Requisição");
    }
    if ($(this).find('.cc-reason-type').val() == 'in') {
        $(this).find(".cc-reason-value").attr('placeholder', "Incidente");
    }
    if ($(this).find('.cc-reason-type').val() == 'tran') {
        $(this).find(".cc-reason-value").attr('placeholder', "Funcionário ou Setor");
    }
}); 

/**
 * Funções que alteram os formulários visíveis
 * 
 * @version v1.0.0
 */
$("#cc-normal-call-btn").click(function () {
    $("#cc-invalid-call-form").hide("slide", { direction: "left" }, 400);
    $("#cc-normal-call-form").delay(400).show("slide", { direction: "left" }, 400);
    $('#cc-normal-call-btn').addClass('invisible');
    $('#cc-invalid-call-btn').removeClass('invisible');
    
    activateInputs("invalid-call", "normal-call");
    equalInputs("invalid-call", "normal-call");
});
$("#cc-invalid-call-btn").click(function () {
    $("#cc-normal-call-form").hide("slide", { direction: "left" }, 400);
    $("#cc-invalid-call-form").delay(400).show("slide", { direction: "left" }, 400);
    $('#cc-normal-call-btn').removeClass('invisible');
    $('#cc-invalid-call-btn').addClass('invisible');

    activateInputs("normal-call", "invalid-call");
    equalInputs("normal-call", "invalid-call");
    
    if ($("#cc-invalid-call-form").find(".cc-input-date").prop('value') == "") {
        $("#cc-invalid-call-form").find(".cc-input-date").prop("value", getFormatedDate());
    }
});

/**
 * Função de obtenção de data.
 * 
 * Atualização: Removido os caracteres que não sejam das datas.
 * @since 28/02/2020
 * 
 * @returns {string}
 * @version v1.1.1
 */
function getFormatedDate(){
    var date = new Date();
    return String(date.getDate()).padStart(2, '0') +
    String(date.getMonth()).padStart(2, '0') +
    String(date.getFullYear()).padStart(4, '0') +
    String(date.getHours()).padStart(2, '0') +
    String(date.getMinutes()).padStart(2, '0');
}

/**
 * Iguala os valores dos inputs de ambos os formulários.
 * 
 * @param {string} from 
 * @param {string} to 
 * @version v1.0.0
 */
function equalInputs(from, to) {
    $("#cc-" + to + "-form" + " [name='name']").val( $("#cc-" + from + "-form" + " [name='name']").prop('value') )
    $("#cc-" + to + "-form" + " [name='gender']").val( $("#cc-" + from + "-form" + " [name='gender']").prop('value') )
    $("#cc-" + to + "-form" + " [name='company']").val( $("#cc-" + from + "-form" + " [name='company']").prop('value') )
    $("#cc-" + to + "-form" + " [name='phone']").val( $("#cc-" + from + "-form" + " [name='phone']").prop('value') )
    $("#cc-" + to + "-form" + " [name='date']").val( $("#cc-" + from + "-form" + " [name='date']").prop('value') )
}

/**
 * Ativa os inputs após os valores serem igualados.
 * 
 * @param {string} from 
 * @param {string} to 
 * @version v1.0.0
 */
function activateInputs(from, to) {
    if ($("#cc-" + from + "-form" + " [name='name']").prop('value') != "") {
        if (! $("#cc-" + to + "-name-checkbox").is(':checked')) {
            $("#cc-" + to + "-name-checkbox").prop("checked", true);
            $("#cc-" + to + "-form" + " [name='name']").attr('readonly', false);
            $("#cc-" + to + "-form" + " [name='gender']").attr('disabled', false);
        }
    }
    if ($("#cc-" + from + "-form" + " [name='company']").prop('value') != "") {
        if (! $("#cc-" + to + "-company-checkbox").is(':checked')) {
            $("#cc-" + to + "-company-checkbox").prop("checked", true);
            $("#cc-" + to + "-form" + " [name='company']").attr('readonly', false);
        }
    }
    if ($("#cc-" + from + "-form" + " [name='phone']").prop('value') != "") {
        if (! $("#cc-" + to + "-phone-checkbox").is(':checked')) {
            $("#cc-" + to + "-phone-checkbox").prop("checked", true);
            $("#cc-" + to + "-form" + " [name='phone']").attr('readonly', false);
        }
    }
    if ($("#cc-" + from + "-form" + " [name='date']").prop('value') != "") {
        if (! $("#cc-" + to + "-date-checkbox").is(':checked')) {
            $("#cc-" + to + "-date-checkbox").prop("checked", true);
            $("#cc-" + to + "-form" + " [name='date']").attr('readonly', false);
        }
    }
}



