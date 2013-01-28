<?php
//かかった時間
$set = $time_set - $time_start;
$get = $time_end - $time_set;
$total = $time_end - $time_start;

//出力
# echo "loop num : " . LOOP_NUM . "\n";
echo "set : " . $set . " sec \n";
echo "get : " . $get . " sec \n";
echo "total : " . $total . " sec \n";
echo "\n";

