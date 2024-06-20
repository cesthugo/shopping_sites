{% extends "layout.php" %}

{% block content %}
<style>

    .product-details {
      background-color: #8B4513; /* Marron */
      padding: 20px;
      border-radius: 10px;
      color: white; /* Texte en blanc */
    }

    .add-to-cart-btn {
      background-color: blue; /* Marron */
      color: white; /* Texte en blanc */
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 1.5rem;
      cursor: pointer;
    }
  </style>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6">
        <img src="../../src/image/{{ Produits.image }}" class="img-fluid rounded mb-4" alt="{{ Produits.name }}">
      </div>
      <div class="col-lg-6 product-details">
        <h1 class="display-4">{{ Produits.name }}</h1>
        <p class="lead">{{ Produits.description }}</p>
        <p class="font-weight-bold">Prix: {{ Produits.price }} €</p>

        {% if Produits.quantity!=0 %}
          <form action="/Panier/ajouterAuPanier/{{ Produits.id }}" method="post">
            <div class="form-group">
            <p><strong>Il ne reste plus que {{Produits.quantity}} produits en stock !</strong></p>

              <label for="quantite">Quantité :</label>
              <input type="number" class="form-control" id="quantite" name="quantite" value="1" min="1" max="{{Produits.quantity}}">
            </div>
            <button type="submit" class="btn btn-primary btn-lg add-to-cart-btn">Ajouter au panier</button>
          </form>
        {% else %}
          <p><strong>Ce produits est victime de son succès !</strong></p>
        {% endif %}






        {% if admin %}
        <!-- Formulaire de modification du stock -->
        <h2 class="mt-4">Modifier le Stock</h2>
        <form action="/Update/SetStock/{{Produits.id}}" method="post">
          <div class="form-group">
            <label for="nouveau-stock">Nouveau Stock :</label>
            <input type="number" class="form-control" id="nouveau-stock" name="nouveau_stock" min="0" required>
          </div>
          <button type="submit" class="btn btn-warning btn-lg">Modifier le Stock</button>
        </form>
        <!-- Fin du formulaire de modification du stock -->
        {% endif %}

        <!-- Avis des produits -->
        <h2 class="mt-4">Avis des clients</h2>
        {% if reviews is not empty %}
          <div class="card mt-3">
            <div class="card-body" style="color: #000;">
              {% for review in reviews %}
                <h5 class="card-title">{{ review.title }}</h5>
                <p class="card-text">{{ review.description }}</p>
                <!-- Affichage des étoiles dorées -->
                <p class="card-text d-flex align-items-center">
                  {% for star in 1..5 %}
                    {% if star <= review.stars %}
                      <img src="https://i.ibb.co/sKtNS1N/review-star.png" alt="Étoile dorée" class="star-icon">
                    {% else %}
                      <img src="https://i.ibb.co/4pMvmMp/review-gray.png" alt="Étoile grise" class="star-icon">
                    {% endif %}
                  {% endfor %}
                  <small class="text-muted ml-2">
                    {{ review.stars }} étoiles par {{ review.name_user }}
                  </small>
                </p>
                <!-- Vous pouvez également ajouter la photo de l'utilisateur ici -->
              {% endfor %}
            </div>
          </div>
        {% else %}
          <p class="mt-3">Aucun avis disponible pour le moment.</p>
        {% endif %}
        <!-- Fin des avis des produits -->
      </div>
    </div>
  </div>
  <style>
    .rounded {
      border-radius: 10px;
    }
    .btn-lg {
      font-size: 1.5rem;
      padding: 10px 20px;
    }

    .img-fluid {
    border: 5px solid #8B4513; /* Ajouter une bordure de 5px avec la couleur marron (#8B4513) */
    border-radius: 5px; /* Si vous souhaitez arrondir les coins de la bordure */
    }

    .star-icon {
      width: 20px; /* Ajustez la taille selon vos besoins */
      height: 20px; /* Ajustez la taille selon vos besoins */
      margin: 0 2px; /* Espace entre les étoiles */
    }
  </style>
{% endblock %}
