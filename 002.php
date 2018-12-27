<?php

/** 根据首字母排序,忽略大小写
 * @param array $arr
 * @param string $sort_flag 'desc' 倒序，'asc'正序
 * @return array|bool
 */
function strSort(array $arr, $sort_flag = 'asc')
{
    if (!$arr) {
        return false;
    }
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        for ($j = 0; $j < $len - $i; $j++) {
            if ($sort_flag == 'desc') {
                if (ord(strtolower($arr[$j + 1]{0})) > ord(strtolower($arr[$j]{0}))) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            } else {
                if (ord(strtolower($arr[$j]{0})) > ord(strtolower($arr[$j + 1]{0}))) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
    }
    return $arr;
}
$arr = ['ant', 'old', 'Free', 'bold', 'weight', 'X', 'Line', 'tea', 'over', 'pink', 'yea', 'zoo', 'distance'];
var_dump(strSort($arr, 'desc'));
