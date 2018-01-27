<?php
$book = '"The Hitchhiker\'s Guide to the Galaxy"';
$author = 'Douglas Adams';
$answer = 42;
// normally these variables would come from external sources such as database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Embedded PHP</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Dynamic Text In Action</h1>
<p>There's no need for everything in a PHP file to be stored in variables and displayed using echo. PHP code is designed to be embedded in HTML.</p>
<p><mark><?= $book; ?></mark> is a comedy sci-fi series originally written for radio by <mark><?php echo $author; ?></mark>, and subsequently turned into a book, TV series, movie, and numerous stage shows. It reveals that the Answer to the Ultimate Question of Life, the Universe, and Everything is <mark><?php echo $answer; ?></mark>.</p>
</body>
<!-- when we are displaying just a single string we can use a shorthand for echo -->
<!-- mark tag adds a default bg color of yellow
highlighted text comes from dynamic php, whereas everything else comes from static html-->
</html>