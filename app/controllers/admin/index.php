<?php

class IndexController
{
    public function __construct()
    {
        Login::checkLogin();
    }

    public function indexAction()
    {
        App::setPageParams('reviews/list', $this);
        loadView('layout', true);
    }

    public function editAction()
    {
        App::setPageParams('reviews/form', $this);
        loadView('layout', true);
    }

    public function updateAction()
    {

    }

    public function deleteAction()
    {

    }
}