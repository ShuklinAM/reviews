<?php

session_start();

class App
{
    public function run()
    {
        self::clearPageParams();

        $route = getRoute();

        $controllerPath = APP_ROOT.'/app/controllers/';

        if($route['is_admin']) {
            require_once(APP_ROOT.'/app/libs/Login.php');
            if($route['controller'] != 'login') {
                Login::checkLogin();
            }

            $controllerPath .= 'admin/';
        }

        $controllerPath .= $route['controller'].'.php';

        if(file_exists($controllerPath)) {
            require_once($controllerPath);

            try {
                $class = ucfirst($route['controller']).'Controller';
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

    public static function redirect($path = '')
    {
        return header('Location: '.BASE_URL.$path);
    }

    public static function getUrl($path = '')
    {
        return BASE_URL.$path;
    }

    public static function setPageParams($template, $controller = false, $model = false)
    {
        $_SESSION['template'] = $template;
        $_SESSION['controller'] = $controller;
        $_SESSION['model'] = $model;
    }

    public static function getPageParams()
    {
        $params = array(
            'template'      => $_SESSION['template'],
            'controller'    => $_SESSION['controller'],
            'model'         => $_SESSION['model'],
        );

        return $params;
    }

    public static function clearPageParams()
    {
        unset($_SESSION['template']);
        unset($_SESSION['controller']);
        unset($_SESSION['model']);
    }

    public static function setMessages($messages)
    {
        $_SESSION['messages'] = $messages;
    }

    public static function addMessage($message)
    {
        $_SESSION['messages'][] = $message;
    }

    public static function getMessages()
    {
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);

        return $messages;
    }
}