<?php
$descriptions = [
    'Earth' => 'mostly harmless',
    'Marvin' => 'the paranoid android',
    'Zaphod Beeblebrox' => 'President of the Imperial Galactic Government'
];
$descriptions['Mars']="Great"; /*syntaxe dikkat*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Using a foreach loop</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<h1>Descriptions</h1>
<?php
// useful for associative arrays: 
foreach ($descriptions as $key => $value) {
    echo "<p>$key is $value.</p>";
}
?>
<!-- alt: listli version: -->
<!-- <ul>
	<?php
	// useful for associative arrays: 
	foreach ($descriptions as $key => $value) {
	    echo "<li>$key is $value.</li>";
	}
	?>
</ul>  -->
</body>
</html>