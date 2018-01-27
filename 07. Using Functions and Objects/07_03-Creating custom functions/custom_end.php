<?php

echo lyn_convertToMinutes(605);
// when a function is used in the same file as its definition
// it doesnt matter which order they (calling a function vs creating a function)
// appear in we can call the function before its definition.
// if the function definition is in an external file, the external
// file must be loaded first before we can use the function

function lyn_convertToMinutes($seconds) {
    $sec = $seconds % 60;
    if (function_exists('intdiv')) {
        $min = intdiv($seconds, 60);
    } else {
        $min = ($seconds - $sec) / 60;
    }
    $sec = abs($sec); 
    // for negative numbers: lyn_convertToMinutes(-605)
    $sec = ($sec < 10) ? '0' . $sec : $sec;
    return "$min:$sec";
}

