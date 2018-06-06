<?php

$a = [1, 2, 5, 7, 8, 9, 12, 14, 15, 16, 56, 78, 87];

function binary_search($value) {
    global $a;
    $begin = 0;
    $end = count($a);
    while($begin < $end) {
        $mid_index = intval(($end + $begin)/2);
        $mid_value = $a[$mid_index];
        if ($value > $mid_value) {
            $begin = $mid_index;
        } elseif($value < $mid_value) {
            $end = $mid_index;
        } else {
            echo $a[$mid_index].'-----'.$mid_index.PHP_EOL;
            return;
        }
    }
}
echo binary_search(87);