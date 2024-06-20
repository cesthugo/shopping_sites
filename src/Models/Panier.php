<?php

namespace App\Models;

use PDO;

// page aves les differentes focntionnalités du panier 

class Panier extends Model
{
    // Ajouter un produit au panier
    public function ajouterProduit($produit,$quantite)
    {
        // Vérifier si le produit existe déjà dans le panier
        if (isset($_SESSION['panier'][$produit['id']])) {
            // Si le produit existe, augmenter la quantité
            $_SESSION['panier'][$produit['id']]['quantite']+=$_POST['quantite'];
        } else {
            // Si le produit n'existe pas, l'ajouter au panier avec une quantité de 1
            $_SESSION['panier'][$produit['id']] = [
                'produit' => $produit,
                'quantite' => $_POST['quantite'],
            ];
        }
    }

    // Récupérer les articles du panier
    public function getArticles()
    {
        if (isset($_SESSION['panier'])) {
            return $_SESSION['panier'];
        } else {
            return [];
        }
    }

    // Obtenir le total du panier
public function getTotal()
{
    $total = 0;

    foreach ($this->getArticles() as $article) {
        $total += $article['produit']['price'] * $article['quantite'];
    }

    return $total;
}


    // Effacer le panier
    public function viderPanier()
    {
        unset($_SESSION['panier']);
    }
}
