const App = {

    init: () => {

        document.addEventListener("DOMContentLoaded", () => {

            document.querySelector('input[type="text"]').setAttribute('autocomplete', 'off');

        });
    },

    toolbar: () => {

        const currentUri = window.location.pathname;
        const navLink = document.querySelectorAll('.nav-link');

        navLink.forEach(element => {

            let elementHref = element.getAttribute('href');

            element.classList.remove('active');

            if (elementHref == currentUri) {
                element.classList.add('active');
            }

        });

    },

}

const Modal = {

    show: (element) => {

        let modal = new bootstrap.Modal(document.getElementById(element), {});
        modal.show();

    },

    hide: (element) => {

        let modal = new bootstrap.Modal(document.getElementById(element), {});
        modal.hide();

    }

}

const Config = {

    toast: () => {
        return {
            showMethod: "slideDown",
            hideMethod: "slideDown",
            preventDuplicates: true,
            timeOut: 2500
        };
    },

}

const Fill = {

    select: (seletor, data) => {

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

    Toast: (data) => {

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

    onlyLetters: (value) => {
        return /[A-z][ ][A-z]/.test(value);
    },

    requiredFields: (fields) => {

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

    checkMaxLengthFields: (fields) => {

        for (let i = 0; i < fields.length; i++) {

            let element = fields[i];

            if (element.maxLength !== undefined) {

                if (element.value.length > element.maxLength) {
                    Message.Toast({ 'message': 'Caracteres exedidos.', 'class': 'warning' });
                    return true;
                }

            }

        }

        return true;

    },

    checkPercentage: (fields) => {

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

const Serialize = {

    result: (data) => {

        if (data.error) {
            Message.Toast(data);
        }

        if (data.data) {
            return data.data;
        }

        return {};

    },

};

const Request = {

    create: (params) => {

        if (!params.url) {
            return Message.Toast({ 'message': 'URL não informada.', 'class': 'warning' });
        }

        fetch(params.url).then(response => {
            return response.text();
        }).then(data => {
            return data;
        });

    }

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