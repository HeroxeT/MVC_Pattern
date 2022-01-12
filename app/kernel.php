<?php

class Kernel
{
    public $defaultControllerName = 'MainController';

    public $defaultActionName = "index";

    public function launch()

    {
        list($controllerName, $actionName, $params) = App::$router->resolve();
        echo $this->launchAction($controllerName, $actionName, $params);

    }
    public function launchAction($controllerName, $actionName, $params)
    {
        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);
        if (!file_exists(ROOTPATH.'\controllers\\'.$controllerName . '.php')) {
            //TODO  работа с выводом ошибок
        }
        require_once ROOTPATH .'\controllers\\'.$controllerName .'.php';
        if (!class_exists("\controllers\\" . ucfirst($controllerName))) {
            //TODO  работа с выводом ошибок
        }
        $controllerName = "\controllers\\" . ucfirst($controllerName);
        $controller = new $controllerName;
        $actionName = empty($actionName) ? $this->defaultActionName : $actionName;
        if (!method_exists($controller, $actionName)) {
            //TODO  работа с выводом ошибок
        }
        return $controller->$actionName($params);
    }
}
