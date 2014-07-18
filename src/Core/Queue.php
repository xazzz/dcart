<?php

namespace Core;

class Queue {

    private $_data = array ();
    protected $_error = array (
        "error" => 0,
        "message" => "",
        "data" => array(),
    );

    private function __construct()
    {
    }

    public static function getInstance ()
    {
        static $instance = null;

        if ($instance === null) {
            $instance = new Queue();
        }

        return $instance;
    }

    //
    // to initialize a new queue, and if it exist, will return false
    //
    public function newQueue ($id)
    {
        if (isset($this->_data[$id])) {
            return false;
        }

        return $this->_data[$id] = array ();
    }

    //
    // to get a queue, if its exists, or a new queue
    //
    public function getQueue ($id)
    {
        if (!isset($this->_data[$id])) {
            $this->_data[$id] = array ();
        }

        return $this->_data[$id];
    }

}