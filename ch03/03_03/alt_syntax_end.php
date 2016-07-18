<?php
$name = 'Arthur Dent';
$day = 'Thursday';
// curly bracket replaced with colon
// endif added to the end
// else if cannot be written separately
if ($name == 'Arthur Dent' && $day == 'Thursday') :
    echo 'I could never get the hang of Thursdays.';
    echo 'I could never get the hang of Thursdays.';
elseif ($name == 'Marvin' || $day == 'Wednesday') :
    echo "I've got this terrible pain in all the diodes down my left-hand side.";
else :
    echo 'Is that really a piece of fairy cake?';
endif;
/*endif, curly bracket yerine kullanılıyor.
yukarıdaki elseif ve else curly bracket vazifesi görüyor*/

