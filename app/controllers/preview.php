<?php

class previewController
{
    public function indexAction()
    {
        App::setPageParams(null, $this);
        loadView('preview');
    }
}