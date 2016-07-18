<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Using server-side includes</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Including External Files</h1>
<p>This paragraph is in the original file.</p>
<?php include './includes/para.htm'; ?>  <!-- gives error -->
<!-- script is continued even when the file is not available 
that is the difference of include to require-->
<?php include_once ('./includes/para.html'); ?>
<p>This is also in the original file.</p>
<?php include_once './includes/para.html'; ?> <!-- doesn't show up -->
<?php require './includes/copyright.php'; ?>
<p><?= lyn_copyright(2015); ?> David Powers</p>
<!-- call to lyn_copyright function in copyright.php must be after the file in which function is defined is called. 
link didn't point to the correct location since the path changed  -->
<!-- include and require are not functions and paranthesis are optional after them -->
<!-- adding ./ is optional but path becomes more likely to be accessible -->
</body>
</html>