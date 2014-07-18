<?php

namespace Process\System\Dashboard\Command\Base;

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
        self::$_dataflowQueue = self::$_core->newQueue($this->_id . ".data");
        self::$_messageQueue = self::$_core->newQueue($this->_id . ".message");

    }

    public function entry($app, $config)
    {

        // register command to core queue
        // so others can access it


    }

    // this will be called by core to deal with message queue loop
    // inter-communication between processed and service

    public function loop()
    {

    }

}