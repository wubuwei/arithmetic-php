<?php

/**
 * 二分查找
 * -------------------------------------------------------------
 * 思路分析：数组中间的值floor((low+top)/2) 
 * -------------------------------------------------------------
 * 先取数组中间的值floor((low+top)/2)然后通过与所需查找的数字进行比较，
 * 若比中间值大则将首值替换为中间位置下一个位置，继续第一步的操作；
 * 若比中间值小，则将尾值替换为中间位置上一个位置，继续第一步操作
 * 重复第二步操作直至找出目标数字
 */

// 非递归版 二分查找
function BinaryQuery(array $container, $search)
{
    $top = count($container);
    $low = 0;
    while ($low <= $top) {
        //floor 将小数部分舍去取整。floor() 返回的类型仍然是 float，因为 float 值的范围通常比 integer 要大。
        //intval 转换为整型
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


// 递归版 二分查找
function BinaryQueryRecursive(array $container, $search, $low = 0, $top = 'default')
{
    $top == 'default' && $top = count($container);
    if ($low <= $top) {
        $mid = intval(floor($low + $top) / 2);
        if (!isset($container[$mid])) {
            return "没找着哦";
        }
        if ($container[$mid] == $search) {
            return $mid;
        }
        if ($container[$mid] < $search) {
            return BinaryQueryRecursive($container, $search, $mid + 1, $top);
        } else {
            return BinaryQueryRecursive($container, $search, $low, $mid - 1);
        }
    }
}


//floor返回浮点型，intval返回整型
$flr = floor((3+4)/2);
$int = intval($flr);
echo gettype($flr) . "--" . gettype($int);
echo "</br>";

var_dump(BinaryQuery([0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 9], 9));
echo "</br>";
var_dump(BinaryQueryRecursive([0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 9], 9));
