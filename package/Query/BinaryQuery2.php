<?php

//非递归版 二分查找
function BinaryQuery(array $container, $search)
{
    $top = count($container);
    $low = 0;
    while ($low <= $top) {
        //floor 返回不大于 变量值 的最接近的整数。floor() 返回的类型仍然是 float，因为 float 值的范围通常比 integer 要大。
        //intval 获取变量的 整数值
        $mid = intval(floor(($low + $top) / 2));
        if (!isset($container[$mid])) {
            return "not found";
        }
        if ($container[$mid] == $search) {
            return $mid;
        }
        $container[$mid] < $search && $low = $mid + 1;
        $container[$mid] > $search && $top = $mid - 1;
    }
}

//测试floor
$flr = floor((3+4)/2);
$int = intval($flr);
echo gettype($flr) . "--" . gettype($int);
echo "</br>";

var_dump(BinaryQuery([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 9));