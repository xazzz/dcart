<?php

// database

$config["db"] = array(

    "db.options" => array(

        "mysql_default" => array(
            "driver" => "pdo_mysql",
            "host" => "localhost",
            "port" => "3306",
            "user" => "gajeapp",
            "password" => "9cNrrrKGWB6cUKsh",
            "dbname" => "gajeapp",
            // "charset" => "",
        )
    )
);

// cache

$config["http_cache_enable"] = true;
$config["http_cache"] = array(
    'http_cache.cache_dir' => __DIR__ . "/cache/",
    'http_cache.esi' => null,
);

$config["twig_cache_enable"] = true;


// upload

$config["debug"] = false;