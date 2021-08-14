{% extends 'partials/body.twig.php'  %}

{% block title %}{{title}} - {% endblock %}

{% block body %}
<div class="max-width center-screen bg-white padding mt-5">
    
    <h1>{{title}}</h1>

    <hr>

    <p>{{description}}</p>

    {% if link != null %}
    <a href="{{link}}" class="btn btn-info">Voltar</a>
    {% endif %}

</div>
{% endblock %}