const App = {

    init: () => {

        const element = document.querySelectorAll('input[type="text"]');

    },

    toolbar: () => {

        const uri = window.location.pathname;
        //const element = document.querySelectorAll('.nav-link');
        //console.log(element);
        $(".nav-link").each(function() {

            let href = $(this).attr("href");

            $(this).removeClass("active");

            if (href == uri) {
                $(this).addClass("active");
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