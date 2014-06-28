<?php

// How to use it to build website?
// How to use it to build REST API?

// routers ==> predefined
// initialize routers ==> Controller <==> Model <==> View

//

require_once (__DIR__ . "/../vendor/autoload.php");

$app = new Silex\Application();

// handling errors

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->error(function (\Exception $e, $code) use ($app) {

    $message = $app->escape($e->getMessage());

    switch ($code) {
        case 404:
            $message = "404 : " . $message;
            break;
        case 500:
            $message = "500 : " . $message;
        default:
            $message = 'Unknow : ' . $message;
    }

    $error = array(
        "status" => "failure",
        "message" => $message
    );

    if ($code > 500) {
        $code = 500;
    }

    return $app->json($error, $code);
});

// define global value for app

$os = php_uname();

if (strtolower(substr($os, 0, 3)) == "dar") {
    require_once(__DIR__ . "/config-test.php");
} else {
    require_once(__DIR__ . "/config.php");
}

$app["debug"] = $config["debug"];
$app['upload.image.host'] = $config["upload.image.host"];
$app['upload.folder'] = $config["upload.folder"];
$app['upload.folder.image'] = $config["upload.folder.image"];

$app->register(new Silex\Provider\DoctrineServiceProvider(), $config["db"]);
$app->register(new Silex\Provider\HttpCacheServiceProvider(), $config["cache"]);

// modules ==> controller ==> model
// how to define modules ?

$basename = $config["basename"];
$api_v1 = $config["router_api_v1"];

//==================================
// test case
//==================================

// tests are here, but not right place I think

$test = $app["controllers_factory"];

use Core\Process;
use Core\Command;

$test->get ("core/process", function () use ($app) {

    $process = new Core\Process();

    $process->pid = uniqid (mt_rand());

    print_r ($process);

    $command = new Command();

    print_r ($command);

    exit;

});

$app->mount($basename . "/testcase/", $test);


$app->run();


