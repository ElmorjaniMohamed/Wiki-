<?php

namespace App\Controllers;

class Controller
{

    protected function render($view, $data = [])
    {
        extract($data);
        include VIEWS . $view . '.php';
    }

    protected function view(string $path, array $params = null , $layout= 'main')
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout/'.$layout.'.php';
    }

}
