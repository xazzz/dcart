<?php

namespace Core;

use Core\Queue;

class Core
{

    private $serviceQueue;
    private $commandQueue;
    private $queue;

    //
    // don't be afraid of public, yes protected is better
    // but we are human, so we know how to do with it, right?
    //
    public $app;
    public $config;
    public $dbAdapterCollection;

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Core ();
        }
        return $instance;
    }

    private function __construct()
    {
        $this->queue = Queue::getInstance();

        $this->commandQueue = $this->queue->getQueue("core_command");
        $this->serviceQueue = $this->queue->getQueue("core_service");

        $this->dbAdapterCollection = array();
    }

    //
    // initialize a new queue
    //

    public function newQueue($id)
    {
        return $this->queue->newQueue($id);
    }

    //
    // basically it will load command, for each of them create routers
    //

    public function register($app, $config)
    {
        foreach ($this->commandQueue as $command) {
            $command->entry($app, $config);
        }

    }

    //
    // we used one command queue for all commands in the system
    //

    public function addCommands($commandArray)
    {

        $this->commandQueue = array_merge($this->commandQueue, $commandArray);
    }


    //
    // now we move all database adapter to core
    // here we used public dbAdapterCollection, could be a bit quicker?
    // To note that, we will use different database source, at least, we will use
    // sqlite, and mysql mostly
    //

    use Silex;

    public function bootstrap($app, $config)
    {

        $this->app = $app;
        $this->config = $config;

        if (isset($config["db"])) {

            $app->register(new Silex\Provider\DoctrineServiceProvider(), $config["db"]);

            foreach ($config["db"]["db.options"] as $key => $value) {
                $this->dbAdapterCollection["db." . $key] = $this->app['dbs'][$key];
            }
        }
    }



}