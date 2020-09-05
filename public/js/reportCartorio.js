const ReportCartorio = function () {
    let initPlugin = function () {
        calendarDate('startDate', start = '');
        calendarDate('endDate', start = '');
    };

    let validaForm = function () {
        let formReport = $("#reportForm");

        let rules = {
            uf: {
                required: true,
            },
            date_start: {
                required: true,
            },
            date_end: {
                required: true,
            }
        };

        let messages = {
            uf: {
                required: 'O campo é obrigatório!',
            },
            date_start: {
                required: 'O campo é obrigatório!',
            },
            date_end: {
                required: 'O campo é obrigatório!',
            }
        };

        formReport.submit(function (e) {
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

                requisicao(formReport.attr('action'), formReport.serialize(), 'POST')
                    .then(response => {
                        console.log(response);
                        // if (response.status === 201) {
                        //     setTimeout($.unblockUI, 2000);
                        //     swal('Ótimo!', response.message, 'success');
                        //     setTimeout(function () {
                        //         window.location.href = "/admin/home";
                        //     }, 1500);
                        // } else {
                        //     setTimeout($.unblockUI, 2000);
                        //     swal('Atenção!', 'Houve um error!', 'error');
                        // }
                    }).catch(response => {
                        // if (response.responseJSON.status === 400) {
                        //     setTimeout($.unblockUI, 2000);
                        //     swal('Atenção!', response.responseJSON.message, 'error');
                        // } else {
                        //     setTimeout($.unblockUI, 2000);
                        //     swal('Atenção!', 'Houve um error!', 'error');
                        // }
                    });
            }
        });
    };

    return {
        init: function () {
            initPlugin();
            // validaForm();
        }
    };
}();

$(document).ready(function () {
    ReportCartorio.init();
});
