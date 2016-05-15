<?php

function loadView($view, $admin = false) {
    if($admin) {
        $admin = 'admin/';
    }
    require_once(APP_ROOT.'/app/views/'.$admin.$view.'.php');
}

function loadPartial($partial, $admin = false) {
    if($admin) {
        $admin = 'admin/';
    }
    require_once(APP_ROOT.'/app/views/'.$admin.'partials/'.$partial.'.php');
}