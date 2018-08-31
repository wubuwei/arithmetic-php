<?php

//非递归版 二分查找
function BinaryQuery(array $container, $search)
{
    $top = count($container);
    $low = 0;
    while ($low <= $top) {
        //floor 返回不大于 变量值 的最接近的整数
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


//递归版 二分查找