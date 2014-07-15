<?php


// here you can add new command and just add it to core


use Core\Core;
use Process\System;
use Process\User;

$commandArray = array (

    $system_dashboard_command = new System\Dashboard\Command\Dashboard(),
    $user_example_command = new User\Example\Command\Example(),

);

$core = Core::getInstance();
$core->addCommands ($commandArray);

