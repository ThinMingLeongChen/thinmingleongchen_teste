function required(element) {
    'use strict';
    if (element.attr('type') === 'radio') {
        if ($('[name=' + element.attr('name') + ']:checked').length === 0) {
            if (element.parent().parent().find('span').length === 0) {
                element.parent().parent().append('<span class="text-danger">&nbsp;&nbsp Campo obrigatório<span/>');
            }
            return false;
        }
        else {
            element.parent().parent().removeClass('has-error');
            element.parent().parent().addClass('has-success');
            element.parent().parent().find('span').remove();
            return true;
        }
    }
    else if (element.attr('type') === 'text') {
        if (element.val().trim() === '') {
            element.parent().addClass('has-error');
            if (element.parent().find('span').length === 0) {
                element.parent().append('<span class="text-danger">Campo obrigatório<span/>');
            }
            return false;
        }
        else {
            element.parent().removeClass('has-error');
            element.parent().addClass('has-success');
            element.parent().find('span').remove();
            return true;
        }
    }
    else if (element.prop('nodeName') === 'SELECT') {
        if (element.attr('multiple') === undefined && element.val() === null) {
            element.parent().addClass('has-error');
            if (element.parent().find('span').length === 0) {
                element.parent().append('<span class="text-danger">Campo obrigatório<span/>');
            }
            return false;
        }
        else if(element.attr('multiple') === 'multiple' && element.val().length < 1) {
            element.parent().addClass('has-error');
            if (element.parent().find('span').length === 0) {
                element.parent().append('<span class="text-danger">Campo obrigatório<span/>');
            }
            return false;
        }
        else {
            element.parent().removeClass('has-error');
            element.parent().addClass('has-success');
            element.parent().find('span').remove();
            return true;
        }
    }
}

