<?php

class Controller
{
    
    public function model($model)
    {
        if(!file_exists('../app/Models/' . $model . '.php')){
            return false; 
        }

        require_once '../app/Models/' . $model . '.php';
        return new $model();
    }

}