document.addEventListener("DOMContentLoaded", () => {

    const btnType = document.getElementById("btnType");

    $("#txtTypeTax").mask("##0.00", { reverse: true });

    const Fields = {

        get: () => {

            return [
                {
                    field: "name",
                    value: document.getElementById("txtTypeName").value,
                    required: true,
                    maxLength: 100,
                },
                {
                    field: "price",
                    value: document.getElementById("txtTypeTax").value,
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
                    title: "IMPOSTO",
                    data: "price",
                    render: (row) => {
                        return row + "%";
                    }
                },
            ]
        }
    }

    var tblTypeProducts = $("#tblTypeProducts").DataTable({
        ajax: {
            url: "/type-product",
            type: "POST",
            dataType: "json",
            dataSrc: (data) => {
                return Serialize.result(data);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr);
                Message.Toast({ "message": thrownError, "class": "danger" });
            },
            complete: (xhr, status) => { },
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
                    Modal.show("modalType");
                }
            },
        ],
        language: Language.DataTable

    });

    btnType.addEventListener("click", () => {

        const fields = Fields.get();

        if (Validate.requiredFields(fields)) {
            return false;
        }

        if (!Validate.checkPercentage(fields)) {
            return false;
        }

        btnType.setAttribute("disabled", true);


        $.ajax({
            url: "/type-product/create",
            type: "POST",
            data: { data: JSON.stringify(fields) },
            success: (data) => {

                if (data) {
                    Message.Toast(data);
                }

                tblTypeProducts.ajax.reload();

            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr);
                Message.Toast({ "message": thrownError, "class": "danger" });
            },
            complete: (xhr, status) => {
                $("#formType").trigger("reset");
            },
        });

        btnType.setAttribute("disabled", false);

        Modal.hide("modalType");
        $("#").modal("hide");

    });

});