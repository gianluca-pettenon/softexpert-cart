$(document).ready(function () {

    $('#txtTypeTax').mask('##0.00', { reverse: true });

    var tblTypeProducts = $("#tblTypeProducts").DataTable({
        ajax: {
            url: '/product/type',
            type: "POST",
            dataType: "json",
            dataSrc: function (data) {
                if (data) {
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
            complete: function (xhr, status) { },
        },

        columns: [
            {
                title: "PRODUTO",
                data: "name"
            },
            {
                title: "IMPOSTO",
                data: "price",
                render: function (data, type, row) {
                    return data + '%';
                }
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
                className: "btn-info btn-sm",
                action: function (e, dt, node, config) {
                    $('#modalType').modal('show');
                }
            },
        ],

        language: Language.DataTable

    });

    $("#btnType").off("click").on("click", function () {

        var params = {
            'name': $("#txtTypeName").val(),
            'price': $("#txtTypeTax").val(),
        };

        if (params['name'] == null || params['name'] == "") {
            Message.Toast({ 'message': 'Tipo de produto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

        if (params['price'] == null || params['price'] == "") {
            Message.Toast({ 'message': 'Percentual do imposto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

        if (parseFloat(params['price']) > 100) {
            Message.Toast({ 'message': 'Percentual n&atilde;o fecha em 100%', 'class': 'warning' });
            return false;
        }

        $("#btnType").prop('disabled', true);

        $.ajax({
            url: '/product/type/create',
            type: 'POST',
            data: params,
            success: function (data) {

                if (data) {
                    Message.Toast(data);
                }

                tblTypeProducts.ajax.reload();

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
                Message.Toast({ 'message': thrownError, 'class': 'danger' });
            },
            complete: function (xhr, status) {
                $("#formType").trigger('reset');
            },
        });

        $("#btnType").prop('disabled', false);

        $('#modalType').modal('hide');

    });

});