<?php

/**
* 用栈实现对括号是否有效进行判断
**/
function isValid(string $str)
{
    if (!$str) {
        return 0;
    }
    $stack = [];
    $map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    for ($i = 0; $i < strlen($str); $i++) {
        $c = $str[$i];
        if (in_array($c, array_keys($map))) {
            $top_element = array_pop($stack);
            if ($map[$c] != $top_element) {
                return false;
            }
        } else {
            array_push($stack, $c);
        }
    }
    return true;
}

$is_valid = isValid('()[]{([]{})}');

if ($is_valid === false) {
    echo '不通过';
} elseif ($is_valid === true) {
    echo '通过';
}