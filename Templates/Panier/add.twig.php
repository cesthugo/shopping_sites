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

    .form-group {
        margin-bottom: 15px;
    }

    .btn-brown {
        background-color: #8B4513;
        color: white;
    }
</style>

<div class="container mt-5 brown-background">
    <h3>Ajouter une nouvelle adresse :</h3>
    <form action="/Update/newOrderNewUser" method="post">
        <div class="form-group">
            <label for="newFirstName">Prénom :</label>
            <input type="text" class="form-control" id="newFirstName" name="newFirstName" required>
        </div>
        <div class="form-group">
            <label for="newLastName">Nom :</label>
            <input type="text" class="form-control" id="newLastName" name="newLastName" required>
        </div>
        <div class="form-group">
            <label for="newStreet">Rue :</label>
            <input type="text" class="form-control" id="newStreet" name="newStreet" required>
        </div>
        <div class="form-group">
            <label for="newFloor">Étage :</label>
            <input type="text" class="form-control" id="newFloor" name="newFloor">
        </div>
        <div class="form-group">
            <label for="newCity">Ville :</label>
            <input type="text" class="form-control" id="newCity" name="newCity" required>
        </div>
        <div class="form-group">
            <label for="newPostalCode">Code postal :</label>
            <input type="text" class="form-control" id="newPostalCode" name="newPostalCode" required>
        </div>
        <div class="form-group">
            <label for="newPhoneNumber">Téléphone :</label>
            <input type="tel" class="form-control" id="newPhoneNumber" name="newPhoneNumber" required>
        </div>
        <div class="form-group">
            <label for="newEmail">Email :</label>
            <input type="email" class="form-control" id="newEmail" name="newEmail" required>
        </div>
        <div class="form-check form-group">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required>
            <label class="form-check-label" for="paypal">
                PayPal
            </label>
        </div>
        <div class="form-check form-group">
            <input class="form-check-input" type="radio" name="paymentMethod" id="card" value="card" required>
            <label class="form-check-label" for="card">
                Carte bleue
            </label>
        </div>
        <div class="form-check form-group">
            <input class="form-check-input" type="radio" name="paymentMethod" id="cheque" value="cheque" required>
            <label class="form-check-label" for="cheque">
                Chèque
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-brown">Payer</button>
    </form>
</div>  
{% endblock %}
