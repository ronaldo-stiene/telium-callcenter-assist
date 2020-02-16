$('.cc-invalid-call-request').click(function () {
    var name = $("#cc-invalid-call-form [name='name']").val();
    var gender = $("#cc-invalid-call-form [name='gender']").val();
    var company = $("#cc-invalid-call-form [name='company']").val();
    var text;
    if ($(this).find('.cc-invalid-call-request-type').val() == 'ended') {
        $(this).find(".cc-invalid-call-request-value").prop('value', "Ligação Encerrada");
        text = getEndedCallText(name, gender, company);
    }
    if ($(this).find('.cc-invalid-call-request-type').val() == 'mistake') {
        $(this).find(".cc-invalid-call-request-value").prop('value', "Ligação por Engano");
    }

    $("#cc-invalid-call-details").html(text);
});

function getEndedCallText(name, gender, company) {
    var text;
    text = "Chamada";
    if (name != "") {
        if (gender == 'sr') {
            text = text + " com o " + name;
        }
        if (gender == 'sra') {
            text = text + " com a " + name;
        }
    }
    if (company != "") {
        text = text + ", da empresa " + company + ",";
    }
    text = text + " foi encerrada antes de realizar qualquer tratativa.";
    return text;
}