function validateDate(element) {
    'use strict';
    var parameters = element.val().split(/\//);
    var day   = parseInt(parameters[0]);
    var month = parseInt(parameters[1]);
    var year  = parseInt(parameters[2]);
    var date = new Date(year, month-1, day, 0, 0, 0, 0);

    if ((day === date.getDate() && month === (date.getMonth()+1) && year === date.getFullYear()) === false) {
        if (element.parent().find('span').length === 0) {
            element.parent().addClass('has-error');
            element.parent().append('<span class="text-danger">Data inválido<span/>');
        }
        return false;
    }
    else {
        element.parent().parent().removeClass('has-error');
        element.parent().parent().addClass('has-success');
        element.parent().parent().find('span').remove();
        return true;
    }
}

function validateCpf(element) {
    'use strict';
    if (element.val().length > 0) {

        var pesos = [10, 9, 8, 7, 6, 5, 4, 3, 2];
        var multiplicacao_resultado = [];
        var soma_resultado = 0;
        
        for (var i = 0; i < element.val().replace(/\D/g, '').length - 2; i++) {
            multiplicacao_resultado.push((element.val().replace(/\D/g, '').charAt(i)) * pesos[i]);
        }
        
        for (i in multiplicacao_resultado) {
            if (multiplicacao_resultado.hasOwnProperty(i)) {
                soma_resultado += multiplicacao_resultado[i];
            }
        }

        var primeiro_digito = 11 - (soma_resultado % 11);

        if (primeiro_digito > 9) {
            primeiro_digito = 0;
        }

        pesos.unshift(11);
        multiplicacao_resultado = [];
        soma_resultado = 0;

        for (i = 0; i < element.val().replace(/\D/g, '').length - 1; i++) {
            multiplicacao_resultado.push((element.val().replace(/\D/g, '').charAt(i)) * pesos[i]);
        }

        for (i in multiplicacao_resultado) {
            if (multiplicacao_resultado.hasOwnProperty(i)) {
                soma_resultado += multiplicacao_resultado[i];
            }
        }

        var segundo_digito = 11 - (soma_resultado % 11);

        if (segundo_digito > 9) {
            segundo_digito = 0;
        }

        if (Number(element.val().replace(/\D/g, '').charAt(9)) === primeiro_digito && Number(element.val().replace(/\D/g, '').charAt(10)) === segundo_digito) { 

            var equals = 0;
            for (i = 0; i < element.val().replace(/\D/g, '').length; i++) {
                if (element.val().replace(/\D/g, '').charAt(0) === element.val().replace(/\D/g, '').charAt(i)) {
                    equals++;
                }
            }

            if (equals < 11) {
                element.parent().removeClass('has-error');
                element.parent().addClass('has-success');
                element.parent().find('span').remove();
                return true;
            }
            else {
                if (element.parent().find('span').length === 0) {
                    element.parent().addClass('has-error');
                    element.parent().append('<span class="text-danger">Cpf inválido<span/>');
                }
                return false;
            }
        }
        else {
            if (element.parent().find('span').length === 0) {
                element.parent().addClass('has-error');
                element.parent().append('<span class="text-danger">Cpf inválido<span/>');
            }
            return false;
        }
    }
}

$('.required').on('input blur change', function() {   
    'use strict'; 
    required($(this));
});

$('.mask-date').on('input', function() {
    'use strict';
    if ($(this).val().replace(/\D/g, '').length > 8) {
        $(this).val('');
        return false;
    }

    $(this).val($(this).val().replace(/\D/g, ''));            
    $(this).val($(this).val().replace(/^(\d{2})(\d)/g, '$1/$2'));    
    $(this).val($(this).val().replace(/(\d{2})(\d)/, '$1/$2'));    
});

$('.mask-date').on('blur', function() {
    'use strict';
    validateDate($(this));
});

$('.mask-cpf').on('input', function() {
    'use strict';
    if ($(this).val().replace(/\D/g, '').length > 11) {
        $(this).val('');
        return false;
    }

    $(this).val($(this).val().replace(/\D/g, ''));
    $(this).val($(this).val().replace(/(\d{3})(\d)/, '$1.$2'));
    $(this).val($(this).val().replace(/(\d{3})(\d)/, '$1.$2'));
    $(this).val($(this).val().replace(/(\d{3})(\d{1,2})$/, '$1-$2'));
});

$('.mask-cpf').on('blur', function() {
    'use strict';
    validateCpf($(this));
});

$('.mask-money').on('input', function() {
    $(this).val($(this).val().replace(/\D/g, ''));            
    $(this).val($(this).val().replace(/(\d)(\d{1,2})$/, '$1,$2'));
    $(this).val($(this).val().replace(/(\d)(\d{3}[,])/g, '$1.$2'));
    $(this).val($(this).val().replace(/(\d)(\d{3}[.])/g, '$1.$2'));
    $(this).val($(this).val().replace(/(\d)(\d{3}[.]\d{3}[.])/g, '$1.$2'));
    if ($(this).val().length > 10) {
        $(this).val();
    }
});

$('#validate').on('submit', function(e){
    'use strict';
    var total = 0, success = 0; 

    $('.required').each(function() {
        total++;
        if (required($(this)) === true) {
            success++;
        }
    });

    $('.mask-date').each(function() {
        total++;
        if (validateDate($(this)) === true) {
            success++;
        }
    });

    $('.mask-cpf').each(function() {
        total++;
        if (validateCpf($(this)) === true) {
            success++;
        }
    });

    if (total !== success) {
        e.preventDefault();
    }
});

var Delete = {
    'initialize' : function() {
        var deletar = document.getElementsByClassName('delete');
        var confirm = document.getElementById('confirm');

        function ask(elem) {
            elem.children[2].onclick = function() {
                
                $('#confirm').modal('show');
                confirm.children[0].children[0].children[0].children[2].onclick = function() {
                    elem.submit();
                };
                confirm.children[0].children[0].children[0].children[3].onclick = function() {
                    $('#confirm').modal('hide');
                };
            }
        }

        for (var i = 0; i < deletar.length; i++) {
            ask(deletar[i]);
        }
    }
}
Delete.initialize();