{% extends "layout.php" %}

{% block content %}
    <div class="container mt-5">
        <h2 style="color: #8B4513">Mes commandes</h2>
        {% if order %}
            <div class="row mt-4">
                {% for command in order %}
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body bg-brown text-brown">
                                <h5 class="card-title"  style="color: #8B4513">Commande #{{ command.id }}</h5>
                                <p class="card-text" style="color: #8B4513">Type de paiement: {{ command.payment_type }}</p>
                                <p class="card-text" style="color: #8B4513">Date de commande: {{ command.date }}</p>
                                <p class="card-text" style="color: #8B4513">Statut: {{ command.status }}</p>
                                <p class="card-text" style="color: #8B4513">Total: {{ command.total }} €</p>
                                <a href="#" class="btn btn-light" style="color: #8B4513">Détails</a>
                                <a href="/Facture/facture/{{ command.id }}" class="btn btn-success" style="color: white">Télécharger une facture</a>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        {% else %}
            <p>Aucune commande trouvée.</p>
        {% endif %}
    </div>
{% endblock %}
