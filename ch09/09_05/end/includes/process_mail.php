<?php
/*we are trying to prevent email header injection, which attempts to trick our form into sending html email with copies to a large number of people*/
$suspect = false; /*nth is suspect at first. because false is a kw double quote is not put*/

// we are using regular expressions to write pattern
$pattern = '/Content-type:|Bcc:|Cc:/i'; /*| means all, /i means case insensitive search*/
// we need a pattern to look for typical e-mail headers used by attackers

// $key: attr value of name attr/name of the form field, $value: submitted user input, $_POST: array
/*3rd argument is passed by reference, that's why 3rd parameter has &*/
/*this function is used to inspect the post array, so inside the curly braces we got a conditional sta that checks whther  the value is an array*/
function isSuspect($value, $pattern, &$suspect) {
    if (is_array($value)) { /* some form elements submit their values as an array */
        foreach ($value as $item) {
            isSuspect($item, $pattern, $suspect); /*$suspect doesn't have the &, since we call the function*/
            /*amacımız arrayi parçalayıp (tek tek) tekrardan fonksiyona yollamak ve value ile patternin birbirine eşit olup olmadığını görmek*/
            /*this is a recursive function which keeps calling itself inside a loop untils it s dealt with all the items it needs to deal with*/
        }
    } else {
        if (preg_match($pattern, $value)) {
            /*1st arg is the regex and 2nd arg is the string we want to match against that pattern*/
            $suspect = true;
        }
    }
}


isSuspect($_POST, $pattern, $suspect);
/*calling the function with args. (post is an array)*/

/*we want to prevent rest of the script from running if there is suspect phrases in our post array. if there is suspect we display error message in the main form*/
if (!$suspect) : /*if suspect is false*/
    foreach ($_POST as $key => $value) {
        $value = is_array($value) ? $value : trim($value); /* some form elements submit their values as an array */
        if (empty($value) && in_array($key, $required)) {
            $missing[] = $key;
            $$key = ''; 
        } elseif (in_array($key, $expected)) {
            $$key = $value; 
        }
    }
endif;