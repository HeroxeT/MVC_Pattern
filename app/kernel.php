<?php

namespace App;

use App;

class Kernel
{

    public $defaultControllerName = 'Home';

    public $defaultActionName = "index";

    public function launch()
    {
        list($controllerName, $actionName, $params) = App::$router->resolve();
        echo $this->launchAction($controllerName, $actionName, $params);

    }


    public function launchAction($controllerName, $actionName, $params)
    {

        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);
        if (!file_exists(ROOTPATH.'\\app\controllers\\'.$controllerName . '.php')) {
        }
        require_once ROOTPATH .'\\app\controllers\\'.$controllerName .'.php';
        if (!class_exists("\\controllers\\" . ucfirst($controllerName))) {
        }
        $controllerName = "\\controllers\\" . ucfirst($controllerName);
        $controller = new $controllerName;
        $actionName = empty($actionName) ? $this->defaultActionName : $actionName;
        if (!method_exists($controller, $actionName)) {
            throw new \App\Exceptions\InvalidRouteException();
        }
        return $controller->$actionName($params);

    }
}
