{extends file="template/layout.php"}
{block name=main}

<div class="col-lg-12 offset-lg-0">

    <div class="card">
        <div class="card-header text-white bg-dark">Fa&ccedil;a suas Compras</div>
        <div class="card-body">

            <div class="row">

                <div class="col-lg-6">
                    <table id="tblCart" class="table table-hover" style="font-size: 10px; width: 100%"></table>
                </div>

                <div class="col-lg-6">
                    <h3>Meu Carrinho</h3><hr>

                    <div id="cartProducts"></div>

                    <div class="col-lg-4 mt-5">
                        <b>Imposto</b>: <span id="cartTaxTotal">0</span><br>
                        <b>Total</b>: <span id="cartTotal">0</span>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

{/block}