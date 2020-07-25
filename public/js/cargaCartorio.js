const CargaCartorio = function () {
    let validateArquivo = function () {
        let cargaForm = $("#cargaForm");

        let rules = {
            AXMLC: {
                required: true,
                accept: 'text/xml, application/xml, text/plain',
            }
        };

        let messages = {
            AXMLC: {
                required: 'Campo Obrigatório!',
                accept: 'Formato Inválido!',
            }
        };

        cargaForm.submit(function (e) {
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

                let formData = new FormData(cargaForm[0]);

                $.ajax({
                    method: 'POST',
                    url: cargaForm.attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).then(response => {
                    if (response.status === 201) {
                        setTimeout($.unblockUI, 2000);
                        swal('Ótimo!', response.message, 'success');
                        setTimeout(function () {
                            window.location.href = "/admin/home";
                        }, 1500);
                    } else {
                        setTimeout($.unblockUI, 2000);
                        swal('Atenção!', 'Houve um error!', 'error');
                    }
                }).catch(response => {
                    if (response.status === 400) {
                        setTimeout($.unblockUI, 2000);
                        swal('Atenção!', response.message, 'error');
                    } else {
                        setTimeout($.unblockUI, 2000);
                        swal('Atenção!', 'Houve um error!', 'error');
                    }
                });
            }
        });
    };

    return {
        init: function () {
            validateArquivo();
        }
    };
}();

$(document).ready(function () {
    CargaCartorio.init();
});
