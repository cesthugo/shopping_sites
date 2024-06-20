<?php
namespace App\Models;
use App\Models\Model;

    class Connexions extends Model{
        public function getUtilisateursExistant(){
            $sql="SELECT * FROM logins";
            $resultat=$this->executerRequete($sql);
            $utilisateur=$resultat->fetchAll();
            return $utilisateur;

        }

        public function getAdmin()
    {
        $sql="SELECT * FROM admin";
        $result = $this->executerRequete($sql);
        $admin = $result->fetchAll();
        // Si un administrateur est trouvé, retourne true, sinon false
        return $admin;
    }

        public function getmaxId()
        {
            $sql = "SELECT MAX(customer_id) AS max_id FROM logins";
            $res = $this->executerRequete($sql);
            $result = $res->fetch();
        
            // Vérifiez si le résultat n'est pas vide
            if ($result['max_id'] !== null) {
                $maxId = $result['max_id'] + 1;
            } else {
                // Si la table est vide, commencez à 1
                $maxId = 1;
            }
        
            return $maxId;
        }
       
    public function newUser($id, $pass ,$for, $sur, $rue , $etage, $ville , $cp, $tel, $email) {
        // Récupérer tous les utilisateurs existants
        $existingUsers = $this->getUtilisateursExistant();
        $max=$this->getmaxId();

        // Vérifier si l'utilisateur avec le même nom d'utilisateur existe déjà
        $userExists = false;
        foreach ($existingUsers as $user) {
            if ($user['username'] === $id) {
                $userExists = true;
                break;
            }
        }

        // Ajouter un nouvel utilisateur s'il n'existe pas déjà
        if (!$userExists) {
            // Ajoutez ici votre logique pour ajouter l'utilisateur à la base de données
            // Assurez-vous de gérer le stockage sécurisé du mot de passe (hachage, salage, etc.)
            // Exemple très simple (ne pas utiliser en production sans sécurisation appropriée):
            $hashedPassword = sha1($pass);
            $sql2="INSERT INTO customers (id,forname, surname, add1, add2, add3, postcode, phone, email,registered) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->executerRequete($sql2, array($max,$for, $sur, $rue, $etage, $ville, $cp, $tel, $email, "1"));
            $sql = "INSERT INTO logins (customer_id, username, password) VALUES (?, ?, ?)";
            $this->executerRequete($sql, array($max, $id, $hashedPassword));
            $sql3="INSERT INTO delivery_addresses (firstname, lastname, add1, add2, city, postcode, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->executerRequete($sql3, array($for, $sur, $rue, $etage, $ville, $cp, $tel, $email));

            // Ajoutez ici d'autres actions nécessaires après l'ajout de l'utilisateur
            return true; // L'ajout de l'utilisateur a réussi
        } else {
            // L'utilisateur existe déjà, vous pouvez choisir de gérer cela d'une manière spécifique
            return false; // L'ajout de l'utilisateur a échoué
        }
    }



    }