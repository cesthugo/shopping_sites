<?php
    namespace App\Models;
    use App\Models\Model;
    USE PDO;
    // page pour les passage de commandes et les principales fonctionnalités administrateur
    class Update extends Model
    {
        public function getAllorders()
        {
            $sql="SELECT * FROM orders";
            $comm=$this->executerRequete($sql);
            $res=$comm->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }

        public function getOrdersItem($orderid)
        {
            $sql="SELECT * FROM orderitems WHERE order_id=$orderid";
            $res=$this->executerRequete($sql);
            $tab=$res->fetchAll(PDO::FETCH_ASSOC);
            return $tab;
        
        }

        public function getCustomersid($custid)
        {
            $sql="SELECT * FROM  customers WHERE id= ?";
            $res=$this->executerRequete($sql,array($custid));
            $tab=$res->fetch(PDO::FETCH_ASSOC);
            return $tab;


        }

        public function getNameproducts($id)
        {
            $sql = "SELECT name FROM products WHERE id = ?";
            $res = $this->executerRequete($sql, array($id));
            $name = $res->fetchColumn(); // Utilisez fetchColumn pour obtenir la valeur directement
            return $name;
        }

        public function getAdress($id)
        {
            $sql="SELECT * FROM delivery_addresses WHERE id=$id";
            $ad=$this->executerRequete($sql);
            $res=$ad->fetch();
            return $res;
        }

        public function afficherAdress()
        {
            $r=$_SESSION['customer_id'];
            $sql="SELECT * FROM customers WHERE id=$r";
            $res=$this->executerRequete($sql);
            $t=$res->fetch();
            return $t;
        }

        public function getidadress($firstname, $lastname, $add1, $add2, $city, $postcode, $phone, $email)
        {
            $sql = "SELECT id FROM delivery_addresses WHERE firstname=:firstname AND lastname=:lastname AND add1=:add1 AND add2=:add2 AND city=:city AND postcode=:postcode AND phone=:phone AND email=:email";
            $params = array(
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':add1' => $add1,
                ':add2' => $add2,
                ':city' => $city,
                ':postcode' => $postcode,
                ':phone' => $phone,
                ':email' => $email,
            );
            $res = $this->executerRequete($sql, $params);
            $t = $res->fetchColumn();
            return $t;
        }

        public function CreateOrder($custid, $idad, $payment, $date, $status, $session, $total)
        {
            $sql = "INSERT INTO orders (customer_id, registered, delivery_add_id, payment_type, date, status, session, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->executerRequete($sql, array($custid, '1' , $idad, $payment, $date , $status, $session, $total));


        }
        

        public function lastiD()
        {
            $sql="SELECT max(id) FROM orders";
            $res=$this->executerRequete($sql);
            $r=$res->fetchColumn();
            return $r;
        }

        public function lastiDadress()
        {
            $sql="SELECT max(id) FROM delivery_addresses";
            $res=$this->executerRequete($sql);
            $r=$res->fetchColumn();
            return $r;
        }
        public function CreateOrderItem($ordid,$id,$quantite)
        {
            $sql="INSERT INTO orderitems (order_id, product_id, quantity) VALUES (?, ?, ?)";
            $this->executerRequete($sql, array($ordid, $id , $quantite));
        }

        //fonction permettant de mettre à jour le status de la commande pour l'admin
        public function UpdateStatus($id)
        {
            $sql="UPDATE orders SET status='10' WHERE id= ?";
            $this->executerRequete($sql,array($id));
        }

        //fonction permettant de mettre à jour le stock du produit $idprod pour l'admin
        public function UpStock($idprod,$NewStocks)
        {
            $sql="UPDATE products SET quantity= ? WHERE id=$idprod";
            $this->executerRequete($sql,array($NewStocks));

        }
        

        
        public function getOrder($idcom)
        {
            $sql="SELECT * FROM orders WHERE id= ?";
            $res=$this->executerRequete($sql,array($idcom));
            $t=$res->fetch(PDO::FETCH_ASSOC);
            return $t;

        }
        // permet de modifier le stock automatiquement lors de la commandes des produits 
        public function newstocks($id,$newstocks)
        {
            $sql="UPDATE products SET quantity=$newstocks WHERE id=$id";
            $this->executerRequete($sql);
        }

        
        //fonction permettant d'ajouter une adresse 
        public function NewAdress($firstname,$lastname,$add1,$add2,$city,$postcode,$phone,$email)
        {
            $sql="INSERT INTO delivery_addresses (firstname,lastname,add1,add2,city,postcode,phone,email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->executerRequete($sql,array($firstname,$lastname,$add1,$add2,$city,$postcode,$phone,$email));
        }


    }
