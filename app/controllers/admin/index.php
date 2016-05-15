<?php

class IndexController
{
    public function __construct()
    {
        Login::checkLogin();
    }

    public function indexAction()
    {
        App::setPageParams('admin', $this);
        loadView('layout', true);
    }
}