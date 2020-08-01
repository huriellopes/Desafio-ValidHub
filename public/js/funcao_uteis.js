const FuncoesUteis = function () {

    formataData = (data) => {
        return moment(data).format("DD/MM/YYYY");
    };

    mascaraInput = (inputCampo, formato) => {
        $("#"+inputCampo).mask(formato, {reverse: true});
    };

    DataTablesConfig = (table) => {
        $("#"+table).DataTable({
            "order": [],
            "destroy": true,
            "processing": true,
            "serverSide": false,
            "responsive": true,
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
        });
    };

    requisicao = (url, dados = null, type) => {
        return $.ajax({
            method: type,
            url: url,
            data: dados,
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    };

    calendarDate = (input) => {
        $("#"+input).datepicker({
            language: 'pt-BR',
            format: 'dd/mm/yyyy',
            startDate: '+0d',
            forceParse: true,
            todayBtn: "linked",
            todayHighlight: true,
            autoclose: true,
            orientation: 'bottom',
        });
    };

}();
