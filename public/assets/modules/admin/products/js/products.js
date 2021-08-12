$(document).ready(function () {

    $("#tblProducts").DataTable({
        ajax: {
            url: '/product',
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $.blockUI('Processando...');
            },
            dataSrc: function (data) {
                //console.log(data);
                if (data) {

                    //Message.Toast(data);

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

        columns:
            [
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
                    $('#modalProduct').modal('show');
                }
            },
        ],

        language: Language.DataTable

    });

});