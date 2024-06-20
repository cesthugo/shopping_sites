<?php

namespace App\Controllers;

class Twig
{
    public function afficherpage($page,$fonction = 'index',$data = [])
    {
        // Configuration de Twig
        $loader = new \Twig\Loader\FilesystemLoader(ROOT . '\\Templates');
        $twig = new \Twig\Environment($loader,[
            'debug' => true,]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        // Ajoutez les données de session au tableau de données
        $data['session'] = $_SESSION;
        $data['app'] = $this;

        $view = $page . '/' . $fonction . '.twig.php';

        // Rendu de la page avec Twig
        $template = $twig->load($view);
        echo $template->render($data);
    }
}