{% extends "layout.php" %}

{% block content %}
<style>
    .brown-background {
        background-color: #8B4513; /* Couleur marron */
        padding: 20px;
        border-radius: 10px;
        color: white;
        margin-bottom: 20px;
    }

    .instruction-text {
        font-size: 16px;
        margin-top: 20px;
    }
</style>

<div class="container mt-5">
    <div class="brown-background">
        <h1>Commande passée avec succès !</h1>
        <p>Merci d'avoir passé commande. Votre colis sera expédié prochainement.</p>

        <!-- Formulaire pour télécharger la facture -->
        <form action="/Facture/NewFacture" method="post">
            <button type="submit" class="btn btn-primary">Télécharger une facture</button>
        </form>

        <a href="/Accueil" class="btn btn-success">Retourner à l'accueil</a>

        <!-- Instructions pour l'envoi d'un chèque -->
        <div class="instruction-text">
            <p>Pour finaliser votre commande, veuillez envoyer un chèque à l'ordre de <strong>ISIWEB4SHOP</strong>.</p>
            <p>Adressez votre chèque à l'adresse suivante :</p>
            <p><strong>ISIWEB4SHOP</strong><br>
            Service des Commandes<br>
            123, Avenue des Exemples<br>
            75000 Paris</p>
            <p>N'oubliez pas d'inclure le numéro de votre commande pour un traitement rapide et efficace.</p>
        </div>
    </div>
</div>
{% endblock %}
