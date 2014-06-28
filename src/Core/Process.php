<?php

namespace Core;

// Process :: one process is an unit of task running on every node
// Process model is very similar to the process in operating system
//

class Process {

    private $attributes = array (
        "node_uuid",
        "pid",
        "type",
        "module",
        "status",
        "priority",
        "privilege",
        "stack",
        "stack_size",
        "queue",
        "queue_size",
        "user_uuid",
        "user_group_uuid",
        "memory_usage"
    );

    // note unique id
    protected $node_uuid;

    // process id
    protected $pid;

    // command | extension | service
    protected $type;

    // system | user | vendor
    protected $module;

    // start, running, stop, sleep, wake
    protected $status;

    // priority
    private $priority;

    // privilege 0 | 1 | 3
    private $privilege;

    // stack, will sync to disk or database, session...
    private $stack;
    private $stack_size;

    // they could send message to each other
    private $queue;
    private $queue_size;

    // group, for permission
    private $user_uuid;
    private $user_group_uuid;

    // memory usage
    private $memory_usage;

    public function __set ($name, $value)
    {
        if (in_array ($name, $this->attributes)) {
            $this->$name = $value;
        }
    }

    public function __get ($name)
    {
        if (in_array ($name, $this->attributes)) {
            return $this->$name;
        }

        return null;
    }

    public function getAttributes ()
    {
        return $this->attributes;
    }

}