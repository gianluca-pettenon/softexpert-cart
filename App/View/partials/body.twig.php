<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{BASEURL}}/assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{BASEURL}}/assets/my/css/custom.css">
    <title>{% block title %}{% endblock %}</title>
</head>

<body>

    {% include 'partials/header.twig.php' %}

    
    <div class="container mt-5">
        {% block body %}{% endblock %}
    </div>

    <script src="{{BASEURL}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{BASEURL}}/assets/libs/jquery/js/jquery.min.js"></script>
    <script src="{{BASEURL}}/assets/libs/jquery/js/jquery.mask.min.js"></script>
    <script src="{{BASEURL}}/assets/libs/jquery/js/jquery.blockui.min.js"></script>
    <script src="{{BASEURL}}/assets/libs/toastr/js/toastr.min.js"></script>
    <script src="{{BASEURL}}/assets/libs/datatable/js/datatable.min.js"></script>
    <script src="{{BASEURL}}/assets/my/js/my.js"></script>
    <script src="{{BASEURL}}/assets/modules/admin/products/js/products.js"></script>
    <script src="{{BASEURL}}/assets/modules/admin/products/js/type-products.js"></script>
</body>

</html>