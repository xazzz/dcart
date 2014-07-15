<?php

namespace Core;

use Core\Core;
use Core\Process;

// Add new attributes ==> private $attributes;
// Override an attribute ==> private $pid;
// Use Inherited attribute ==> have to be protected modifier

// Process : Private | Protected | Public

// User ==> Command (MVC) ==> Service (MVC)
// Actually Command is a way to organize module, app(UI)

// we will register Command to the core system, so the system know that
// the Command A exists, and can call its register methods too
//

class Command extends Process {

    protected $owner;
    protected $core;

    public function register ($config)
    {

        $this->core = Core::getInstance();

        if (is_array ($config)) {

            foreach ($config as $key => $value) {

                $this->$key = $value;

            }

            $this->core->register("", "");

            return true;
        }

        return false;
    }

    // here we will get service and from the service
    // it can call all open API


    public function getService ($serviceId)
    {
        return $this->core->getService ($serviceId);
    }


}