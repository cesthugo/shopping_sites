{% extends "layout.php" %}

{% block content %}

  <div class="page-title" style="color: #8B4513;">
    <h1>Nos produits</h1>
  </div>

  <!-- Afficher les biscuits sous forme de cartes -->
  <div class="row mt-4">
  {% for produit in listeprods %}
      <div class="col-lg-4 mb-4">
        <div class="card">
          <a href="/Produits/description/{{produit.id}}" class="text-dark text-decoration-none categorie-card">
            <img src="../../src/image/{{produit.image }}" class="card-img-top" alt="{{ biscuit.name }}">
            <div class="card-body">
              <h5 class="card-title">{{ produit.name }}</h5>
              <p class="card-text">{{ produit.description }}</p>
              <p class="card-text">Prix: {{ produit.price }} €</p>
              <!-- Ajoutez d'autres détails du biscuit ici si nécessaire -->
            </div>
          </a>
        </div>
      </div>
    {% endfor %}
  </div>
{% endblock %}