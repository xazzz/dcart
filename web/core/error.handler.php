<?php


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
