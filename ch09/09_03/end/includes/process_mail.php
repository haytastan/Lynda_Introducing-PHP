<?php
// we create the for each loop to loop through the post array as key and value
// $key: attr value of name attr/name of the form field, $value: submitted user input (submit buttonın zaten valuesu vardı), $_POST: array
foreach ($_POST as $key => $value) {
	// *** querying if we submitted each $value as an array or not (some form elements submit their values as an array) ***
    $value = is_array($value) ? $value : trim($value);
    // we are trying to find out if the value is empty and key is in the required array
    // this sta deals with required fields that are missing
    if (empty($value) && in_array($key, $required)) {
        $missing[] = $key; /*assigns the key (name of the form field) to the missing array, syntaxe dikkat*/
        $$key = ''; /*keylerin nitelediği valuelar boş oluyor*/
        // $_POST['name'] becomes $name, $_POST['email'] becomes $email and $_POST['comments'] becomes $comments. $key; 'name', 'email' ve 'comments' ise $$key; $name, $email, $comments olarak düşünülebilir 
        
        // $_POST['name'], $_POST['email'], $_POST['comments']
        // processing the data would be easier if the values could be reassigned to simple variables like this: $name, $email, $comments
        // we manage to do this by using a php construction named variable variables which creates a new variable dynamically:
        // ($_POST['email']='david@example.com') $key = 'email' -> $$key = 'david@example.com' ($email = 'david@example.com')
        // variable variable creates a new variable that derives its name from the value of the original variable
    } elseif (in_array($key, $expected)) {
    	// echo $value;
        // echo $key;
        $$key = $value;
        // echo $$key;

        /*if the field is in the expected array we need to assign the value to a simple variable*/
    }
    /*in both cases a variable using the same name as the key will be created, but if the required field is blank the value of the new variable is set to an empty string and its key is added to the missing array*/
}
