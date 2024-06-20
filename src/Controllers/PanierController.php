<?php

namespace App\Controllers;

use App\Models\Panier;

use App\Models\Produits;

class PanierController
{
    // ...

    public function afficherPanier()
    {
        // Instancier la classe Panier
        $panier = new Panier();

        // Récupérer les articles du panier
        $articlesPanier = $panier->getArticles();

        // Récupérer le total du panier
        $totalPanier = $panier->getTotal();

        // Charger la vue Twig avec les données nécessaires
        $twig = new Twig();
        $twig->afficherPage('Panier', 'index', ['articles' => $articlesPanier, 'total' => $totalPanier]);
    }

    // Exemple de code dans votre contrôleur
    public function ajouterAuPanier($idProduit) {
        // Récupérez le produit à partir de l'ID
        $produit = (new Produits)->getProduitsbyID($idProduit[0]);
    
        // Ajoutez le produit au panier
        $panier = new Panier;
        $panier->ajouterProduit($produit,$_POST['quantite']);
    
        // Redirigez l'utilisateur ou effectuez d'autres actions nécessaires
        header('Location: /'); // Redirection vers la page d'accueil par exemple
        exit();
    }


    public function supprimerDuPanier($idprod)
    {
        $id=$idprod[0];
        if (isset($_SESSION['panier'][$id]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            unset($_SESSION['panier'][$id]);
            header('Location: /Panier/afficherPanier');
        }


    }
    

    // ...
}
