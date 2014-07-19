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

    protected $_themePath;
    protected $_themeUrl;

    protected static $_core;
    protected static $_actionQueue;
    protected static $_dataflowQueue;
    protected static $_interactionQueue;
    protected static $_messageQueue;


    //
    // who will register action? or add event listener?
    //
    // here we used this way, usually will be able to register action, or cause
    // model can do it too.
    //
    // how they know which action he will need to register?
    //
    // every controller will expose their action list to be public, and for those
    // who are going to use it, the developer will look up the action dictionary,
    // and then he will know how to use it
    //
    // $action is "system.app_name.command.command_name.controller.method.action"
    // $id is from who registered it, "xxx.xxx.xxx.controller.method"
    // $callback is from caller
    //
    // action queue is more like a action trigger, when the event is coming it will trigger
    // all those actions in the same queue
    //

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
    // data flow queue is more like a data processing chain, the data will be flowed to
    // one and another, then flow back, we should be able to define the order of them...
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