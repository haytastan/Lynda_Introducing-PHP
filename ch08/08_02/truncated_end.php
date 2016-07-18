<?php ini_set('display_errors', '1'); ?>
<!-- helps us show the error below even though we made display_errors off in .htaccess file -->
<!-- when the error is gone we shouldn't forget to erase ini_set function for security reasons before uploading to the server-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Partially rendered page</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
<?php require './includes/menu.php'; ?>
<!-- böyle bir dosya yok -->
</div>
</body>
</html>