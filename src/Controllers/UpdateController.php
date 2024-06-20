<?php
        namespace App\Controllers;
        use App\Models\Panier;
        use App\Models\Produits;
        use App\Models\Update;
        class UpdateController
        {
            public function index()
            {
                $twig=new twig;
                $update= new Update;
                $orders= $update->getAllorders();
                $tab=array();
                $admin=$_SESSION['admin'];
                foreach($orders as  $ord)
                {
                    $res=$update->getAdress($ord['delivery_add_id']);
                    $tab[]=array('id'=> $ord['id'],'customer_id'=>$ord['customer_id'], 'date' => $ord['date'], 'status'=> $ord['status'], 'total'=>$ord['total'], 'firstname'=>$res['firstname'],'lastname'=>$res['lastname'],'add1'=>$res['add1'],'add2'=>$res['add2'],'city'=>$res['city'],'postcode'=>$res['postcode'],'phone'=>$res['phone'],'email'=>$res['email']);
                }
                $twig->afficherpage('Admin', 'index', ['orders'=> $tab, 'admin'=> $admin]);

            }

            public function getOrders($tab)
            {
                $ordid = $tab[0];
                $custid = $tab[1];
                $twig = new Twig;
                $update = new Update;
                
                // Récupérer les informations sur la commande
                $res = $update->getOrdersItem($ordid);
                
                // Récupérer les informations sur le client
                $cus = $update->getCustomersid($custid);


                
                // Récupérer les noms des produits
                $tableauProducts = array();
                if (!empty($res)) {
                    foreach ($res as $orderItem) {
                        $productId = $orderItem['product_id'];
                        $quantity = $orderItem['quantity'];
                        $productName = $update->getNameproducts($productId);
                        $tableauProducts[] = array('productName' => $productName, 'quantity' => $quantity);
                    }
                }
                $admin=$_SESSION['admin'];
                // Transmettre toutes les données à la page Twig
                $twig->afficherpage('Admin', 'orders', ['info' => $cus, 'tableauProducts' => $tableauProducts, 'admin'=> $admin]);
            }

            public function addressdispo()
            {
                $update= new update;
                $res=$update->afficherAdress();
                if (!empty($res) && $_SESSION['estconnecter']) {
                    $t = $update->getidadress($res['forname'], $res['surname'], $res['add1'], $res['add2'], $res['add3'], $res['postcode'], $res['phone'], $res['email']);
                    $twig = new Twig;
                    $twig->afficherpage('Panier', 'payer', ['add' => $res, 'id' => $t]);
                } else {
                    // La variable $res n'existe pas, vous pouvez gérer cela en conséquence, par exemple, afficher un message d'erreur ou rediriger l'utilisateur.
                    $twig = new Twig;
                    //$res=false;
                    $twig->afficherpage('Panier', 'add', ['add' => $res]);
                    // Ou effectuer une redirection
                    // header('Location: page_d_erreur.php');
                    // exit;
                }
            }

            public function choisirAdresse()
            {
                $twig= new twig;
                $twig->afficherpage('Panier','add');
            }

                public function NewOrder($ip)

                {
                    $produit= new Produits;
                    $id=$ip[0];
                    $date = date('Y-m-d H:i:s');

                    // Obtenez le code de session actuel
                    $session = session_id();

                    $panier= new Panier;
                    $tot=$panier->getTotal();
                
                    $update= new update;
                    $update->CreateOrder($_SESSION['customer_id'],$id, $_POST['paymentMethod'], $date, '2', $session ,$tot);
                    $ordid=$update->lastiD();
                    $articles = $panier->getArticles();
                    foreach ($articles as $article) 
                    {
                        $actuelle=$produit->getProduitsbyID($article['produit']['id']);
                        $new=$actuelle['quantity']-$article['quantite'];
                        $update->newstocks($article['produit']['id'],$new);
                        $update->CreateOrderItem($ordid,$article['produit']['id'],$article['quantite']);
                    }

                $twig=new Twig;
                $twig->afficherpage('orders', 'index');
                }



                public function ConfirmExpedition($id)
                {
                    $or=$id[0];

                    $update= new update;
                    $update->UpdateStatus($or);
                    //var_dump("UpdateStatus appelée avec l'ID : " . $or);
                    header('Location: /Update');
                }

                public function SetStock($idprod)
                { 
                    
                        $idp = $idprod[0];
                        
                        // Vérifier si la clé 'nouveau_stock' est définie dans $_POST et n'est pas vide
                        if (isset($_POST['nouveau_stock']) && $_POST['nouveau_stock'] !== '') {
                            $nouveauStock = $_POST['nouveau_stock'];

                            $update = new update;
                            $update->UpStock($idp, $nouveauStock);      
                            header("Location: /Produits/description/$idp");
                        }

                

                }

            //fonction permettant de créé une commande pour un utilisateur non connecter

            public function newOrderNewUser()
            {   
                $produit= new Produits;
                $update= new Update;
                $date = date('Y-m-d H:i:s');

                // Obtenez le code de session actuel
                $session = session_id();

                $panier= new Panier;
                $tot=$panier->getTotal();
                $update->NewAdress($_POST['newFirstName'],$_POST['newLastName'],$_POST['newStreet'],$_POST['newFloor'],$_POST['newCity'],$_POST['newPostalCode'],$_POST['newPhoneNumber'],$_POST['newEmail']);
                $idad=$update->lastiDadress();
                $update->CreateOrder($_SESSION['customer_id'],$idad, $_POST['paymentMethod'], $date, '2', $session ,$tot);
                $ordid=$update->lastiD();
                $articles = $panier->getArticles();
                $ordid=$update->lastiD();
                    $articles = $panier->getArticles();
                    foreach ($articles as $article) 
                    {
                        $actuelle=$produit->getProduitsbyID($article['produit']['id']);
                        $new=$actuelle['quantity']-$article['quantite'];
                        $update->newstocks($article['produit']['id'],$new);
                        $update->CreateOrderItem($ordid,$article['produit']['id'],$article['quantite']);
                    }


            
            $twig=new Twig;
            $twig->afficherpage('orders', 'Facture');
        }

    }

