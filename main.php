<?php

include_once "algo.php";
include_once "list.php";


echo "Array: \n";
$arr = generate_arr(1000);
output_arr($arr);

$search_item = $arr[999];
echo "Searching for: " . $search_item . "\n";
echo "Position: " . fibonacci_search($arr, $search_item) . "\n";
global  $calls, $comparisons;
echo "Calls: " . $calls . "\n";
echo "Comparisons: " . $comparisons . "\n";

//---
/*
echo "List: \n";
$list = new ListC;
$list->fill(1000);
$list->output();

$list_search_item = $list->get_elem_data(206);
echo "Searching for: " . $list_search_item . "\n";
echo "Position: " . list_fibonacci_search($list, $list_search_item) . "\n";
*/