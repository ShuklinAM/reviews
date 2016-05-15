<?php

function loadView($view) {
    require_once(APP_ROOT.'/app/views/'.$view.'.php');
}

function loadPartial($partial) {
    require_once(APP_ROOT.'/app/views/partials/'.$partial.'.php');
}