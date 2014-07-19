<?php

namespace Process\System\Init\Command\Base;

use Core\Core;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Core\Command;
use Core\ICommand;

class Base extends Command implements ICommand
{

    // this will register to the core system
    // this will be called by init to register all routes for this command

    public function __construct()
    {

        $this->_id = "process.system.dashboard.command.base";
        $this->_version = 1.0;
        $this->_author = "Tom";
        $this->_certificate = null;

        $this->_startTime = time ();

        self::$_core = Core::getInstance();
        self::$_actionQueue = self::$_core->newQueue($this->_id . ".action");
        self::$_dataflowQueue = self::$_core->newQueue($this->_id . ".dataflow");
        self::$_interactionQueue = self::$_core->newQueue($this->_id . ".interaction");
        self::$_messageQueue = self::$_core->newQueue($this->_id . ".message");

    }

    public function entry($app, $config)
    {

        // register command to core queue
        // so others can access it

        $base = $app["controller_factory"];

        $base->get("/init", function (Request $request) use ($app) {

            // checking and registering all modules


            // display all modules and it's details

        });

        $base->get("/init/command/detail/{id}", function(Request $request, $id) use ($app) {

        });

        $base->get("/init/service/detail/{id}", function(Request $request, $id) use ($app) {

        });

        $app->mount ($config["basename"] . "/" . $config["process_system_prefix"] . $base);


    }

    // this will be called by core to deal with message queue loop
    // inter-communication between processed and service

    public function loop()
    {

    }

}