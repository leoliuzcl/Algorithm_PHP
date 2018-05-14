<?php
//一次排序将最大的移到最右边，将最小的移到最左边
$arr = [ 3 , 1 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 ];
$count = count($arr);
$begin = 0;
$end = $count - 1;
$last = $end;
while ($last > $begin) {
    for($i=0; $i < $last; $i++) {
        if ($arr[$i] > $arr[$i+1]) {
            $tmp = $arr[$i+1];
            $arr[$i+1] = $arr[$i];
            $arr[$i] = $tmp;
            $last = $i;
        }
    }
    if ($end == $last) {
        break;
    }
    $end = $last;
    for($j=$last; $j > 1; $j--) {
        if ($arr[j] < $arr[$j-1]) {
            $tmp = $arr[$j-1];
            $arr[$j-1] = $arr[$j];
            $arr[$j] = $tmp;
            $last = $j;
        }
    }
    $begin = $last;
}
echo json_encode($arr);
