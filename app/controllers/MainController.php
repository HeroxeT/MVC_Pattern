<?php

namespace Controllers;

class MainController extends \Base\Controller
{
    public function index()
    {

        return $this->render('home', 'MVC');
    }
}
