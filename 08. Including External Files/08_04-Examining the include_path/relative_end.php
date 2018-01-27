<!-- document relative path is more efficient to servers include path -->
<?php
/*
 * IMPORTANT: Change the path after PATH_SEPARATOR to match your own environment.
 */
set_include_path(get_include_path() . PATH_SEPARATOR . '\wamp64\www\my-site\Lynda_Introducing-PHP\ch07\07_04\includes');
require 'copyright.php'; ?> <!-- './includes/copyright.php' denmedi -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Using include_path</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Using the include_path</h1>
<p>This paragraph is in the original file.</p>
<?php include 'para.html'; ?> <!-- './includes/para.html' denmedi -->
<p>This is also in the original file.</p>
<p><?= lyn_copyright(2015) ;?> David Powers</p> <!-- yukarıda require ile çağırdığımız dosyadaki functionı çağırıyoruz -->
</body>
</html>