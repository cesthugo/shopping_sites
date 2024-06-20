<?php

namespace App\Controllers;
USE App\Models;
use App\Models\Produits;

// Contrôleur pour la page d'accueil.
class AccueilController
{
    // Fonction principale appelée pour afficher la page d'accueil.
    public function index()
    {
        // Vérification de l'état de la session. Si aucune session n'est active, une nouvelle session est démarrée.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Gestion de l'état de connexion de l'utilisateur.
        // Si l'utilisateur est déjà connecté, récupère son identifiant.
        // Sinon, initialise les variables de session pour un utilisateur non connecté.
        if(isset($_SESSION['estconnecter']) && $_SESSION['estconnecter']){
            $id=$_SESSION['user'];
            $conn=true;
        }else if(!isset($_SESSION['estconnecter']) or !$_SESSION['estconnecter']){
            $_SESSION['estconnecter']=false;
            $_SESSION['admin']=false;
            $_SESSION['customer_id']='0';
            $id="Connecter vous !";
            $conn=false;
        }

        // Création d'une instance de Twig pour le rendu des templates.
        $twig = new Twig;

        // Création d'une instance de Produits pour accéder aux données des produits.
        $Produits = new Produits;

        // Récupération de toutes les catégories de produits.
        $allCategories = $Produits->getAllCat();

        // Vérification du statut d'administrateur de l'utilisateur.
        $admin=$_SESSION['admin'];

        // Affichage de la page d'accueil avec les données nécessaires passées à la vue.
        $twig->afficherpage('Accueil', 'index', ['categories' => $allCategories, 'iduser' => $id, 'con'=> $conn, 'ad'=>$admin]);
    }
    
}
