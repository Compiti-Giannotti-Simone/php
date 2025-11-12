<?php
$menu_plates = [
    "Pizza Margherita" => 7.00,
    "Pizza con Prosciutto" => 8.50,
    "Calzone" => 8.00,
    "Pasta Carbonara" => 10.00,
    "Pasta al Pesto" => 9.00,
    "Lasagna" => 10.00,
    "Risotto ai funghi" => 11.50,
    "Gnocchi al pomodoro" => 9.00,
    "Insalata mista" => 6.50,
    "Bruschetta" => 4.50,
    "Tagliata di manzo" => 18.00,
    "Bistecca alla Fiorentina" => 24.00,
    "Frittura mista" => 14.00,
    "Zuppa di pesce" => 15.00,
    "Carpaccio" => 13.00,
    "Pollo alla cacciatora" => 12.50,
    "Filetto al pepe" => 20.00,
    "Tiramisù" => 5.50,
    "Gelato" => 3.50,
    "Bistecca d'oro 24 carati" => 9999.99
];
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

    function add_plate($plate, $amount) {
        if (!isset($this->plates[$plate])) {
            $this->plates[$plate] = 0;
        } 
        $this->plates[$plate]+=$amount;
    }

    function calculate_price() {
        $total = 0.0;
        foreach ($this->plates as $plate => $amount) {
            if (isset($GLOBALS['menu_plates'][$plate])) {
                $price = $GLOBALS['menu_plates'][$plate];
                $total += $price * $amount;
            }
        }
        return $total;
    }
}
?>