<?php

$title = "The Hitchhiker's Guide to the Galaxy";
$author = 'Douglas Adams';
$android = 'Marvin';
$brain_size = 'the size of a planet';
/*when we construct a string that contains a lot of quotation marks,
instead of creating a text having many escape sequences that is hard to read and manage,
here doc syntax might be used*/

// there shouldn't even be a space after "EOT"
// EOT stands for end of text being changeable
// heredoc is a variable being changeable
$heredoc = <<< EOT
In "$title" by $author, $android the "paranoid android" complains that he's asked to do menial tasks, even though he's got "a brain $brain_size."
EOT;

echo $heredoc;