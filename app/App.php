<?php

class App
{
    public function run()
    {
        $route = getRoute();

        $controllerPath = APP_ROOT.'/app/controllers/';
        if($route['is_admin']) {
            $controllerPath .= 'admin/';
        }

        $controllerPath .= $route['controller'].'.php';

        if(file_exists($controllerPath)) {
            require_once($controllerPath);

            try {
                $class = ucfirst($route['controller']);
                $controller = new $class();

                $action = $route['action'].'Action';
                if(method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    $this->controllerError();
                }
            } catch(Exception $e) {
                $this->controllerError();
            }
        } else {
            $this->controllerError();
        }
    }

    protected function controllerError()
    {
        $template = 'controller_error';
        require_once(APP_ROOT.'/app/views/layout.php');
    }
}