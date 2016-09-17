<?php

class HomeController extends Controller
{
    public function index()
    {
        echo 'home/index';
    }

    public function user()
    {
        $user = $this->model('User');

        echo $user->name;
    }
}