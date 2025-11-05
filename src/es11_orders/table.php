<?php
class Table {
    public $num;
    public $waiter;
    public $plates = array();

    function __construct($num) {
        $this->num = $num;
    }

    function set_waiter($waiter) {
        $this->waiter = $waiter;
    }

    function add_plate($plate) {
        $this->plates.push($plate);
    }
}
?>