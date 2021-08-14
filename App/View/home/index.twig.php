{% extends 'partials/body.twig.php'  %}

{% block title %}In&iacute;cio {% endblock %}

{% block body %}

<div class="col-lg-10 offset-lg-1">
    <div class="card">
        <div class="card-header text-white bg-primary">Fa&ccedil;a suas Compras</div>
        <div class="card-body">

            <div class="row">

                <div class="col-lg-6">
                    <table id="tblCart" class="table table-hover" style="font-size: 10px; width: 100%"></table>
                </div>

                <div class="col-lg-4">
                    <h1>Total</h1>
                </div>

            </div>

        </div>
    </div>
</div>

{% endblock %}