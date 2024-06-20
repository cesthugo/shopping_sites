<?php   
    namespace App\Controllers;
    use App\Models;
    use App\Models\Produits;
    

    class ProduitsController
    {
        public function getCat($param)
        {
            $id=$param[0];
            $produit= new Produits;
            $catProd=$produit->getProductsbyID($id);
            $twig=new twig;
            $twig->afficherpage('Categories', 'index', ['listeprods' => $catProd]);


        }

        public function description($params){
            $id = $params[0];
            $produit = new Produits;
            $boisson = $produit->getProduitsbyID($id);
            $comm=$produit->getReviews($id);
            $twig = new Twig;
            $admin=$_SESSION['admin'];
            $twig->afficherpage('Produits', 'index', ['Produits' => $boisson,'reviews' => $comm,'admin'=>$admin]);
        }


    }