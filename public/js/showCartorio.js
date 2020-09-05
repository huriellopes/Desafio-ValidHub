const ShowCartorio = function () {
    let initPlugin = function () {
        mascaraInput('cep','00000-000');

        let telefone = $('#telefone').val().length;

        const optionstelefone = {
            onKeyPress : function(telefone, e, field, options) {
                let masks = ['00 00000-0000', '00 0000-0000'];
                let mask = (telefone.length > 11) ? masks[0] : masks[1];
                $('#telefone').mask(mask, options);
            }
        };

        if (telefone >= 11) {
            $('#telefone').mask('00 00000-0000', optionstelefone);
        } else {
            $('#telefone').mask('00 0000-0000', optionstelefone);
        }

        $('#telefone').mask('00 00000-0000', optionstelefone);

        const options = {
            onKeyPress : function(cpfcnpj, e, field, options) {
                let masks = ['000.000.000-000', '00.000.000/0000-00'];
                let mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
                $('#documento').mask(mask, options);
            }
        };

        let tamanho = $("#documento").val().length;

        if(tamanho <= 11){
            $("#documento").mask("999.999.999-99", options);
        } else {
            $("#documento").mask("99.999.999/9999-99", options);
        }
    };

    let validateForm = function () {
        let cartorioForm = $("#cartorioForm");

        let rules = {
            nome: {
                required: true,
            },
            razao: {
                required: true,
            },
            email: {
                required: true,
                validaEmail: true,
            },
            telefone: {
                required: true,
            },
            tipo_documento: {
                required: true,
            },
            documento: {
                required: true,
            },
            cep: {
                required: true,
                ValidaCep: true,
            },
            uf: {
                required: true,
            },
            endereco: {
                required: true,
            },
            cidade: {
                required: true,
            },
            bairro: {
                required: true,
            },
            tabeliao: {
                required: true,
            },
        };

        let messages = {
            nome: {
                required: 'Campo Obrigatório!',
            },
            razao: {
                required: 'Campo Obrigatório!',
            },
            email: {
                required: 'Campo Obrigatório!',
                validaEmail: 'Digite um email válido!',
            },
            telefone: {
                required: 'Campo Obrigatório!',
            },
            tipo_documento: {
                required: 'Campo Obrigatório!',
            },
            documento: {
                required: 'Campo Obrigatório!',
            },
            cep: {
                required: 'Campo Obrigatório!',
            },
            uf: {
                required: 'Campo Obrigatório!',
            },
            endereco: {
                required: 'Campo Obrigatório!',
            },
            cidade: {
                required: 'Campo Obrigatório!',
            },
            bairro: {
                required: 'Campo Obrigatório!',
            },
            tabeliao: {
                required: 'Campo Obrigatório!',
            },
        };

        cartorioForm.submit(function (e) {
            e.preventDefault();
        }).validate({
            ignore: "",
            rules: rules,
            messages: messages,
            errorElement: "div",
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: async function (form, e) {
                e.preventDefault();

                $.blockUI({
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#ffffff'
                    },
                    message: 'Validando Formulário!'
                });

                setTimeout($.unblockUI, 2000);

                requisicao(cartorioForm.attr('action'), cartorioForm.serialize(), 'POST')
                    .then(response => {
                        if (response.status === 200) {
                            setTimeout($.unblockUI, 2000);
                            swal('Ótimo!', response.message, 'success');
                            setTimeout(function () {
                                window.location.href = "/admin/home";
                            }, 1500);
                        }
                    }).catch(response => {
                        if (response === 400) {
                            setTimeout($.unblockUI, 2000);
                            swal('Atenção!', response.message, 'error');
                        } else {
                            setTimeout($.unblockUI, 2000);
                            swal('Atenção!', 'Houve um error!', 'error');
                        }
                    });
            }
        });

        $.validator.addMethod("validaEmail", function (value, element) {
            // Separa os os elementos antes e depois do "@"
            let usuario = value.substring(0, value.indexOf("@"));
            let dominio = value.substring(value.indexOf("@")+ 1, value.length);

            // Validação do email, tamanhos, regras
            if ((usuario.length >=1) &&
                (dominio.length >=3) &&
                (usuario.search("@")==-1) &&
                (dominio.search("@")==-1) &&
                (usuario.search(" ")==-1) &&
                (dominio.search(" ")==-1) &&
                (dominio.search(".")!=-1) &&
                (dominio.indexOf(".") >=1)&&
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
                return true;
            }

            return false;
        }, "Email Inválido");

        $.validator.addMethod("ValidaCep", function (value, element) {
            value = value.replace(/[^\d]+/g,'');
            let valida = /^[0-9]{8}$/;

            return valida.test(value);
        }, "Cep Inválido");
    };

    // Requisição para busca do cep
    const getCepAddress = (url) =>
        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'JSON',
        });

    // Limpa os dados, caso dê erro!
    const limpa_formulario_cep = () => {
        //Limpa valores do formulário de cep.
        document.getElementById('endereco').value= "";
        document.getElementById('complemento').value= "";
        document.getElementById('bairro').value= "";
        document.getElementById('cidade').value= "";
        document.getElementById('uf').value= "";
    };

    // Monta os dados
    let dados = function(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value = conteudo.logradouro;
            document.getElementById('bairro').value = conteudo.bairro;
            document.getElementById('complemento').value = conteudo.complemento;
            document.getElementById('cidade').value = conteudo.localidade;
            document.getElementById('uf').value = conteudo.uf;
        }
    };


    // Debbounce - para busca
    function debounceEvent(fn, time, wait = 1000) {
        return function () {
            clearTimeout(time);

            time = setTimeout(() => {
                // Aplicando o evento (arguments)!
                fn.apply(this, arguments);
            }, wait);
        }
    }

    let handleKeyup = async function(e) {

        // Cep com replace, retirando a mascára
        let cep = e.target.value.replace('-', '');

        // Url da busca do cep!
        let url = `https://viacep.com.br/ws/${cep}/json/`;

        // Busca o cep!
        let response = await getCepAddress(url);

        // Monta os dados!
        const endereco = {
            'logradouro': response.logradouro,
            'bairro': response.bairro,
            'complemento': response.complemento,
            'localidade': response.localidade,
            'uf': response.uf
        };

        // Mostra os dados!
        dados(endereco);

        // Caso dê erro, limpa o formulário e emite um alerta de atenção!
        if (response.erro) {
            //CEP não Encontrado.
            limpa_formulario_cep();
            swal('Ops...', 'CEP não encontrado.', 'warning');
        }
    }

    // Dispara o evento!
    let getCep = function () {
        const elemento_cep = document.getElementById('cep');

        elemento_cep.addEventListener('keyup', debounceEvent(handleKeyup)); // Passe o wait (tempo), caso queira!
    };

    return {
        init: function () {
            initPlugin();
            validateForm();
            getCep();
        }
    };
}();

$(document).ready(function () {
    ShowCartorio.init();
});
