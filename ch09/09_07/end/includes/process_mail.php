<?php
// Assume the input contains nothing suspect
$suspect = false;
// Regular expression to search for suspect phrases
$pattern = '/Content-type:|Bcc:|Cc:/i';

// Recursive function that checks for suspect phrases
// Third argument is passed by reference
function isSuspect($value, $pattern, &$suspect) {
    if (is_array($value)) {
        foreach ($value as $item) {
            isSuspect($item, $pattern, $suspect);
        }
    } else {
        if (preg_match($pattern, $value)) {
            $suspect = true;
        }
    }
}

// Check the $_POST array for suspect phrases
isSuspect($_POST, $pattern, $suspect);

// Process the form only if no suspect phrases are found
if (!$suspect) :
    // Check that required fields have been filled in,
    // and reassign expected elements to simple variables
    foreach ($_POST as $key => $value) {
        $value = is_array($value) ? $value : trim($value);
        if (empty($value) && in_array($key, $required)) {
            $missing[] = $key;
            $$key = '';
        } elseif (in_array($key, $expected)) {
            $$key = $value;
        }
    }

    // In this chapter we are trying to incorporate user's email adress safely into the headers
    // we want to add the user's email adress to the headers array only if no suspect phrase is found

    // Validate user's email: david@example hata verir bu işlemlerden sonra
    if (!$missing && !empty($email)) :
        // we call a function below and it is used for validating the email
        // this function returns the value being tested if the contents of the email element in the post array confirms a valid email format, otherwise it will return false
        $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($validemail) { /*if true then we add the mail to our headers array*/
            $headers[] = "Reply-to: $validemail";
        } else {
            $errors['email'] = true; /*burada kullanacağımız için errors arrayini (boolean) yaratmışız*/
            /*if there is a problem with the mailing adress, we display an error message in the form*/
        }
    endif;
    // If no errors, create headers and message body
    if (!$errors && !$missing) :
        $headers = implode("\r\n", $headers);
    // each email header except the last one needs to be terminated by a carriage return and new line character. so we use the implode function to join the elements of the headers array. 
    endif;
endif;