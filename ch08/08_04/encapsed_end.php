<?php
$descriptions = [
    'Earth' => 'mostly harmless',
    'Marvin' => 'the paranoid android',
    'Zaphod Beeblebrox' => 'President of the Imperial Galactic Government'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T_ENCAPSED_AND_WHITESPACE</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<h1>Descriptions</h1>
<p><?php echo 'In the revised edition of the Hitchhiker\'s Guide, Earth is described as ' . $descriptions['Earth']; ?></p>
<p><?php echo "In the revised edition of the Hitchhiker's Guide, Earth is described as {$descriptions['Earth']}"; ?></p>
<!-- curly brackets are needed in double quotes for associative array -->
<!-- T_ENCAPSED_AND_WHITESPACE error signals embedding an associative array element into a double quoted string wrongly (sth to do with curly brace)-->
<p>Marvin, <?php echo $descriptions['Marvin']; ?>, has a brain the size of a planet.</p> <!-- static text would be more appropriate in html as in this sentence rather than the previous ones -->
</body>
</html>