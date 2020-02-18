$('.cc-invalid-call-request').click(function () {
    textReload(this);
});

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

function getTranText(tran) {
    if (tran != "") {
        return " " + tran;
    }
    return " outro funcionário ou setor";
    
}

function getEndedCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " foi encerrada antes de realizar qualquer tratativa.";
    return text;
}

function getWrongCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " por engano.";
    return text;
}

function getMutedCallText(name, gender, company) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " estava muda.";
    return text;
}

function getContactCallText(name, gender, company, tran) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " para falar com" + getTranText(tran) + ".";
    return text;
}

function getOfferCallText(name, gender, company, tran) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " para oferecer serviços.";
    text = text + "\n";
    text = text + "Solicitei que enviasse um e-mail para compras@telium.com.br";
    return text;
}

function getTelemarketingCallText(name, gender, company, tran) {
    var text;
    text = "Chamada recebida";
    text = text + getClientText(name, gender, company);
    text = text + " se tratava de um telemarketing.";
    return text;
}
