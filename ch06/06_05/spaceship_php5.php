<?php
// multi-dimensional array: array of arrays
// each element is an associative array with the elments first and last
$friends = [
    ['first' => 'Jim', 'last' => 'White'],
    ['first' => 'Jane', 'last' => 'White'],
    ['first' => 'Hilary', 'last' => 'Brown'],
    ['first' => 'Harry', 'last' => 'Brown'],
    ['first' => 'Paul', 'last' => 'Green'],
    ['first' => 'Amanda', 'last' => 'Green'],
    ['first' => 'John', 'last' => 'Black'],
    ['first' => 'Diana', 'last' => 'Black']
];
// sort($friends);
// doesn't sort the last names, so we need to create a user defined sort
// usort, sorts an array by values using a user-defined comparison function
// 1st argument of usort is $friends, and 2nd argument is callback function
// rather than define the comparison function elsewhere and pass the name of the function as the 2nd argument to usort we use an anonymous function
// $a, $b are the array elements we are going to compare passed as arguments to the anonymous comparison function
usort($friends, function($a, $b) {
    // PHP 5 doesn't support the spaceship operator.
    // Use a conditional statement instead.
    if ([$a['last'], $a['first']] < [$b['last'], $b['first']]) {
        return -1;
    } elseif ([$a['last'], $a['first']] > [$b['last'], $b['first']]) {
        return 1;
    } else {
        return 0;
    }
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anonymous callback</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<h1>User-Defined Sort</h1>
<ul>
<?php
// echo $friends[0]['first'];
// echo $friends[7]['last'];

foreach ($friends as $friend) {
    echo '<li>'. implode(' ', $friend) . '</li>';
    // because each array element is an array we need to convert it to a string with implode
    // inner array elements are separated by space with ' '
}
?>
</ul>
</body>
</html>