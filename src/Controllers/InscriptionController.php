<?php 
namespace App\Controllers;
use App\Models\Connexions;

    class InscriptionController{
        public function index()
        {
            $twig = new Twig;
            $twig->afficherpage('Inscriptions','index');
        }

        public function add()
        {
            $twig=new twig;
            $ins= new Connexions;
            $errorMessage = '';
            $valid= '';

            if(!$ins->newUser($_POST['username'],$_POST['password'],$_POST['forname'],$_POST['surname'],$_POST['street'], $_POST['floor'],$_POST['city'],$_POST['postalCode'],$_POST['telephone'],$_POST['email'])){
                $errorMessage = "Le nom d'utilisateur existe déjà, merci d'entrer un autre nom d'utilisateur.";
                $twig->afficherPage('Inscriptions','index', ['errorMessage' => $errorMessage]);
            }else
            {
            
                $valid = "compte créé avec succès !";
                $twig->afficherPage('Inscriptions','index', ['valid' => $valid]);
            }

        }


    }