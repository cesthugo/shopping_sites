{% extends "layout.php" %}

{% block content %}
<main class="container mt-5 d-flex align-items-center">
    <div class="text-center border border-3 border-dark rounded p-3 mx-auto" style="max-width: 600px; color:#fcfafa; background-color: #8B4513;">
        <h1>Bienvenue sur isi4shop</h1>
        <p>Explorez notre boutique en ligne pour découvrir les dernières tendances.</p>
        {% if ad %}
            <h1> COMPTE ADMIN </h1>
        {% endif %}
        
        <h1>Bienvenue {{iduser}}</h1>
    </div>
</main>
<div class="row mt-4">
    {% for categorie in categories %}
        <div class="col-lg-4 mb-4">
            <a href="/Produits/getCat/{{categorie.id}}" class="text-dark text-decoration-none categorie-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #8B4513;">{{ categorie.name }}</h5>
                        <p class="card-text" style="color: #8B4513;">Découvrez notre sélection de {{ categorie.name }} de qualité.</p>
                    </div>
                </div>
            </a>
        </div>
    {% endfor %}
</div>

{% endblock %}
