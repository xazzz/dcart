<?php

namespace Core;

class Queue {

    protected $_data = array ();
    protected $_type = "";
    protected $_type_array = array ();

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

    public function setQueue ($type)
    {
        $type = (string)$type;
        if (empty ($type)) {
            $this->_error["status"] = "failure";
            $this->_error["message"] = "empty type";
            return false;
        }

        if (in_array($type, $this->_type_array)) {
            $this->_error["status"] = "failure";
            $this->_error["message"] = "type already exist";
            return false;
        }

        $_data[(string)$type] = array ();
        array_push($this->_type_array, $type);
    }

    public function getQueue ()
    {
        if (in_array($this->_type, $this->_type_array)) {

            return $this->_data[$this->_type];
        }

        return null;
    }

    public function select ($type)
    {
        $this->_type = (string)$type;
    }

    public function get ($name)
    {
        $name = (string)$name;
        if (empty ($name)) {
            return null;
        }

        if (isset ($this->_data[$this->_type])) {

            if (isset ($this->_data[$this->_type][$name])) {

                return $this->_data[$this->_type][$name];
            }
        }

        return null;
    }

    public function set ($name, $value)
    {
        $name = (string)$name;
        if (empty ($name)) {
            return false;
        }

        if (isset ($this->_data[$this->_type])) {
            $this->_data[$this->_type][$name] = $value;
            return true;
        }

        return false;
    }

    public function del ($name)
    {
        $name = (string)$name;
        if (empty ($name)) {
            return false;
        }

        if (isset ($this->_data[$this->_type])) {
            unset($this->_data[$this->_type][$name]);
            return true;
        }

        return false;
    }

}