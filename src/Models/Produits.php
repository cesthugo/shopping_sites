<?php
    namespace App\Models;
    USE PDO;
    use Twig\Node\PrintNode;
    //page permettant de recuperer ou modifier des informations sur les produits
    class Produits extends Model{
        public function getProductsbyID($id){
            $sql="SELECT * FROM products WHERE cat_id=". $id;
            $resultat= $this->executerRequete($sql);  
            $produits=$resultat->fetchAll(PDO::FETCH_ASSOC);
            return $produits;
        }

        public function getAllCat()
        {
            $sql = "SELECT * FROM categories";
            $resultat = $this->executerRequete($sql);
            $categories = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }
        

        public function getProduitsbyID($id){
            $sql="SELECT * FROM products WHERE id=". $id;
            $resultat=$this->executerRequete($sql);
            $produits=$resultat->fetch(PDO::FETCH_ASSOC);
            return $produits;

        }

        public function getReviews($id){
            $sql="SELECT * FROM reviews WHERE id_product=". $id;
            $resultat=$this->executerRequete($sql);
            $reviews=$resultat->fetchAll(PDO::FETCH_ASSOC);
            return $reviews;

        }
    }