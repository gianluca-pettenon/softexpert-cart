{extends file="template/layout.php"}
{block name=main}

<div class="col-lg-10 offset-lg-1">
    <div class="card border-0">
        <div class="card-header text-white bg-dark border-0">Administrador</div>
        <div class="card-body">

            <ul id="tabAdmin" class="nav nav-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#adminProducts" role="tab">Produtos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#adminTypeProducts" role="tab">Tipo de Produtos</a>
                </li>

            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="adminProducts" role="tabpanel"><br>
                    <table id="tblProducts" class="table table-hover" style="font-size: 10px; width: 100%"></table>
                </div>

                <div class="tab-pane" id="adminTypeProducts" role="tabpanel"><br>
                    <table id="tblTypeProducts" class="table table-hover" style="font-size: 10px; width: 100%"></table>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalProduct" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Adicionar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" id="formProduct">

                    <div class="row">

                        <div class="col-lg-8">
                            <div class="form-group mb-2">
                                <label for="txtProductName" class="form-label fw-bold mt-4">PRODUTO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="txtProductName" maxlength="100">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="txtProductPrice" class="form-label fw-bold mt-4">PRE&Ccedil;O <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" class="form-control" id="txtProductPrice">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label for="slcProductType" class="form-label fw-bold mt-4">TIPO DE PRODUTO <span class="text-danger">*</span></label>
                        <select class="form-select" id="slcProductType"></select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnProduct">Salvar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalType" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Adicionar Tipo de Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" id="formType">

                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtTypeName" name="txtTypeName" placeholder="Nome do produto" maxlength="100">
                                    <label for="txtTypeName">Nome <span class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtTypeTax" name="txtTypeTax" placeholder="Percentual do Imposto">
                                    <label for="txtTypeTax">Percentual do Imposto<span class="text-danger">*</span></label>
                                </div>
                            </div>

                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary btn-sm" id="btnType">Salvar</button>
                </div>

                </form>

            </div>
        </div>
    </div>

    {/block}