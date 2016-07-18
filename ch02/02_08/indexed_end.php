<?php
// it is useful to store related values in a single variable
// php has two types of arrays: indexed and associative

//long, old version of creating array:
//$characters = array('Arthur Dent', 'Ford Prefect', 'Zaphod Beeblebrox');
//shorthand like js:
$characters = ['Arthur Dent', 'Ford Prefect', 'Zaphod Beeblebrox'];
// gives error: 
//echo $characters;

// add elements to existing array:
$characters[] = 'Marvin';
$characters[] = 'Slartibartfast';
$characters[7] = 'Xasdfds';
// we use array index to access array elements

//we inspect the contents of the array with print_r:
print_r($characters);

echo "<br> $characters[4]";
// alt:
// echo '<br>' . $characters[4];