{% extends "layout.php" %}

{% block content %}
    {% if admin %}
        <div class="container mt-5" style="background-color: #8B4513; padding: 20px; color: white;">
            <!-- Informations sur le client -->
            <h2>Récapitulatif de la commande</h2>
            <p><strong>Informations sur le client :</strong></p>
            <p>Nom Prénom : {{ info.forname }}</p>
            <p>Prenom : {{ info.surname }} </p>
            <p>Email : {{ info.email }}</p>
            <p>Téléphone : {{ info.phone }}</p>
            <p>Code Postal : {{ info.postcode }}</p>

            <!-- Produits commandés -->
            <p><strong>Produits commandés :</strong></p>
            <table class="table table-bordered table-striped mx-auto" style="color: white;"> <!-- Ajout de la classe mx-auto pour centrer -->
                <thead>
                    <tr>
                        <th style="color: white;">Nom du Produit</th>
                        <th style="color: white;">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    {% for product in tableauProducts %}
                        <tr>
                            <td style="color: white;">{{ product.productName }}</td>
                            <td style="color: white;">{{ product.quantity }}</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    {% else %}
        <div class="container mt-5" style="background-color: #8B4513; padding: 20px; color: white;">
            <p>Vous n'avez pas accès à cette page.</p>
        </div>
    {% endif %}
{% endblock %}
