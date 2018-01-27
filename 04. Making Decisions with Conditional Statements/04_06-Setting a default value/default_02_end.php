<?php
$unit_cost = 0;
// $unit_cost valuesu comment out olsa bile hata vermez, 
// zira isset metodu var aşağıda;

// $unit_cost is set, but it is not true
// sol taraf existence ile sağ taraf true olması ile ilgili
if (isset($unit_cost) && $unit_cost) {
    $wholesale_price = $unit_cost;
} else {
    $wholesale_price = 25;
}

echo $wholesale_price;
