<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }

    public function user()
    {
        $user = $this->model('User');

        $this->view('home/index', ['user' => $user->name]);
    }
}