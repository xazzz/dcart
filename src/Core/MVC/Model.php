<?php
namespace Core\MVC;

use Core\Command;
use Core\Core;

class Model extends Command {

    protected $table;

    protected $_owner;
    protected $_identifier;
    protected $_core;

    public function __constrcut ()
    {
        $this->_core = Core::getInstance();
    }

}