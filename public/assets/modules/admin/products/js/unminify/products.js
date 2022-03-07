document.addEventListener("DOMContentLoaded", function(e) {

    const btnProduct = document.getElementById("btnProduct");

    const Fields = {

        get: function () {

            return [
                {
                    field: "name",
                    value: document.getElementById("txtProductName").value,
                    required: true,
                    maxLength: 100,
                },
                {
                    field: "type",
                    value: document.getElementById("txtProductType").value,
                    required: true,
                },
                {
                    field: "price",
                    value: document.getElementById("txtProductPrice").value,
                    required: true,
                }
            ];

        },

    }

    const Table = {

        get: function () {

        },

        columns: function () {
            return [
                {
                    title: "PRODUTO",
                    data: "name"
                },
                {
                    title: "PRE&Ccedil;O",
                    data: "price",
                },
                {
                    title: "IMPOSTO",
                    data: "tax",
                },
            ];
        },

    }

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
        },

        columns: Table.columns(),
        processing: false,
        bInfo: false,
        ordering: false,
        responsive: true,
        dom: "Bfrtp",
        buttons: [
            {
                text: "ADICIONAR",
                className: "btn-dark btn-sm",
                action: function () {
                    $('#modalProduct').modal('show');
                }
            },
        ],

        language: Language.DataTable

    });

    btnProduct.addEventListener("click", () => {

        let fields = Fields.get();

        if (Validate.requiredFields(fields)) {
            return false;
        }

        $("#btnProduct").prop('disabled', true);

        $.ajax({
            url: "/product/create",
            type: "POST",
            data: fields,
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

    async function loadType() {

        let getData = Request.create({
            url: '/product/type'
        })

        return console.log(getData);

        if (data) {
            Fill.Select($("#txtProductType"), data.data);
        }

    }


    loadType();

});