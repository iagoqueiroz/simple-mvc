<?php
namespace App\Controllers;

use App\Core\Controller;

class ProdutoController extends Controller
{
    public function teste($name = '')
    {
        echo 'Heeey ' . $name;
    }
}