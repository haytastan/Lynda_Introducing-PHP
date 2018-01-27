<?php
$unit_cost = 0;
// $unit_cost valuesu belirtilmeseydi hata verecekti

// $unit_cost values of 0, 0.0, "", '', null, false, "0" are implicitly false
$wholesale_price = $unit_cost ?: 25;
// alt 0: 
// $wholesale_price = ($unit_cost==true) ? $unit_cost : 25;

// alt1 ve alt2 implicitly false değerler için alt değiller:
// !alt 1: 
// $wholesale_price = ($unit_cost==0) ? $unit_cost : 25;
// !alt 2:
// $wholesale_price = ($unit_cost=0==true) ? $unit_cost : 25;

// !alt 3: yanlış zira sadece $unit_cost a 0 değerini atar ve true olur hep
// $wholesale_price = ($unit_cost=0) ? $unit_cost : 25;

echo $wholesale_price;
