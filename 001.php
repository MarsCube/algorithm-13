<?php

/** 数字排序
 * @param array $arr
 * @param string $sort_flag 'desc' 倒序，'asc'正序
 * @return array|bool
 */
function numberSort(array $arr, $sort_flag = 'asc')
{
    if (!$arr) {
        return false;
    }
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        for ($j = 0; $j < $len - $i ; $j++) {
            if ($sort_flag == 'desc') {
                if ($arr[$j + 1] > $arr[$j]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            } else {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
    }
    return $arr;
}
$number_arr = [1, 3, 5, 20, 12, 2, 6, 10, 100, 4, 11];
var_dump(numberSort($number_arr, 'desc'));