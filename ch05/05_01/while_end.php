<?php
// initialize counter
$i = 0;
// since i is a counter, it is acceptable to use single letter variable

while ($i < 10) {
    // increment counter
    $i++;
    // 0 is implicitly false
    if ($i % 2) {
        continue; // skips the current iteration
    }
    // alt:
    // if ($i % 2 == true) {
    //     continue;
    // }
    // or
    // alt2: true, false'dan ziyade custom bir sayı için
    // if ($i % 2 == 1) {
    //     continue;
    // }
    echo $i . '<br>';
    if ($i == 6) {
        break; // exits the loop
    }
}
