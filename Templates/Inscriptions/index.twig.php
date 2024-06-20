{% extends "layout.php" %}

{% block content %}
<div class="container mt-5">
    <form class="bg-brown p-4 shadow-sm rounded" action="/Inscription/add" method="post">
        <h2 class="text-center mb-4">Inscription</h2>
        
        {% if errorMessage %}
            <div class="alert alert-danger">
                {{ errorMessage }}
            </div>
        {% endif %}

        {% if valid %}
            <div class="alert alert-success">
                {{ valid }}
            </div>
        {% endif %}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur: *</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe (au moins 8 caractères): *</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                </div>

                <div class="form-group">
                    <label for="forname">Prénom: *</label>
                    <input type="text" class="form-control" id="forname" name="forname" required>
                </div>

                <div class="form-group">
                    <label for="surname">Nom : *</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="street">Rue: *</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>

                <div class="form-group">
                    <label for="floor">Étage:</label>
                    <input type="text" class="form-control" id="floor" name="floor" value="add2">
                </div>

                <div class="form-group">
                    <label for="city">Ville:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>

                <div class="form-group">
                    <label for="postalCode">Code postal:</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone:</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-block">S'inscrire</button>
    </form>
</div>

<style>
    .bg-brown {
        background-color: #8B4513; /* Marron */
        color: white;
    }
</style>

{% endblock %}
