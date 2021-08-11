const App = {

    Init: function () {

        $('input[type="text"]').prop('autocomplete', 'off');

    }
}

const Fill = {

    Select: function (seletor, data) {

        var options = [];

        options.push($('<option/>').val(null).text('Selecione'));

        for (var i in data) {
            options.push($('<option/>').val(data[i].ID).text(data[i].TEXT));
        }

        seletor.html(options);

    },

}

const Message = {

    Toast: function (data) {

        if (data.message) {

            switch (data.class) {

                case 'success':
                    toastr.success(data.message, { "showMethod": "slideDown", "hideMethod": "slideDown", timeOut: 2500 });
                break;

                case 'warning':
                    toastr.warning(data.message, { "showMethod": "slideDown", "hideMethod": "slideDown", timeOut: 2500 });
                break;

                case 'info':
                    toastr.info(data.message, { "showMethod": "slideDown", "hideMethod": "slideDown", timeOut: 2500 });
                break;

                case 'danger':
                    toastr.error(data.message, { "showMethod": "slideDown", "hideMethod": "slideDown", timeOut: 2500 });
                break;

                default:
                    toastr.error(data.message, { "showMethod": "slideDown", "hideMethod": "slideDown", timeOut: 2500 });
                break;

            }

        }

    },
}

const Validate = {

    onlyLetters: function (value) {
        return /[A-z][ ][A-z]/.test(value);
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

App.Init();