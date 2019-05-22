<?php
function binary_search(array $list, $item)
{
    $len = count($list);
    if (0 == $len) {
        return null;
    }
    $low = 0;
    $high = $len - 1;
    while ($low <= $high) {
        $mid = (int)(($low + $high)/2);
        $guess = $list[$mid];
        if ($guess == $item) {
            return $mid;
        }
        if ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return null;
}

$list = [1, 2, 3, 4, 5, 6, 7, 9, 20, 40, 50, 100, 200, 300];
$index = binary_search($list, 40);
var_dump($index);
