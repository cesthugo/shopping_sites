<?php

    namespace App\Controllers;
    use App\Controllers\Twig;
    use App\Models\orders;
    class MesCommandesController
    {
        public function index  ()
        {
            $orders=new orders;
            $res=$orders->myorders($_SESSION['customer_id']);
            $twig=new Twig;
            $twig->afficherpage('orders','myorders',['order'=>$res]);
        }

    }