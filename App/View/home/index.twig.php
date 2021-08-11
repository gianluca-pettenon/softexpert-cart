{% extends 'partials/body.twig.php'  %}

{% block title %}In&iacute;cio {% endblock %}

{% block body %}

<div class="col-lg-10 offset-lg-1">
    <div class="card">
        <div class="card-header text-white bg-primary">Fa&ccedil;a suas Compras</div>
        <div class="card-body">

            <ul id="tabCustomer" class="nav nav-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#cartCustumer" role="tab">Meu Carrinho</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#cartProducts" role="tab">Produtos</a>
                </li>

            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="cartCustumer" role="tabpanel"><br>
                    <p>Lorem Ipsum</p>
                </div>

                <div class="tab-pane" id="cartProducts" role="tabpanel"><br>
                    <p>Ipsum Lorem</p>
                </div>

            </div>

        </div>
    </div>
</div>

{% endblock %}