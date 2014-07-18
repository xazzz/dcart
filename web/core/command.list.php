<?php


// here you can add new command and just add it to core


use Core\Core;
use Process\System;
use Process\User;

$commandArray = array (

    $system_dashboard_command = new System\Dashboard\Command\Base\Dashboard(),

);

$core = Core::getInstance();
$core->addCommands ($commandArray);

