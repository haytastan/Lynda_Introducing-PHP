<?php
// $unit_cost = 0;

// null coalesce operator: php 7 feature
// if the variable on the left of the ?? operator is null (not 0) or doesn't exist the operator skips it without raising error and assigns the value on the right. 
// we could comment out $unit_cost by this way without getting error message
$wholesale_price = $unit_cost ?? $non_existent ?? 25;
// we can chain the null coalesce operator

echo $wholesale_price;
