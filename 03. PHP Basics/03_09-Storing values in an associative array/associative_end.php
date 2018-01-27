<?php
$descriptions = [
    'Earth' => 'mostly harmless',
    'Marvin' => 'the paranoid android'
];

$descriptions['Zaphod'] = 'President of the Imperial Galactic Government';

//echo $descriptions['Marvin'];

//print_r($descriptions);

echo "Earth is described as {$descriptions['Earth']}";
/*we included associative array element in a double quoted string with curly brackets*/

/*indexed arrays use numbers starting from 0 to identify each array element whereas associative arrays use strings to identify each value*/