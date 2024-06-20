<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{% block title %}isi4shop - Accueil{% endblock %}</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-image: url('/../src/image/fond.jpg');
      background-size: cover; 
      background-repeat: no-repeat; /* Empêchez la répétition de l'image de fond */
      background-position: center; /* Centrez l'image de fond */
    }

    nav.navbar {
  background-color: rgba(0,0,0,0); /* Fond marron avec une opacité de 0.5 */
}

.navbar-nav .nav-item {
  background-color: #8B4513; /* Fond marron pour chaque bouton de menu */
  margin: 5px; /* Ajoutez une marge autour de chaque bouton */
  border-radius: 5px; /* Coins arrondis pour l'effet encadré */
}

.navbar-nav .nav-link {
  color: white; /* Couleur du texte en blanc */
}


    main {
      flex: 1;
    }

  

    /* Ajoutez une classe pour la rotation du logo */
    .rotate {
      animation: spin 2s infinite linear;
      max-width: 50px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    footer {
      background-color: #8B4513; /* Fond marron du footer */
      color: white;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/Accueil"><img src="https://i.ibb.co/p47wYG1/logocafe-removebg-preview.png" alt="Logo" class="rotate"></a> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Panier/afficherPanier">Panier</a>
        </li>

    
          <!-- Si l'utilisateur est connecté, affiche le lien de déconnexion -->
          <li class="nav-item">
            <a class="nav-link" href="/Connexion/deconnexion">Déconnexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/MesCommandes">Mes commandes</a>
          </li>
        
          <!-- Si l'utilisateur n'est pas connecté, affiche le lien de connexion -->
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="container mt-5 text-center">
    {% block content %}{% endblock %}
  </main>

  <footer class="py-4">
    <div class="container text-center">
      <p>&copy; 2023 isi4shop. Tous droits réservés.</p>
    </div>
  </footer>

</body>
</html>
