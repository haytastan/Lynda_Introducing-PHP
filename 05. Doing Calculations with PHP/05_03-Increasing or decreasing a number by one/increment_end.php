<?php
$number = 5;

$number++;
echo $number . '<br>';

++$number;
echo $number . '<br>';

// if we increment the operator after, the incremention takes place after the calculation
$result = $number++ * 2;
echo '$result is ' . $result . '<br>';
echo $number . '<br>';

// if we increment the operator before, the incremention takes place before the calculation
$result = ++$number * 2;
echo '$result is ' . $result . '<br>';
echo $number . '<br>';

echo $number++ . '<br>';

echo ++$number . '<br>';