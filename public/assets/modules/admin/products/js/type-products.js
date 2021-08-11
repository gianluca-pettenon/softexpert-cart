$(document).ready(function () {

    $("#txtTypeTax").mask('#.##0,00', {reverse: true});

    $("#tblTypeProducts").DataTable({
        ajax: {
            url: '/product/type',
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $.blockUI('Processando...');
            },
            dataSrc: function (data) {
                if (data) {

                    Message.Toast(data);

                    if (data.data) {
                        return data.data;
                    }
                }

                return {};
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
                Message.Toast({ 'message': thrownError, 'class': 'danger' });
            },
            complete: function (xhr, status) {
                $.unblockUI();
            },
        },

        columns: [
            {
                title: "PRODUTO",
                data: "product"
            },
        ],

        processing: false,
        bInfo: false,
        ordering: false,
        responsive: true,
        dom: "Bfrtp",
        buttons: [
            {
                text: "Adicionar",
                className: "btn-success btn-sm",
                action: function (e, dt, node, config) {
                    $('#modalType').modal('show');
                }
            },
        ],

        language: Language.DataTable

    });

    $("#btnType").off("click").on("click", function () {

        var params = {
            'txtTypeName': $("#txtTypeName").val(),
            'txtTypeTax': $("#txtTypeTax").val(),
        };

        if (params['txtTypeName'] == null || params['txtTypeName'] == "") {
            Message.Toast({ 'message': 'Tipo de produto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

        if (params['txtTypeTax'] == null || params['txtTypeTax'] == "") {
            Message.Toast({ 'message': 'Valor do imposto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

    });

});