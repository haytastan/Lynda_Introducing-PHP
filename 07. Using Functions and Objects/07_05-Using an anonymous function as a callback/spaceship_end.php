<?php
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
usort($friends, function($a, $b) {
    // php 7 feature: <=>: php7 spaceship operator
    // önce last'a göre sonra first'e göre sıralanıyor
    return [$a['last'], $a['first']] <=> [$b['last'], $b['first']];
    // if the last element of a is smaller than last element of b return -1
    // if the last element of a is equals to the last element of b return 0
    // if the last element of a is greater than the last element of b return 1
    
    // öncelikle ilk isme göre sıralar:
    // return [$a['first'], $a['last']] <=> [$b['first'], $b['last']];
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
foreach ($friends as $friend) {
    echo '<li>' . implode(' ', $friend) . '</li>';
}
?>
</ul>
</body>
</html>