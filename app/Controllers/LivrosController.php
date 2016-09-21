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
        if(isset($_POST['new-livro'])){
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

    public function edit($id){

        $id = (int) $id;
        $livros = $this->model('Livros');

        if(isset($_POST['edit-livro'])){
            $args = [
                'name'          => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
                'description'   => filter_var($_POST['description'], FILTER_SANITIZE_STRING),
                'price'         => filter_var($_POST['price'], FILTER_SANITIZE_STRING),
            ];
            $livro_id = (int) filter_var($_POST['livro-id']);
            $livros->update($args, $livro_id);
        }

        $data = $livros->find($id);

        return $this->view('livros/edit', ['livro' => $data]);
    }
}