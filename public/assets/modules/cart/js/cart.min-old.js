document.addEventListener("DOMContentLoaded", () => {

    const tblCart = document.querySelector("#tblCart");

    const Table = {

        columns: () => {
            return [
                "PRODUTO",
                "PRE&Ccedil;O",
                "PERC. TIPO PRODUTO",
                "A&Ccedil;&Atilde;O"
            ];
        },

        data: () => {

            return Request.create({
                method: "POST",
                url: "/product"
            });
        },

        init: () => {

            return {
                headings: Table.columns(),
                data: Table.data(),
            }
        },

    };

    let data = Table.data();
    console.log(data);

    let dataTable = new simpleDatatables.DataTable(tblCart, {
        searchable: false,
        fixedHeight: true,
    });

    //dataTable.insert(Table.init());


    /*var tblCart = $("#").DataTable({
        ajax: {
            url: "/product",
            type: "POST",
            dataType: "json",
            dataSrc: (data) => {
                console.log(data);
                if (data) {
                    if (data.data) {
                        return data.data;
                    }
                }

                return {};
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr);
                Message.Toast({ "message": thrownError, "class": "danger" });
            },
            complete: (xhr, status) => { },
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
                    render: (data) => {
                        return "R$" + data;
                    }
                },
                {
                    title: "PERC. TIPO PRODUTO",
                    data: "tax",
                    render: (data) => {
                        return data + "%";
                    }
                },
                {
                    title: "A&Ccedil;&Atilde;O",
                    render: (data) => {
                        console.log(data);
                        return "<button type="button" class="btn btn-success btn-sm fw-bold" onclick="productInCart("+data+")">COMPRAR</button>";
                    },
                }

            ],
        columnDefs: [
            {
                "targets": [2, 3],
                "className": "text-center"
            },
        ],

        processing: false,
        bInfo: false,
        ordering: false,
        responsive: true,
        language: Language.DataTable

    });

    $("#tblCart tbody").on("change", ".cart-amount", function () {



        //productInCart(productInCart);
        return;

        var productId = $("#" + data.id + "-product");

        if (!productId.length) {
            var html = "";
            html += "<div id="" + data.id + "-product">";
            html += "<b>Produto</b>: " + data.name + "<br>";
            html += "<b>Quantidade</b>: <span class="amount">" + data.amount + "</span><br>";
            html += "<b>Pre&ccedil;o</b>: <span class="price">" + data.price + "</span><br>";
            html += "<b>Imposto</b>: <span class="tax">" + ((parseFloat(data.price) * parseFloat(data.tax)) / 100).toFixed(2) + "</span><br><br>";
            html += "<b>Total</b>: <span class="productTotal">" + data.price + "</span><br>";
            html += "<hr>";
            html += "</div>";
        }

        productId.find("span.amount").html(data.amount).end();

        if (data.amount == 0) {
            productId.remove();
        } else if (data.amount == 1) {
            productId.find("span.productTotal").html(data.price).end();
        } else if (data.amount > 1) {
            productId.find("span.productTotal").html(((parseFloat(data.price) * parseFloat(data.amount))).toFixed(2)).end();
        }

        $("#cartProducts").append(html);

        var totalPrice = 0;
        $("span.productTotal").each(function () {
            var cenaEach = parseFloat($(this).text());
            totalPrice += cenaEach;
        });

        $("#cartTotal").html("R$" + totalPrice.toFixed(2));

        var totalTax = 0;
        $("span.tax").each(function () {
            var cenaEach = parseFloat($(this).text());
            totalTax += cenaEach;
        });

        $("#cartTaxTotal").html("R$" + totalTax.toFixed(2));

    });*/

});