<?php

class LoginController
{
    public $_hideHeader = true;

    public function __construct()
    {
        if(Login::getLogin()) {
            return App::redirect('admin');
        }
    }

    public function indexAction()
    {
        App::setPageParams('login/form', $this);
        loadView('layout', true);
    }

    public function loginAction()
    {
        $login = Req::post('login');
        $password = Req::post('password');

        if($login && $password) {

            require_once(APP_ROOT.'/app/models/login.php');
            $model = new loginModel();
            if($admin = $model->getAdmin($login, $password)) {
                Login::loginAdmin($admin['login']);
                return App::redirect('admin');
            }
        }

        App::addMessage(array('message' => 'Login or password is not correct', 'type' => 'danger'));
        return App::redirect('admin/login');
    }

    public function logoutAction()
    {
        Login::logout();
        return App::redirect('admin/login');
    }
}