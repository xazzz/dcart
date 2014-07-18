<?php

namespace Core;

class Queue {

    private $_data = array ();

    protected $_error = array (
        "status" => "success",
        "message" => ""
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

    public function newQueue ($type)
    {
        if (array_key_exists($type, $this->_data)) {
            return false;
        }

        return $this->_data[$type] = array ();
    }

    public function getQueue ($type)
    {
        if (!array_key_exists($type, $this->_data)) {
            $this->_data[$type] = array ();
        }

        return $this->_data[$type];
    }

}