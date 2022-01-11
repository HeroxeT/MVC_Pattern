<?php
namespace Base;

class Controller
{
    public function renderLayout($body, $title)
    {

        ob_start();
        require ROOTPATH . '\views\layout\main.php';
        return ob_get_clean();

    }
    public function render($viewName,$title, array $params = [])
    {

        $viewFile = ROOTPATH . '\views\\' . $viewName . '.php';
        extract($params);
        ob_start();
        require $viewFile;
        $body = ob_get_clean();
        ob_end_clean();
        return $this->renderLayout($body, $title);

    }

}
