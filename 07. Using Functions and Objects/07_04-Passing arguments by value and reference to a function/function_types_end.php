<?php
$number = 2;

// Pass by (though copy of the variable) value: 
// (value'ya karşılık gelen variable kopyası veya doğrudan value pass edilebilir)
// original value remains unchanged
/*function doubleIt($number) {
    return $number *= 2;
}*/

// Pass by (copy of the) reference: 
// value'ya karşılık gelen variable pass edilmek zorunda (value doğrudan pass edilemez)
// passing by reference changes the value of the original variable
function doubleIt(&$num) {
   $num *= 2;
   // no need to return a value for this type of function, because any changes made by the function effect the original value
   // return edilmediği için $doubled, null olur
}

$doubled = doubleIt($number);

echo '$doubled is ' . $doubled . '<br>';
echo '$number is ' . $number . '<br>';
var_dump($doubled);
