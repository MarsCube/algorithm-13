<?php

/** 选择排序
 * @param array $arr
 * @return array|bool
 */
function strSort(array $arr)
{
    if (!$arr) {
        return false;
    }
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        //假设最小值的位置
        $p = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$p] > $arr[$j]) {
                //比较后，发现了更小的；且在下次比较时采用已知最小值进行比较
                $p = $j;
            }
        }
        //已经确定了当前的最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换
        if ($p != $i) {
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    return $arr;
}

$arr = [1, 3, 5, 20, 12, 2, 6, 10, 100, 4, 11];
var_dump(strSort($arr));