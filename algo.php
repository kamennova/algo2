<?php

$comparisons = 0;
$calls = 0;

function get_next_fibonacci_num($num)
{
    if ($num == 1) return 2;
    return get_fibonacci_num(1, 1, $num);
}

function get_fibonacci_num($prev, $curr, $num)
{
    $temp = $curr;
    $curr = $prev + $curr;
    $prev = $temp;

    if ($curr == $num) {
        return $curr + $prev;
    }
    return get_fibonacci_num($prev, $curr, $num);
}

//---

function fibonacci_search($stack, $needle)
{
    return fibonacci_search_step($stack, $needle, 0);
}

function fibonacci_search_step($stack, $needle, $start)
{
    global $calls;
    global $comparisons;

    $fib_num = 1;
    $index = $fib_num + $start - 1;
    $len = count($stack);

    while (($fib_num + $start - 1) < $len && $stack[$fib_num + $start - 1] < $needle &&
        ++$calls && ++$comparisons) {
        $index = $fib_num + $start - 1;
        $fib_num = get_next_fibonacci_num($fib_num);
    }

    $end_index = $fib_num + $start - 1;
    if ($end_index < $len && $stack[$end_index] == $needle && ++$calls && ++$comparisons) { // comparison??
        return $end_index;
    }

    return fibonacci_search_step($stack, $needle, $index);
}

//---

function list_fibonacci_search($list, $needle)
{
    return list_fibonacci_search_step($list, $needle, 0);
}

function list_fibonacci_search_step($list, $needle, $start)
{
    $fib_num = 1;
    $index = $fib_num + $start - 1;
    $len = $list->get_length();

    while (($fib_num + $start - 1) < $len && $list->get_elem_data($fib_num + $start - 1) < $needle) {
        $index = $fib_num + $start - 1;
        $fib_num = get_next_fibonacci_num($fib_num);
    }

    $end_index = $fib_num + $start - 1;
    if ($end_index < $len && $list->get_elem_data($end_index) == $needle) {
        return $end_index;
    }

    return list_fibonacci_search_step($list, $needle, $index);
}

function generate_arr($num)
{
    $arr = [];
    $key = rand(1, 20);

    for ($i = 0; $i < $num; $i++) {
        $key += 2;
        $arr[] = $key;
    }

    return ($arr);
}

function output_arr($arr)
{
    for ($i = 0, $len = count($arr); $i < $len; $i++) {
        echo $arr[$i] . ' ';
    }
    echo "\n";
}