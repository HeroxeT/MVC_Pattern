<?php

namespace Controllers;

class MainController extends \App\Controller
{
    public function index()
    {
        return $this->render('home');
    }
}
