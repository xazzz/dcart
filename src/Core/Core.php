<?php

namespace Core;

use Core\Queue;

class Core {

    protected $extensionQueue;
    protected $serviceQueue;
    protected $commandQueue;

    protected $_queue;

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Core ();
        }
        return $instance;
    }

    private function __construct ()
    {
        $this->_queue = Queue::getInstance();

        $this->commandQueue = $this->_queue->getQueue("command");
        $this->serviceQueue = $this->_queue->getQueue("service");

    }

    public function register ($type, $data)
    {

        if ($type == "command") {

            // queue['command_id'] = $command_handler;

        }

        if ($type == "service") {

        }
    }

    public function getProcess ($type, $id)
    {
        if ($type == "command") {

        }

        if ($type == "service") {

        }
    }

    public function runProcess ($type)
    {
        if ($type == "command") {

        }

        if ($type == "service") {

        }
    }


}