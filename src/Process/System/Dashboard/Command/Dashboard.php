<?php

namespace Process\System\Dashboard\Command;

use Core\Command;
use Core\ICommand;

class Dashboard extends Command implements ICommand {

    // this will register to the core system
    // this will be called by init to register all routes for this command

    public function entry ($app, $request)
    {

        // register command to core queue
        // so others can access it

        $this->register (array (
            "node_uuid" => $app["node_uuid"],
            "pid" => "system_dashboard"
        ));

        // all routers will be here


        //

    }

    // this will be called by core to deal with message queue loop
    // inter-communication between processed and service

    public function loop ()
    {



    }
}