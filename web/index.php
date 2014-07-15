<?php


require_once (__DIR__ . "/../vendor/autoload.php");
$app = new Silex\Application();

//
$os = php_uname();

if (strtolower(substr($os, 0, 3)) == "dar") {
    require_once(__DIR__ . "/config/config.test.php");
} else {
    require_once(__DIR__ . "/config/config.php");
}

//==============================
//
//==============================

require_once(__DIR__ . "/core/command.list.php");
require_once(__DIR__ . "/core/service.list.php");
require_once(__DIR__ . "/core/error.handler.php");

use Core\Core;

$core = Core::getInstance();
$core->register($app, $config);
$core->bootstrap($app, $config);


// running the app

use Silex\Provider\HttpCacheServiceProvider;
if ($config["http_cache_enable"]) {

    $app->register(new HttpCacheServiceProvider(), $config["http_cache"]);
    $app["http_cache"]->run();

} else {
    $app->run();
}


