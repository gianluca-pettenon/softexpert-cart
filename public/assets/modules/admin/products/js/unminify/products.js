$(document).ready(function () {

    $('#txtProductPrice').mask('##0.00', { reverse: true });

    var tblProducts = $("#tblProducts").DataTable({
        ajax: {
            url: '/product',
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

        columns:
            [
                {
                    title: "PRODUTO",
                    data: "name"
                },
                {
                    title: "PRE&Ccedil;O",
                    data: "price"
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
                    $('#modalProduct').modal('show');
                }
            },
        ],

        language: Language.DataTable

    });

    $("#btnProduct").off("click").on("click", function () {

        var params = {
            'name': $("#txtProductName").val(),
            'type': $("#txtProductType").val(),
            'price': $("#txtProductPrice").val(),
        };

        if (params['name'] == null || params['name'] == "") {
            Message.Toast({ 'message': 'Produto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

        if (params['type'] == null || params['type'] == "") {
            Message.Toast({ 'message': 'Tipo de produto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

        if (params['price'] == null || params['price'] == "") {
            Message.Toast({ 'message': 'Valor do produto n&atilde;o informado.', 'class': 'warning' });
            return false;
        }

        $("#btnProduct").prop('disabled', true);

        $.ajax({
            url: '/product/create',
            type: 'POST',
            data: params,
            success: function (data) {

                if (data) {
                    Message.Toast(data);
                }

                tblProducts.ajax.reload();

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
                Message.Toast({ 'message': thrownError, 'class': 'danger' });
            },
            complete: function (xhr, status) {
                $("#formProduct").trigger('reset');
            },
        });

        $("#btnProduct").prop('disabled', false);

        $('#modalProduct').modal('hide');

    });

    function loadType() {
        $.ajax({
            url: '/product/type',
            type: 'POST',
            success: function (data) {
                if (data) {
                    Fill.Select($("#txtProductType"), data.data);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
                Message.Toast({ 'message': thrownError, 'class': 'danger' });
            },
            complete: function (xhr, status) { },
        });
    }


    loadType();

});