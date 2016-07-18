<?php
$total = 155.99;
$delivery = 10;

switch($total) {
	// conditions must be in logical order
    case $total < 50: /*total'in yazılması gerek*/
        echo 'Total (including delivery): ' . $total += $delivery;
        break;
    case $total < 100:
        echo 'Total (including delivery): ' . $total += $delivery/2;
        break;
    case $total >= 100:
        echo 'Total (free delivery): ' . $total;

}
