/**
 * -----------------------------------------------------------------------
 * Scripts das chamadas por engano
 * -----------------------------------------------------------------------
 *
 * Esse arquivo contém os scripts usados no formulário das chamadas por 
 * engano. Eles realizam:
 * - Geração do texto das chamadas por engano.
 *
 * @author Ronaldo Stiene <ronaldo.stiene@outlook.com>
 * @since 18/02/2020
 */

/**
 * Recarrega o texto a cada alteração de tipo, caso o campo esteja vazio
 */
$('.cc-invalid-call-request').click(function () {
    if ($("#cc-invalid-call-details").html() == "") {
        textReload(this);
    }
});

/**
 * Recarrega o texto.
 * 
 * @param {string} element 
 */
function textReload(element) {
    var name = $("#cc-invalid-call-form [name='name']").val();
    var gender = $("#cc-invalid-call-form [name='gender']").val();
    var company = $("#cc-invalid-call-form [name='company']").val();
    var tran = $("#cc-invalid-call-form [name='tran']").val();
    var text;

    if ($(element).find('.cc-invalid-call-request-type').val() == 'ended') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "Ligação Encerrada");
        text = getEndedCallText(name, gender, company);
    }
    if ($(element).find('.cc-invalid-call-request-type').val() == 'mistake') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "Ligação por Engano");
        text = getWrongCallText(name, gender, company);
    }
    if ($(element).find('.cc-invalid-call-request-type').val() == 'muted') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "Ligação sem Comunicação");
        text = getMutedCallText(name, gender, company);
    }
    if ($(element).find('.cc-invalid-call-request-type').val() == 'contact') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "Tentativa de contato" + getTranText(tran));
        text = getContactCallText(name, gender, company, tran);
    }
    if ($(element).find('.cc-invalid-call-request-type').val() == 'offer') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "Oferecer Serviços");
        text = getOfferCallText(name, gender, company);
    }
    if ($(element).find('.cc-invalid-call-request-type').val() == 'telemarketing') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "Telemarketing");
        text = getTelemarketingCallText(name, gender, company);
    }
    if ($(element).find('.cc-invalid-call-request-type').val() == 'other') {
        $(element).find(".cc-invalid-call-request-value").prop('value', "");
        text = "";
    }

    $("#cc-invalid-call-details").html(text);
}

/**
 * Insere o texto relacionado ao contatante e sua empresa.
 * 
 * @param {string} name 
 * @param {string} gender 
 * @param {string} company 
 */
function getClientText(name, gender, company) {
    var text = "";
    if (name != "") {
        if (gender == 'sr') {
            text = text + " do sr. " + name;
        }
        if (gender == 'sra') {
            text = text + " da sra. " + name;
        }
        if (company != "") {
            text = text + ", da empresa " + company + ",";
        }
    }
    if (name == "" && company != "") {
        text = text + " da empresa " + company;
    }

    return text;
}

/**
 * Gera o texto da transferência na Tentiva de contato.
 * 
 * @param {string} tran 
 */
function getTranText(tran) {
    if (tran != "") {
        return " " + tran;
    }
    return " outro funcionário ou setor";
    
}

/**
 * Gera o texto da Ligação Encerrada.
 * 
 * @param {string} name 
 * @param {string} gender 
 * @param {string} company 
 */
function getEndedCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " foi encerrada antes de realizar qualquer tratativa.";
    return text;
}

/**
 * Gera o texto da Ligação por Engano.
 * 
 * @param {string} name
 * @param {string} gender 
 * @param {string} company 
 */
function getWrongCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " por engano.";
    return text;
}

/**
 * Gera o texto da Ligação sem Comunicação.
 * 
 * @param {string} name
 * @param {string} gender
 * @param {string} company
 */
function getMutedCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " estava muda.";
    return text;
}

/**
 * Gera o texto da Tentativa de contato.
 * 
 * @param {string} name
 * @param {string} gender
 * @param {string} company
 * @param {string} tran
 */
function getContactCallText(name, gender, company, tran) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " para falar com" + getTranText(tran) + ".";
    return text;
}

/**
 * Gera o texto da Oferta de Serviços.
 * 
 * @param {string} name
 * @param {string} gender
 * @param {string} company
 */
function getOfferCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " para oferecer serviços.";
    text = text + "\n";
    text = text + "Solicitei que enviasse um e-mail para compras@telium.com.br";
    return text;
}

/**
 * Gera o texto da Ligação de Telemarketing.
 * 
 * @param {string} name 
 * @param {string} gender 
 * @param {string} company 
 */
function getTelemarketingCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " se tratava de um telemarketing.";
    return text;
}
