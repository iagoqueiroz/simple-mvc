<?php
namespace App\Controllers;

use App\Core\Controller;

class LivrosController extends Controller
{
    public function index(){
        $livros = $this->model('Livros');
        $data = $livros->select()->all();

        return $this->view('livros/index', ['livros' => $data]);
    }

    public function create(){
        if(isset($_POST['novo-livro'])){
            $args = [
                'name'          => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
                'description'   => filter_var($_POST['description'], FILTER_SANITIZE_STRING),
                'price'         => filter_var($_POST['price'], FILTER_SANITIZE_STRING),
            ];
            $livros = $this->model('Livros');
            $livros->create($args);
        }


        return $this->view('livros/novo');
    }
}