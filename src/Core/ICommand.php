<?php

namespace Core;

Interface ICommand {

    // here is entry point, and all routers for this Command
    // from this user can access the Command

    public function entry ($app, $request);

    // here is message queue
    // we will get event notification
    //

    public function loop ();
}