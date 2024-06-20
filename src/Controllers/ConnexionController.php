<?php

namespace App\Controllers;

use App\Models\Connexions;

class ConnexionController
{   
    public function index()
    {
        $twig = new Twig;
        $twig->afficherpage('Connexions', 'index');
    }

    public function Connexion()
    {
        //session_start();
        $errors='';
        $twig= new Twig;
        $op=false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $util = new Connexions;
            $exist = $util->getUtilisateursExistant();
            $admin= $util->getAdmin();

            foreach($admin as $ad)
            {
                if($ad['username']== $user && $ad['password']==sha1($pass))
                {
                    $op=true;
                    $_SESSION['user'] = $user;
                    $_SESSION['estconnecter'] = true;
                    $_SESSION['admin'] =true;
                    header('Location: /Accueil');
                    exit();
                }

            }

            // Parcourir le tableau $exist pour vérifier si $user et $pass existent
            foreach ($exist as $utilisateur) {
                if ($utilisateur['username'] === $user && $utilisateur['password'] === sha1($pass)) {

                    // Stocker des informations d'utilisateur dans la session
                    $_SESSION['user'] = $user;
                    $_SESSION['id'] = $utilisateur['id'];
                    $_SESSION['customer_id'] = $utilisateur['customer_id'];
                    $_SESSION['estconnecter'] = true;
                    var_dump($_SESSION);
                    $op=true;
                    // Ajoutez ici les actions à effectuer après la connexion réussie

                    //Rediriger vers la page d'accueil ou une autre page
                    header('Location: /Accueil');
                    exit();
                }
            }

            // ...
            // Si les identifiants ne sont pas valides, redirige vers la page de connexion
            //echo "Mot de passe ou Nom d'utilisateur incorrect";
            // Initialisation à false
            if(!$op){
            $errors='mot de passe ou nom d\'utilisateur incorrect'; 
            $_SESSION['estconnecter']=false;
            $twig->afficherpage('Connexions','index',['error'=>$errors]);
            exit();

            }
            //var_dump($_SESSION);
            
        }
    }

    public function deconnexion()
    {
        $_SESSION['estconnecter'] = false;
        session_destroy();
        header('Location: /Accueil');
    }
}
