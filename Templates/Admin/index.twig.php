{% extends "layout.php" %}

{% block content %}

        {% if admin %}
            <div class="container mt-5" style="color: #8B4513;">
                <h2>Liste des Commandes</h2>
                {% for order in orders %}
                    <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Commande #{{ order.id}}</h5>
                                <p class="card-text"><strong>Date de commande:</strong> {{ order.date }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ order.status }}</p>
                                {% if order.status==10 %}
                                    
                                    <div class="alert alert-success">
                                        <h1><small>Colis expedié !</small></h1>
                                    </div>
                                {% endif %}

                                <p class="card-text"><strong>Destinaire : </strong> {{order.firstname}},{{order.lastname}},{{ order.add1}}</p>
                                <p class="card-text"><strong>Total:</strong> {{ order.total }}</p>
                            
                                <div class="d-flex">
                                    <!-- Bouton "Visualiser contenu de la commande" -->
                                    <a href="/Update/getOrders/{{order.id}}/{{order.customer_id}}"  class="btn btn-primary mr-2" style="background-color: #8B4513;">Visualiser contenu de la commande</a>
                                    

                                    {% if order.status != 10 %}
                                    <!-- Bouton "Confirmer l'expédition" -->
                                        <form action="/Update/ConfirmExpedition/{{ order.id }}" method="post">
                                            <button type="submit" class="btn btn-success" style="background-color: #8B4513;">Confirmer l'expédition</button>
                                        </form>
                                    {% endif %}
                                </div>
                            </div>
                        
                    </div>
                {% endfor %}
            </div>
        {% else %}
            <p>vous n'avez pas accès à cette page</p>
        {% endif %}
{% endblock %}
