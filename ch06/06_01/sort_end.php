<?php
$characters = [
    'Arthur Dent',
    'Zaphod Beeblebrox',
    'Marvin',
    'Slartibartfast',
    'Ford Prefect'];
rsort($characters); // reverse order
?>
<!-- in general functions don't change the original value of variables passed them as arguments. so we need to display the return value immediately or capture it in a variable. but there are some exceptions as in array sorting -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sorting an array</title>
    <link rel="stylesheet" href="../../ch07/07_02/styles.css" type="text/css">
</head>
<body>
<h1>Main Characters</h1>
<ul>
    <?php
    foreach ($characters as $name) {
        echo "<li>$name</li>";
    }
    ?>
</ul>
</body>
</html>