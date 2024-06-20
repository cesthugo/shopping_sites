<?php
namespace App\Models;
use PDO;

    class orders extends Model
    {
        public function myorders($id)
        {
            $sql="SELECT * FROM orders WHERE customer_id=$id ";
            $res=$this->executerRequete($sql);
            $r=$res->fetchAll(PDO::FETCH_ASSOC);
            return $r;


        }


    }