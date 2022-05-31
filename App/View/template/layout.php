<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/my/css/custom.css">
    <title>gianluca-pettenon/softexpert-cart</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
                <a class="logo" href="javascript:void(0)"></a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="/">In&iacute;cio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Administrador</a>
                    </li>

                </ul>

                <div class="d-flex">
                    <button class="btn btn-warning my-2 my-sm-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Carrinho</button>
                </div>

            </div>

        </div>
    </nav>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>

    <div class="container mt-5">
        {block name=main}{/block}
    </div>

    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/jquery/js/jquery.min.js"></script>
    <script src="/assets/libs/jquery/js/jquery.mask.min.js"></script>
    <script src="/assets/libs/toastr/js/toastr.min.js"></script>
    <script src="/assets/libs/simple-datatables/js/simple-datatables.js"></script>

    <script src="/assets/my/js/my.js"></script>
    <!--<script src="/assets/modules/admin/products/js/products.min.js"></script>
    <script src="/assets/modules/admin/products/js/type.min.js"></script>
    <script src="/assets/modules/cart/js/cart.min.js"></script>-->
    <script src="/assets/modules/cart/js/cart.min-old.js"></script>
</body>

</html>