<?php
namespace Core\MVC;
use Core\Core;

class Model {

    protected $table;

    protected $_owner;
    protected $_identifier;
    protected $_core;

    public function __constrcut ()
    {
        $this->_core = Core::getInstance();
    }

}