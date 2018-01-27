<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge: using loops</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Multiplication Table</h1>
<table>
    <?php
    // Create first row of table headers 
    echo '<tr>';
    echo '<th>&nbsp;</th>';
    for ($col = 1; $col <= 12; $col++) : // col, th görevinde
        echo "<th>$col</th>";
    endfor;
    echo '</tr>';
    // Create remaining rows (1'den fazla row olacağı için for loop dışarıda)
    for ($row = 1, $col = 1; $row <= 12; $row++) :
    // loop with 2 counters 
    // (column (curly bracede) ne increment edildi ne de conditionı var)
        echo '<tr>';
        // First cell is a table header
        if ($col == 1) {
            echo "<th>$row</th>";
        }
        // this inner loop creates the cells (columns) for the current row
        while ($col <= 12) :
            echo '<td>' . $row * $col++ . '</td>';
        endwhile;
        echo '</tr>';
        // Reset $col at the end of each row
        // aksi halde başlık atılmaz
        $col = 1;
    endfor;
    ?>
</table>
</body>
</html>