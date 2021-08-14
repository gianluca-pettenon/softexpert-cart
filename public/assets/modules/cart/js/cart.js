$(document).ready(function () {

    var tblCart = $("#tblCart").DataTable({
        ajax: {
            url: '/product',
            type: "POST",
            dataType: "json",
            dataSrc: function (data) {
                console.log(data);
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
                    data: "price",
                    render: function (data, type, row) {
                        return 'R$' + data;
                    }
                },
                {
                    title: "IMPOSTO",
                    data: "tax",
                    render: function (data, type, row) {
                        return data + '%';
                    }
                },
                {
                    title:	"DIFEREN&Ccedil;A",
                    data:	"DIFERENCA",
                    defaultContent: "",
                    render: function(data, type, row) {
                        if (parseFloat(row['tax']) <= 100) {
                            return 'R$' + (parseFloat(row['price']) * parseFloat(row['tax'])) / 100;
                          }
                    }
                },
 
                {
					title:	"QUANTIDADE",
					data:	"QUANTIDADE",
					render: function(data, type, row) {
						return "<input type='number' class='form-control form-control-sm text-center cart-amount' style='width: 75px' autocomplete='off' min='0' max='10' step='1' value='0'>";
					}
				}

            ],

        processing: false,
        bInfo: false,
        ordering: false,
        responsive: true,
        language: Language.DataTable

    });

    $("#btnProduct").off("click").on("click", function () {

        console.log(true);

    });

});