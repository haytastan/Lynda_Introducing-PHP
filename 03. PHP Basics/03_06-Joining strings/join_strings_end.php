<?php
$firstName = 'David';
$lastName = 'Powers';
$title = '"The Hitchhiker\'s Guide to the Galaxy"';
$author = 'Douglas Adams';
$answer = 42;
$newLines = "\r\n\r\n";

//$fullName = $firstName . $lastName;

$fullName = "$firstName $lastName";
// alt: less efficient
//$fullName = $firstName . ' ' . $lastName;

$book = "$title by $author";

//echo $fullName . '<br>';
//alt: more efficient
//echo "$fullName <br>";
//echo $book;

// when sending a message via php the body of the message needs to be a single string
// and often this info comes from many different fields in the online form
// ".=" : combined concatenation operator
$message = "Name: $fullName $newLines";
$message .= "Book: $book $newLines";
$message .= "Answer: $answer";
// browser doesn't display carriage returns and new line characters but 
// page source does
echo $message;

// alt: 
// $message = "Name: $fullName  
// 			Book: $book
// 			Answer: $answer";
// echo $message;