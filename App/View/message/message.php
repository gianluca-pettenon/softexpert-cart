{% extends 'partials/body.twig.php'  %}

{% block title %}Not found{% endblock %}

{% block body %}
    <div class="card mb-3">
        <div class="card-header">{{title}}</div>
        <div class="card-body">
            <p class="card-text">{{message}}</p>
        </div>
    </div>

{% endblock %}