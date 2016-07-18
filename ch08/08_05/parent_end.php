<?php
$siteroot = '/my-site/Lynda_Introducing-PHP/ch08/08_05';
require './includes/copyright.php'; ?> <!-- there was a spelling error on this line -->
<!-- failed to open stream error message: stream is external source that php is incapable of reading and in some cases writing too. here it simply means a file. most of the time reason is either the wrong path or wrongly naming the file. there might also be problem with permissions of the file, or the file might be corrupted -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Failed to open stream</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Server-Side Include Not Found</h1>
<p>This paragraph is in the original file.</p>
<?php
// Move para.html to the includes folder for this to work
include './includes/para.html';
?>
<p>This is also in the original file.</p>
<p><?= lyn_copyright(2015) ;?> David Powers</p>
</body>
</html>