<?php


namespace Process\User\Example\Command;

use Core\Command;
use Core\ICommand;

class Example extends Command implements ICommand {

    // this will register to the core system
    // this will be called by init to register all routes for this command

    public function entry ($app, $request)
    {

        // register command to core queue
        // so others can access it


    }

    // this will be called by core to deal with message queue loop
    // inter-communication between processed and service

    public function loop ()
    {



    }
}