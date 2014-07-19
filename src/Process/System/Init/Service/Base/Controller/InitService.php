<?php

namespace Process\System\Init\Command\Base;

use Core\MVC\Controller;

class IndexService extends Controller
{
    // this will register to the core system
    // this will be called by init to register all routes for this command

    public function __construct($request, $app)
    {

    }


    //

    public function createMenu ()
    {
        // ......
        foreach ($this->getActionQueue(__FUNCTION__) as $action) {

            if (!isset ($action["caller"]) || !isset ($action["method"])) {
                continue;
            }

            if (method_exists($action["caller"], $action["method"])) {

                call_user_func(array ($action["caller"], $action["method"]));

            }

        }


        $baseMenuArray = array ();
        $result = $baseMenuArray;

        foreach ($this->getDataflowQueue(__FUNCTION__) as $action) {

            if (!isset ($action["caller"]) || !isset ($action["method"])) {
                continue;
            }

            if (method_exists($action["caller"], $action["method"])) {

                $result = call_user_func(array ($action["caller"], $action["method"]), $result);

            }

        }

    }

}