<?php

namespace Core\MVC;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Core\Command;

class Controller extends Command {

    protected $request;
    protected $response;

    protected $result = array (
        "error" => 0,
        "message" => "",
        "data" => array (),
    );

    public function _setSuccess ($message="", $data=array())
    {
        $this->result["error"] = 0;
        $this->result["message"] = $message;
        $this->result["data"] = $data;

        return true;
    }

    public function _setFailed ($message="", $data=array())
    {
        $this->result["error"] = 1;
        $this->result["message"] = $message;
        $this->result["data"] = $data;

        return false;
    }

    public function _getResult ()
    {
        return $this->result;
    }

}