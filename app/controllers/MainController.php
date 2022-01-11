<?php

namespace Controllers;

use \Models\Users;

class MainController extends \Controller
{
    public function index()
    {
        $name = new  Users();
        $mass = ['id' => 1, 'name' => 'qwe', 'password' => 'test'];
        $name = $name->enterValues($mass);
        return $this->render('home',['name' => $name]);
    }
}
