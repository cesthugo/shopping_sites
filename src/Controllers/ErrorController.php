<?php

namespace App\Controllers;

class ErrorController
{
    public function index()
    {
        require_once ROOT . '/Views/erreur404.php';
    }
}