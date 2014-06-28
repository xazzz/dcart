<?php
namespace Core;

Interface IService {
    public function load ();
    public function unload ();
    public function start ();
    public function stop ();
    public function sleep ();
    public function wake ();
    public function export();
    public function import();
    public function call($module, $object, $method);
    public function setPriority($priority);

    public function entry ();

    // message queue loop
    public function loop ();
}