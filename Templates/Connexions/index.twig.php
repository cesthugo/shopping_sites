{% extends "layout.php" %}

{% block content %}

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <form action="/Connexion/Connexion" method="post" class="p-4 shadow rounded bg-white">
                <h1 class="mb-4">Connexion</h1>
                
                

                <div class="mb-3">
                    {% if error %}
                        <div class="alert alert-danger">
                            {{ error }}
                        </div>
                    {% endif %}
                    <label for="username" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eOJbceNyXDObi0gFRPzgYDxuMybwJDPgpz9LYxvFYD8LNTU1+9IeXfKbJc1Bq1d" crossorigin="anonymous"></script>

</body>
{% endblock %}