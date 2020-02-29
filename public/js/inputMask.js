/**
 * -----------------------------------------------------------------------
 * Scripts das máscaras dos formulários.
 * -----------------------------------------------------------------------
 *
 * Esse arquivo contém os scripts usados nas máscaras dos formulários
 * das páginas.
 *
 * @author Ronaldo Stiene <ronaldo.stiene@outlook.com>
 * @author Kevin
 * @since 28/02/2020
 * @version v1.1.1
 * @use Jquery 1.9.1 $1
 * @source https://stackoverflow.com/users/1226546/kevin
 */

/**
 * Carrega e atualiza as mascaras.
 * 
 * @version v1.1.1
 */
$1(window).load(function () {
    setIdMask('cc-normal-call-form');
    $('#cc-id-input').click(function () {
        setIdMask('cc-normal-call-form');
    });

    setPhoneMask('cc-normal-call-form');
    setPhoneMask('cc-invalid-call-form');
    $('.cc-phone-input').click(function () {
        setPhoneMask('cc-normal-call-form');
        setPhoneMask('cc-invalid-call-form');
    });

    setDateMask('cc-normal-call-form');
    setDateMask('cc-invalid-call-form');

    setEventMask('cc-normal-call-form');
});

/**
 * Define a máscara para o CNPJ e CPF.
 * 
 * @param {string} form 
 * @version v1.1.1
 */
function setIdMask(form) {
    var cnpj = [{ "mask": "99.999.999/9999-99" }];
    var cpf = [{ "mask": "999.999.999-99" }];

    if ($('#' + form + ' [name="id_type"]').val() == 'CNPJ') {
        $1('#' + form + ' [name="id"]').inputmask({
            mask: cnpj,
            greedy: false,
            definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
        });
    } else if ($('#' + form + ' [name="id_type"]').val() == 'CPF') {
        $1('#' + form + ' [name="id"]').inputmask({
            mask: cpf,
            greedy: false,
            definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
        });
    } else {
        $1('#' + form + ' [name="id"]').inputmask('remove');
    }
}

/**
 * Define a máscara para os telefones.
 *
 * @param {string} form
 * @version v1.1.1
 */
function setPhoneMask(form)
{
    var branch = [{ "mask": "9999" }, { "mask": "99999" }, { "mask": "999999" }];
    var brPhone = [{ "mask": "(99) 9999-9999" }, { "mask": "(99) 99999-9999" }];
    var usPhone = [{ "mask": "(999) 999-9999" }];

    if ($('#' + form + ' [name="phone_country"]').val() == 'branch') {
        $1('#' + form + ' [name="phone"]').inputmask({
            mask: branch,
            greedy: false,
            definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
        });
    }
    if ($('#' + form + ' [name="phone_country"]').val() == 'br') {
        $1('#' + form + ' [name="phone"]').inputmask({
            mask: brPhone,
            greedy: false,
            definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
        });
    }
    if ($('#' + form + ' [name="phone_country"]').val() == 'us') {
        $1('#' + form + ' [name="phone"]').inputmask({
            mask: usPhone,
            greedy: false,
            definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
        });
    }
}

/**
 * Define a máscara para as datas.
 *
 * @param {string} form
 * @version v1.1.1
 */
function setDateMask(form) {
    var date = [{ "mask": "99/99/9999 à\\s 99:99" }];

    $1('#' + form + ' [name="date"]').inputmask({
        mask: date,
        greedy: false,
        definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
    });
}

/**
 * Define a máscara para o número de evento.
 *
 * @param {string} form
 * @version v1.1.1
 */
function setEventMask(form) {
    var event = [{ "mask": "999999" }];

    $1('#' + form + ' [name="event"]').inputmask({
        mask: event,
        greedy: false,
        definitions: { '9': { validator: "[0-9]", cardinality: 1 } }
    });
}