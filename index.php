<?php

define('APP_ROOT', getcwd());

require_once(APP_ROOT.'/config.php');
define('BASE_URL', $baseUrl);

require_once(APP_ROOT.'/app/libs/Db.php');
DB::connect($database['server'], $database['user'], $database['password']);

require_once(APP_ROOT.'/app/helpers/routes.php');
require_once(APP_ROOT.'/app/helpers/view.php');
require_once(APP_ROOT.'/app/helpers/reviews.php');

if(DB::checkConnection()) {
    require_once(APP_ROOT.'/app/libs/Req.php');
    require_once(APP_ROOT.'/app/App.php');

    $app = new App();
    $app->run();
} else {
    $template = 'db_error';
    require_once(APP_ROOT.'/app/views/layout.php');
}
