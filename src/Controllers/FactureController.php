<?php
namespace App\Controllers;
use FPDF;
use App\Models\Update;

class FactureController
{
    // Fonction permettant d'éditer une facture et de la télécharger
    public function facture($id)
    {
        $idcom = $id[0];
        $up = new Update;

        // Récupérer les informations sur la commande et les produits
        $order = $up->getOrder($idcom);
        $products = $up->getOrdersItem($idcom);
        $userinfo=$up->getAdress($order['delivery_add_id']);

        // Créer une instance de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

         /* Ajouter la police "Verily Serif Mono"
         $pdf->AddFont('VerilySerifMono', '', 'VerilySerifMono.otf');

         // Définir la police "Verily Serif Mono" comme police par défaut
         $pdf->SetFont('VerilySerifMono', '', 12);*/

       

        // En-tête de la facture
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'Facture', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 10, 'Commande #' . $order['id'], 0, 1, 'C');
        $pdf->Cell(190, 10, 'Date: ' . $order['date'], 0, 1, 'C');
        $pdf->Cell(190, 10, 'Mode de paiment : ' . $order['payment_type'], 0, 1, 'C');
        $pdf->Ln(10);

         // Informations sur l'utilisateur
         $pdf->Cell(190, 10, 'Informations sur l\'utilisateur', 0, 1, 'L');
         $pdf->Cell(190, 10, 'Nom: ' . $userinfo['firstname'] . ' ' . $userinfo['lastname'], 0, 1, 'L');
         $pdf->Cell(190, 10, 'Adresse: ' . $userinfo['add1'], 0, 1, 'L');
         $pdf->Cell(190, 10, 'Ville: ' . $userinfo['city'], 0, 1, 'L');
         $pdf->Cell(190, 10, 'Code Postal: ' . $userinfo['postcode'], 0, 1, 'L');
         $pdf->Cell(190, 10, mb_convert_encoding('Téléphone: ', 'ISO-8859-1' , 'UTF-8') . $userinfo['phone'], 0, 1, 'L');
         
         $pdf->Cell(190, 10, 'Email: ' . $userinfo['email'], 0, 1, 'L');
         $pdf->Ln(10);

        // Tableau des produits commandés
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 10, 'ID Produit', 1);
        $pdf->Cell(80, 10, 'Nom du Produit', 1);
        $pdf->Cell(30, 10, mb_convert_encoding('Quantité', 'ISO-8859-1' , 'UTF-8'), 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($products as $product) {
            $productInfo =mb_convert_encoding($up->getNameproducts($product['product_id']), 'ISO-8859-1' , 'UTF-8');
            $pdf->Cell(30, 10, $product['id'], 1); // Affiche l'ID du produit
            $pdf->Cell(80, 10, $productInfo, 1); // Affiche le nom du produit
            $pdf->Cell(30, 10, $product['quantity'], 1); // Affiche la quantité
            $pdf->Ln();
        }

        // Calcul du total
        /*$total = 0;
        foreach ($products as $product) {
            $productInfo = $up->getNameproducts($product['id']);
            $total += $productInfo['price'] * $product['quantity'];
        }*/

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(110, 10, 'Total', 1);
        $pdf->Cell(30, 10, number_format($order['total'], 2) . iconv('UTF-8', 'windows-1252', "€"), 1);
        $pdf->Ln(20);

        // Nom de fichier pour la facture
        $fileName = 'facture_commande_' . $order['id'] . '.pdf';

        // Affichage de la facture (téléchargement)
        $pdf->Output($fileName, 'D');

        //header('Location: /MesCommandes');
    }


    //Edition de facture pour un utilisateur non connecter 
    public function NewFacture()
    {
        $up = new Update;
    
        // Récupérer les informations sur la dernière commande
        $idcommande = $up->lastiD();
        $order = $up->getOrder($idcommande);
        $products = $up->getOrdersItem($idcommande);
    
        // Récupérer les informations sur la dernière adresse
        $idadress = $up->lastiDadress();
        $userinfo = $up->getAdress($idadress);
    
        // Créer une instance de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
    
        // En-tête de la facture
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'Facture', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 10, 'Commande #' . $order['id'], 0, 1, 'C');
        $pdf->Cell(190, 10, 'Date: ' . $order['date'], 0, 1, 'C');
        $pdf->Cell(190, 10, 'Mode de paiement : ' . $order['payment_type'], 0, 1, 'C');
        $pdf->Ln(10);
    
        // Informations sur l'utilisateur
        $pdf->Cell(190, 10, 'Informations sur l\'utilisateur', 0, 1, 'L');
        $pdf->Cell(190, 10, 'Nom: ' . $userinfo['firstname'] . ' ' . $userinfo['lastname'], 0, 1, 'L');
        $pdf->Cell(190, 10, 'Adresse: ' . $userinfo['add1'], 0, 1, 'L');
        $pdf->Cell(190, 10, 'Ville: ' . $userinfo['city'], 0, 1, 'L');
        $pdf->Cell(190, 10, 'Code Postal: ' . $userinfo['postcode'], 0, 1, 'L');
        $pdf->Cell(190, 10, mb_convert_encoding('Téléphone: ', 'ISO-8859-1', 'UTF-8') . $userinfo['phone'], 0, 1, 'L');
        $pdf->Cell(190, 10, 'Email: ' . $userinfo['email'], 0, 1, 'L');
        $pdf->Ln(10);
    
        // Tableau des produits commandés
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 10, 'ID Produit', 1);
        $pdf->Cell(80, 10, 'Nom du Produit', 1);
        $pdf->Cell(30, 10, mb_convert_encoding('Quantité', 'ISO-8859-1' , 'UTF-8'), 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($products as $product) {
            $productInfo = mb_convert_encoding($up->getNameproducts($product['product_id']), 'ISO-8859-1', 'UTF-8');
            $pdf->Cell(30, 10, $product['product_id'], 1); // Affiche l'ID du produit
            $pdf->Cell(80, 10, $productInfo, 1); // Affiche le nom du produit
            $pdf->Cell(30, 10, $product['quantity'], 1); // Affiche la quantité
            $pdf->Ln();
        }

        // Calcul du total
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(110, 10, 'Total', 1);
        $pdf->Cell(30, 10, number_format($order['total'], 2) . iconv('UTF-8', 'windows-1252', "€"), 1);
        $pdf->Ln(20);

        // Nom de fichier pour la facture
        $fileName = 'facture_commande_' . $order['id'] . '.pdf';

        // Affichage de la facture (téléchargement)
        $pdf->Output($fileName, 'D');

    }
}