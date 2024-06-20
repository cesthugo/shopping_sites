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
    <h2>Choisissez ou ajoutez une adresse de livraison</h2>

    {% if add %}
        <h3>Adresses disponibles :</h3>
        <form action="/Update/NewOrder/{{ id }}" method="post">
            <div class="form-group">
                <select name="selectedAddress" class="form-select mb-3">
                   
                        <option value="{{ add.add1 }}">{{ add.add1 }}, {{ add.add3 }}, {{ add.forname }} {{ add.surname }}</option>
    
                </select>
            </div>
            <div class="form-check form-group">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required>
            <label class="form-check-label" for="paypal">
                PayPal
            </label>
        </div>  
        <div class="form-check form-group">
            <input class="form-check-input" type="radio" name="paymentMethod" id="cheque" value="cheque" required>
            <label class="form-check-label" for="cheque">
                Chèque
            </label>
        </div>
            <button type="submit" class="btn btn-primary btn-brown">Utiliser cette adresse et payer</button>
        </form>

        <form action="/Update/choisirAdresse" method="post">
            <button type="submit" class="btn btn-primary btn-brown">ajouter une adresse</button>
        </form>

       
    {% else %}

    <h3>Ajouter une nouvelle adresse :</h3>
    <form action="/Panier/ajouterAdresse" method="post">
        <div class="form-group">
            <label for="newAddress">Adresse :</label>
            <input type="text" class="form-control" id="newAddress" name="newAddress" required>
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
            <label for="newEmail">Email :</label>
            <input type="email" class="form-control" id="newEmail" name="newEmail" required>
        </div>
        <div class="form-group">
            <label for="newPhoneNumber">Téléphone :</label>
            <input type="tel" class="form-control" id="newPhoneNumber" name="newPhoneNumber" required>
        </div>
        <div class="form-group">
            <label for="newFirstName">Prénom :</label>
            <input type="text" class="form-control" id="newFirstName" name="newFirstName" required>
        </div>
        <div class="form-group">
            <label for="newLastName">Nom :</label>
            <input type="text" class="form-control" id="newLastName" name="newLastName" required>
        </div>

    <h2>Choisissez le mode de paiement :</h2>
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
        <!-- ... (votre code existant) ... -->
        <button type="submit" class="btn btn-primary btn-brown">Payer</button>
    </form>
</div>
{% endif %}
{% endblock %}
