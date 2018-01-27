<?php
/*escape sequence ("\") tells the php engine 
to treat the following character as part of the string*/
//$book = 'Hitchhiker\'s Guide to the Galaxy';
//$book = "Hitchhiker's Guide to the Galaxy"; 
//$book = '"Hitchhiker\'s Guide to the Galaxy"';
$book = "\"Hitchhiker's Guide to the Galaxy\"";

//echo $book;

//echo 'I love $book'; 
echo "I love $book";
// alt: $book quotation marka sahip olmasaydı
// echo "I love " . "\"$book\"";
// if we want to insert a variable in a string we must use double quotes	