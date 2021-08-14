$(document).ready(function () {

    var tblCart = $("#tblCart").DataTable({
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
                    data: "price",
                    render: function (data, type, row) {
                        return 'R$' + data;
                    }
                },
                {
                    title: "PERC. TIPO PRODUTO",
                    data: "tax",
                    render: function (data, type, row) {
                        return data + '%';
                    }
                },
                {
                    title: "QUANTIDADE",
                    data: "amount",
                    render: function (data, type, row) {
                        return "<input type='number' class='form-control form-control-sm text-center cart-amount' style='width: 75px' autocomplete='off' min='0' max='10' step='1' value='0'>";
                    }
                }

            ],
        columnDefs: [
            {
                "targets": [2],
                "className": "text-center"
            },
        ],

        processing: false,
        bInfo: false,
        ordering: false,
        responsive: true,
        drawCallback: function (settings) {

            $('.cart-amount').on("change", function () {
                tblCart.row($(this).closest("tr")).data().amount = $(this).val();
            });

        },

        language: Language.DataTable

    });

    $("#tblCart tbody").on("change", ".cart-amount", function () {

        var data = tblCart.row($(this).closest("tr")).data();
        console.log(data, 'data');
        
        var productId = $('#' + data.id + '-product');
        var html = "";

        if (!productId.length) {
            html += "<div id='" + data.id + "-product'>";
            html += "<b>Produto</b>: " + data.name + "<br>";
            html += "<b>Quantidade</b>: <span class='amount'>" + data.amount + "</span><br>";
            html += "<b>Preço</b>: <span class='price'>" + data.price + "</span><br>";
            html += "<b>Imposto</b>: <span class='tax'>" + ((parseFloat(data.price) * parseFloat(data.tax)) / 100).toFixed(2) + "</span><br><br>";
            html += "<b>Total</b>: <span class='productTotal'>" + data.price + "</span><br>";
            html += "<hr></div>";
        } else {

            productId.find('span.amount').html(data.amount).end();

            if (data.amount == 0) {
                productId.remove();
            }else if(data.amount == 1) {
                productId.find('span.productTotal').html(data.price).end();
            } else if (data.amount > 1) {
                productId.find('span.productTotal').html((parseFloat(data.price) * parseFloat(data.amount))).end();
            }

        }

        $("#cartProducts").append(html);

    });



});