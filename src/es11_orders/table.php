<?php
class Table
{
    public $num;
    public $waiter = "";
    public $plates = array();

    function __construct($num)
    {
        $this->num = $num;
    }

    function set_waiter($waiter)
    {
        $this->waiter = $waiter;
    }

    function add_plate($plate) {
        if (!isset($this->plates[$plate])) {
            $this->plates[$plate] = 0;
        } 
        $this->plates[$plate]++;
    }
}
?>