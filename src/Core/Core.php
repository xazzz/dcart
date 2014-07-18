<?php

namespace Core;

use Core\Queue;

class Core
{

    private $serviceQueue;
    private $commandQueue;

    private $queue;
    private $dbAdapterCollection;

    private $app;
    private $config;

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

        $this->dbAdapterCollection = array ();

    }

    // register command routers
    // after all registered

    public function register($app, $config)
    {
        foreach ($this->commandQueue as $command) {
            $command->entry($app, $config);
        }

    }

    public function addCommands ($commandArray)
    {

        $this->commandQueue = array_merge($this->commandQueue, $commandArray);

    }

    public function newQueue ($identifier)
    {
        return $this->queue->newQueue($identifier);
    }

    //====================================
    // will save database connection here
    //====================================

    use Silex;

    public function bootstrap ($app, $config)
    {

        $this->app = $app;
        $this->config = $config;

        $app->register(new Silex\Provider\DoctrineServiceProvider(), $config["db"]);

        foreach ($config["db"]["db.options"] as $key => $value) {
            $this->dbAdapterCollection["db." . $key] = $this->app['dbs'][$key];
        }
    }

    public function getDbAdapter ($id)
    {
        if (array_key_exists($id, $this->dbAdapterCollection)) {
            return $this->dbAdapterCollection[$id];
        }

        return null;
    }


}