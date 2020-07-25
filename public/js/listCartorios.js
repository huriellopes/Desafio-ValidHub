const ListCartorios = function () {

    let initPlugin = async function () {
        await DataTablesConfig('datables');
        moment.locale('pt-br');
    };

    let ativa = function () {
        $(document).on("click",".btnAtivo", function (e) {
            e.preventDefault();

            let url = $(this).attr('href');

            swal({
                title: "Opa!",
                text: "Você deseja ativar o cartório?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, desejo ativar!'
            }).then((value) => {
                if (value) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).done((response) => {
                        if (response.status === 200) {
                            swal('Ótimo', response.message, 'success');
                            setInterval(function () {
                                window.location.reload("/");
                            }, 2000);
                        } else {
                            swal('Erro','Ocorreu algum erro.', 'error');
                        }
                    }).fail((response) => {
                        if (response.status === 400) {
                            swal('Ops...', response.message, 'error');
                        }
                    });
                }
            })
        });
    };

    let inativa = function () {
        $(document).on("click",".btnInativo", function (e) {
            e.preventDefault();
            let url = $(this).attr('href');

            swal({
                title: "Opa!",
                text: "Você deseja inativar o cartório?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, desejo inativar!'
            }).then((value) => {
                if (value === true) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).done((response) => {
                        console.log(response);
                        if (response.status === 200) {
                            swal('Ótimo', response.message, 'success');
                            setInterval(function () {
                                window.location.reload("/");
                            }, 2000);
                        } else {
                            swal('Erro','Ocorreu algum erro.', 'error');
                        }
                    }).fail((response) => {
                        console.log(response);
                        if (response.status === 400) {
                            swal('Ops...', response.message, 'error');
                        } else {
                            swal('Erro','Ocorreu algum erro.', 'error');
                        }
                    });
                }
            })
        });
    };

    let populaTabela = function() {
        let url = '/admin/api/cartorios';
        let tabela = $("#datables").DataTable();

        requisicao(url, null, 'GET').then(cartorios => {
            if (cartorios.status === 200 && cartorios.data.length > 0) {
                tabela.clear();

                cartorios.data.map(cartorio => {
                    let status = cartorio.ativo.replace(' ','') === '1' ? 'Ativo' : 'Inativo';
                    let data = formataData(cartorio.created_at);
                    let id = cartorio.id;
                    let ativo = cartorio.ativo.replace(' ','') === '1' ?
                        "<a href='api/inactive/"+id+"' class='btnInativo'><i class='far fa-times-circle text-danger'></i></a></td>" :
                        "<a href='api/active/"+id+"' class='btnAtivo'><i class='far fa-check-circle text-success'></i></a></td>";
                    let tabeliao = cartorio.tabeliao === 'NULL' ? 'Sem Tabeliao' : cartorio.tabeliao;

                    tabela.row.add ([
                        id, cartorio.nome, cartorio.razao, cartorio.tipo_documento.documento, cartorio.documento,
                        cartorio.cidade, cartorio.uf, tabeliao, status, data,
                        `<td><a href='show/${id}'><i class='fas fa-eye text-primary'></i></a> ` +
                        `${ativo}`
                    ])
                })

                tabela.draw();
                $("#loading").hide();
                $(".tabela").show();
            } else {
                $("#loading").hide();
                $(".tabela").show();
            }
        }).catch(response => {
            if (response.status === 400) {
                $("#loading").hide();
                $(".tabela").show();
                swal('Atenção!', response.message, 'error');
            } else {
                $("#loading").hide();
                $(".tabela").show();
                swal('Atenção!', 'Houve um error!', 'error');
            }
        });
    };


    return {
        init: function () {
          initPlugin();
          ativa();
          inativa();
          populaTabela();
        }
    };
}();

$(document).ready(function () {
    ListCartorios.init();
})
