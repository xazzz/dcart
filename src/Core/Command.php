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

class Command extends Process
{

    protected $_author;
    protected $_version;
    protected $_certificate;
    protected $_lastUpdateTime;

    protected $_id;
    protected $_startTime;
    protected $_terminateTime;

    protected static $_core;
    protected static $_actionQueue;
    protected static $_dataflowQueue;
    protected static $_messageQueue;

    // @id: command._id . __FUNCTION__
    // @callback: array ("caller"=>, "method"=>)

    public function registerAction($action, $id, $callback)
    {
        self::$_actionQueue[$action][$id] = $callback;
    }

    public function unregisterAction($action, $id, $callback = null)
    {
        if (isset (self::$_actionQueue[$action][$id])) {
            unset (self::$_actionQueue[$action][$id]);
        }
    }

    public function getActionQueue($action)
    {

        if (isset (self::$_actionQueue[$action]) && is_array(self::$_actionQueue[$action])) {
            return self::$_actionQueue[$action];
        }

        return array();

    }

    //

    public function registerDataflow($action, $id, $callback)
    {
        self::$_dataflowQueue[$action][$id] = $callback;
    }

    public function unregisterDataflow($action, $id, $callback = null)
    {
        if (isset (self::$_dataflowQueue[$action][$id])) {
            unset (self::$_dataflowQueue[$action][$id]);
        }
    }

    public function getDataflowQueue($action)
    {

        if (isset (self::$_dataflowQueue[$action]) && is_array($this->_dataflowQueue[$action])) {
            return self::$_dataflowQueue[$action];
        }

        return array();

    }

}