<?php

// adding 'lyn_' prevents clashes with existing functions
function lyn_copyright($startYear) {
    $currentYear = date('Y'); // no need to create an object
    if ($startYear < $currentYear) {
    	// date('y') converts to 2 digits
        $currentYear = date('y'); 
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}

echo lyn_copyright(2010) . '<br> <br>';
echo lyn_copyright(2030);
/*fonksiyonu çağırmak main metod'da gerçekleşiyor diye düşünülebilir*/
