document.addEventListener("DOMContentLoaded", () => {

    const btnProduct = document.getElementById("btnProduct");
    var tblProducts = null;

    const Fields = {

        get: () => {

            return [
                {
                    field: "name",
                    value: document.getElementById("txtProductName").value,
                    required: true,
                    maxLength: 100,
                },
                {
                    field: "type",
                    value: document.getElementById("slcProductType").value,
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

        columns: () => {
            return [
                {
                    title: "PRODUTO",
                    data: "name"
                },
                {
                    title: "PRE&Ccedil;O",
                    data: "price",
                    render: (row) => {
                        return "R$" + row;
                    }
                },
                {
                    title: "IMPOSTO",
                    data: "tax",
                    render: (row) => {
                        return "R$" + row;
                    }
                },
            ];
        },

    }

    $("#txtProductPrice").mask("##0.00", { reverse: true });

    tblProducts = $("#tblProducts").DataTable({
        ajax: {
            url: "/product",
            type: "POST",
            dataType: "json",
            dataSrc: (data) => {
                return Serialize.result(data);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr);
                Message.Toast({ "message": thrownError, "class": "danger" });
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
                className: "btn-info btn-sm",
                action: () => {
                    loadType();
                    Modal.show("modalProduct");
                }
            },
        ],

        language: Language.DataTable

    });

    btnProduct.addEventListener("click", () => {

        const fields = Fields.get();

        if (Validate.requiredFields(fields)) {
            return false;
        }

        btnProduct.setAttribute("disabled", true);

        $.ajax({
            url: "/product/create",
            type: "POST",
            data: { data: JSON.stringify(fields) },
            success: (data) => {

                if (data) {
                    Message.Toast(data);
                }

                tblProducts.ajax.reload();

            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr);
                Message.Toast({ "message": thrownError, "class": "danger" });
            },
            complete: (xhr, status) => {
                $("#formProduct").trigger("reset");
            },
        });

        btnProduct.setAttribute("disabled", false);

        Modal.hide("modalProduct");

    });

    function loadType() {

        $.ajax({
            method: "POST",
            url: "/type-product",
            success: (data) => {

                const result = Serialize.result(data);

                Fill.select($("#slcProductType"), result);

            },
        });

    }

});