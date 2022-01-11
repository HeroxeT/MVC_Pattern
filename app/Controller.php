<?php

namespace App;

use App;

class Controller
{
    public function renderLayout($body)
    {

        ob_start();
        require ROOTPATH . '\\app\views\layout\layout.php';
        return ob_get_clean();

    }
    public function render($viewName, array $params = [])
    {

        $viewFile = ROOTPATH . '\\app\\views\\' . $viewName . '.php';
        extract($params);
        ob_start();
        require $viewFile;
        $body = ob_get_clean();
        ob_end_clean();
        return $this->renderLayout($body);

    }

}
