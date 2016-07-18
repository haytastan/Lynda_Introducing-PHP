<?php
// we use two functions to find date of xmas: 
$xmas2016 = strtotime('Dec 25, 2016');
echo date('l, F j, Y', $xmas2016) . '<br>';
// l: day of the week
// F: month
// j: day of the month
// Y: year

// DateTime is a class and unlike strtotime method it has its own methods and properties
$date1 = new DateTime();
$date2 = new DateTime();

$west_coast = new DateTimeZone('America/Los_Angeles');

$date2->setTimezone($west_coast);

echo $date1->format('g:ia, l, F j, Y') . '<br>';
echo $date2->format('g:ia, l, F j, Y') . '<br>';
// g:ia = time