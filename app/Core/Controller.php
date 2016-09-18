<?php
namespace App\Core;

class Controller
{
    
    public function model($model)
    {
        if(!file_exists('../app/Models/' . $model . '.php')){
            return false; 
        }

        require_once '../app/Models/' . $model . '.php';

        $model = 'App\\Models\\' . $model;
        
        return new $model();
    }

    public function view($view, $data = [])
    {
        if(!file_exists('../app/Views/' . $view . '.php')){
            return false;
        }

        require_once '../app/Views/' . $view . '.php';
    }

}