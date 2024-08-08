<?php
    $arr = array(1,2,3,4,5);
    print_r($arr);
    unset($arr[1]);
    $arr2 = array_values($arr);
    echo ("After:");
    print_r($arr2);
?>