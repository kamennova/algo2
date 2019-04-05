<?php

function new_data_arr($size, $min = 1, $max = 10)
{
    $array = [];
    for ($i = 0; $i < $size; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

function new_ordered_arr($size, $min = 1)
{
    $arr = [];
    for ($i = 0; $i < $size; $i++) {
        $arr[] = $min + $i;

    }
    return $arr;
}

function new_unordered_arr($size, $min = 1)
{
    $arr = [];
    for ($i = 0; $i < $size; $i++) {
        $arr[] = $min + $size - $i;
    }
    return $arr;
}

//----

function swap(&$array, $pos1, $pos2)
{
    $temp = $array[$pos1];
    $array[$pos1] = $array[$pos2];
    $array[$pos2] = $temp;
}

function output($array)
{
    $size = count($array);
    echo '[ ';
    for ($i = 0, $k = 1; $i < $size; $i++) {
        echo $array[$i] . ' ';
        if ($i == $k) {
            $k *= 2;
        }
    }
    echo ']<br>';
}

//----

function heap_sort_m($arr)
{
    build_heap($arr);
    $sorted = [];

    for ($i = count($arr) - 1; $i > 0; $i--) {
        array_unshift($sorted, $arr[0]);
        array_shift($arr);

        // $a = count($arr) > 1 ? floor((count($arr) / 2)) - 1 : 0;
        build_heap($arr);
//        heapify_m($arr, $a);
    }

    array_unshift($sorted, $arr[0]);
    return $sorted;
}

function build_heap(&$arr)
{
    $i = floor((count($arr) / 2)) - 1;
    for (; $i >= 0; $i--) {
        heapify_m($arr, $i);
    }
}

function heapify_m(&$arr, $i)
{
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $largest = $i;
    $heap_size = count($arr);

    if ($left < $heap_size) {

        if ($arr[$left] > $arr[$largest]) {
            $largest = $left;
        }
    }
    if ($right < $heap_size) {
        if ($arr[$right] > $arr[$largest]) {
            $largest = $right;
        }
    }

    if ($largest != $i) {
        swap($arr, $i, $largest);
        heapify_m($arr, $largest);
    }
}

//----