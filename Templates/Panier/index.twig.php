{% extends "layout.php" %}

{% block content %}
<style>
    .brown-background {
        background-color: #8B4513;
        padding: 20px;
        border-radius: 10px;
        color: white;
        margin-bottom: 20px;
    }

    .btn-brown {
        background-color: #8B4513;
        color: white;
    }
</style>

<div class="container mt-5 brown-background">
    <h2>Votre Panier</h2>
    {% if articles is not empty %}
        <table class="table">
            <thead>
                <tr>
                    <th>Nom du Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                {% for item in articles %}
                    <tr>
                        <td>{{ item.produit.name }}</td>
                        <td>{{ item.quantite }}</td>
                        <td>{{ item.produit.price }} €</td>
                        <td>{{ item.produit.price * item.quantite }} €</td>
                        <td>
                            <!-- Utilisation d'un formulaire POST pour la suppression -->
                            <form action="/Panier/supprimerDuPanier/{{item.produit.id}}" method="post">
                                <input type="hidden" name="idProduit" value="{{ item.produit.id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
        <p>Total du Panier: {{ total }} €</p>

        <!-- Bouton "Payer" -->
            <a href="/Update/addressdispo" class="btn btn-primary btn-brown">Payer</a>
      

    {% else %}
        <p>Votre panier est vide.</p>
    {% endif %}
</div>
{% endblock %}
