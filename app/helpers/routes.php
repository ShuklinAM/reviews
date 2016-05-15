<?php

function getRoute() {
    $fullUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $request = str_replace(array(BASE_URL, 'index.php/', 'index.php', '//'), '', $fullUrl);
    $request = explode('?', $request);
    $request = explode('/', $request[0]);

    $controllerIndex = (strpos($request[0], 'admin') !== false) ? 1 : 0;

    $defaultParam = 'index';
    $params['is_admin'] = ($controllerIndex == 1) ? true : false;
    $params['controller'] = (isset($request[$controllerIndex]) && $request[$controllerIndex])
        ? $request[$controllerIndex] : $defaultParam;
    $params['action'] = (isset($request[$controllerIndex + 1]) && $request[$controllerIndex + 1])
        ? $request[$controllerIndex + 1] : $defaultParam;

    return $params;
}