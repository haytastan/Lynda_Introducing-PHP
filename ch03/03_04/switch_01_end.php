<?php
$name = 'Arthur Dent';

switch ($name) {
    case 'Arthur Dent':
        echo 'I could never get the hang of Thursdays.';
       // break;
    case 'Marvin': /*and opr olur case ler alt alta yazılınca*/
    case 'Paranoid Android':
    case 'robot':
        echo "I've got this terrible pain in all the diodes down my left-hand side.";
      //  break;
    default:
        echo 'Is that really a piece of fairy cake?';
        // switch sta executes either until it comes to the break sta, or
        // until it comes to the final curly brace
}
