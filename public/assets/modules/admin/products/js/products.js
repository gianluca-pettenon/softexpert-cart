$(document).ready(function() {

    $("#tblProducts").DataTable({
        ajax: {
            url: '/product',
            dataType: "json",
            type: "POST",
            beforeSend: function() {
                $.blockUI('Processando...');
            },
            dataSrc: function(data) {
                console.log(data);
                if (data) {

                    Message.Toast(data);

                    if (data.data) {
                        return data.data;
                    }
                }

                return {};
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr);
                Message.Toast({ 'message': thrownError, 'class': 'danger' });
            },
            complete: function(xhr, status) {
                $.unblockUI();
            },
        },

        columns: [{
            title: "PRODUTO",
            data: "product"
        }, ],

        bFilter: false,
        bInfo: false,
        bLengthChange: false,
        ordering: false,
        language: Language.DataTable,

    });

});