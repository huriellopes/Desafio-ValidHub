const ShowCartorio = function () {
    let initPlugin = function () {
        mascaraInput('cep','00000-000');

        const optionstelefone = {
            onKeyPress : function(telefone, e, field, options) {
                let masks = ['00 00000-0000', '00 0000-0000'];
                let mask = (telefone.length > 11) ? masks[0] : masks[1];
                $('#telefone').mask(mask, options);
            }
        };

        $('#telefone').mask('000.000.000-000', optionstelefone);

        let tamanho = $("#documento").val().length;

        if(tamanho <= 11){
            $("#documento").mask("999.999.999-99");
        } else {
            $("#documento").mask("99.999.999/9999-99");
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

    return {
        init: function () {
            initPlugin();
            validateForm();
        }
    };
}();

$(document).ready(function () {
    ShowCartorio.init();
});
