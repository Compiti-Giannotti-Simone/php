<?php

    function mean($nums) {
        return array_sum($nums) / sizeof($nums);
    }

    function printResult($mean) {
        return $mean>=6 ? "Promosso" : "Bocciato";
    }
?>