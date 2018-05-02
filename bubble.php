<?php
$a = [3, 7, 9, 8 ,4 ,6 ,2, 1];
foreach ($a as $key => $value) {
    foreach($a as $key_x => $value_x) {
        if ($key_x <= $key) {
            continue;
        }
        if ($value_x < $value) {
            $tmp = $a[$key_x];
            $a[$key_x] = $a[$key];
            $a[$key] = $tmp;
        }
    }
}
echo json_encode($a);
