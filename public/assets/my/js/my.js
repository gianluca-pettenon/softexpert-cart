const App = {

    init: function () {
        $('input[type="text"]').prop('autocomplete', 'off');
    },

    toolbar: function () {

        let uri = window.location.pathname;

        $(".nav-link").each(function () {

            let href = $(this).attr("href");

            $(this).removeClass("active");

            if (href == uri) {
                $(this).addClass("active");
            }

        });

    },

}

const Config = {

    toast: function () {
        return {
            showMethod: "slideDown",
            hideMethod: "slideDown",
            timeOut: 2500
        };
    },

}

const Request = {

    create: function (params) {

        if (params.url == undefined) {
            return { 'error': true, 'message': 'URL n&atilde;o definida.', 'class': 'error' };
        }

        if (params.data == undefined) {
            params.data = {};
        }


        fetch(`${params.url}`)
            .then((body) => body.json())
            .then((data) => {
                console.log(data)
            })
            .catch((error) => console.error('Erro:', error.message || error))

    },

}

const Fill = {

    Select: function (seletor, data) {

        let options = [];

        options.push($('<option/>').val(null).text('Selecione'));

        for (let key in data) {
            if (data.hasOwnProperty(key)) {
                options.push($('<option/>').val(data[key].id).text(data[key].name));
            }
        }

        seletor.html(options);

    },

}

const Message = {

    Toast: function (data) {

        if (data.message) {

            switch (data.class) {

                case 'success':
                    return toastr.success(data.message, Config.toast);

                case 'warning':
                    return toastr.warning(data.message, Config.toast);

                case 'info':
                    return toastr.info(data.message, Config.toast);

                case 'danger':
                    return toastr.error(data.message, Config.toast);

                default:
                    return toastr.error(data.message, Config.toast);

            }

        }

    },
}

const Validate = {

    onlyLetters: function (value) {
        return /[A-z][ ][A-z]/.test(value);
    },

    requiredFields: function (fields) {

        for (let i = 0; i < fields.length; i++) {

            let element = fields[i];

            if (element.required !== undefined && element.required) {

                if (element.value == null || element.value == "") {
                    Message.Toast({ 'message': 'Preencha os campos obrigat&oacute;rios.', 'class': 'warning' });
                    return true;
                }

            }

        }

        return false;
    },

    checkPercentage: function (fields) {

        for (let i = 0; i < fields.length; i++) {

            let element = fields[i];

            if (parseFloat(element.value) > 100) {
                Message.Toast({ 'message': 'Percentual maior que 100%', 'class': 'warning' });
                return false;
            }

        }

        return true;
    },

};

const Language = {

    DataTable: {
        "decimal": "",
        "emptyTable": "Nenhum registro encontrado.",
        "info": "Mostrando _START_ at&eacute; _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
        "infoFiltered": "(Filtrado de _MAX_ registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Carregando...",
        "processing": "Processando...",
        "search": "_INPUT_",
        "searchPlaceholder": "Busca",
        "zeroRecords": "Nenhum registro encontrado.",
        "paginate": {
            "first": "Primeiro",
            "last": "&Uacute;ltimo",
            "next": "Pr&oacute;ximo",
            "previous": "Anterior"
        },
        "aria": {
            "sortAscending": ": ative para organizar a coluna em ordem ascendente",
            "sortDescending": ": ative para organizar a coluna em ordem descendente"
        },
        "buttons": {
            "pageLength": "Registros",
            "colvis": "Colunas",
            "colvisRestore": "Restaurar"
        }
    },

};

App.init();
App.toolbar();