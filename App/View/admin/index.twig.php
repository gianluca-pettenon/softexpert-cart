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
                    <p>Ipsum Lorem</p>
                </div>

            </div>

        </div>
    </div>
</div>

{% endblock %}