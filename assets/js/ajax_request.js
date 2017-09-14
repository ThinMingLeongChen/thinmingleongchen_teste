var currentUrl = window.location.href;

function request(type, search, filter) {
    $.post('ajax',
    {
        type: type,
        search: search,
        filter: filter
    },
    function(data){
        $('#' + type).html(data);
        Delete.initialize();
    });
}

if (currentUrl.indexOf('gerenciar_passageiro') > -1) {    
    request('passenger', $('.search').val());
    
    $('.search').on('input', function() {
        request('passenger', $(this).val());
    });
}
else if (currentUrl.indexOf('gerenciar_motorista') > -1) {
    request('driver', $('.search').val(), $('.filter:checked').val());
    
    $('.filter').on('change', function() {
        request('driver', $('.search').val(), $(this).val());
    });

    $('.search').on('input', function() {
        request('driver', $(this).val(), $('.filter:checked').val());
    });
}
else if (currentUrl.indexOf('gerenciar_corrida') > -1) {
    request('ride', $('.search').val());
    
    $('.search').on('input', function() {
        request('ride', $(this).val());
    });
}