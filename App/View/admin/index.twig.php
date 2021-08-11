{% extends 'partials/body.twig.php'  %}

{% block title %}Administrador{% endblock %}

{% block body %}

<div class="col-lg-10 offset-lg-1">
    <div class="card">
        <div class="card-header text-white bg-primary">Administrador</div>
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

<div class="modal fade" id="modalType" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Adicionar Tipo de Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtTypeName" name="txtTypeName" placeholder="Nome do produto">
                        <label for="txtTypeName">Nome <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtTypeDescription" name="txtTypeDescription" placeholder="Descri&ccedil;&atilde;o">
                        <label for="txtTypeDescription">Descri&ccedil;&atilde;o</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="txtTypeTax" name="txtTypeTax" placeholder="Imposto">
                        <label for="txtTypeTax">Imposto <span class="text-danger">*</span></label>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-sm">Salvar</button>
            </div>
        </div>
    </div>
</div>

{% endblock %}