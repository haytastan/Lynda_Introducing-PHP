<?php
/*indicates whether mail is sent*/
$mailSent = false; 
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
    // Validate user's email
    if (!$missing && !empty($email)) :
        $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($validemail) {
            $headers[] = "Reply-to: $validemail";
        } else {
            $errors['email'] = true;
        }
    endif;
    // If no errors, create headers and message body
    if (!$errors && !$missing) :
        $headers = implode("\r\n", $headers);

        // Initialize message
        $message = '';
        // message should contain only values from fields that are listed in the expected array. that defends from malicious attacks by injection
        foreach ($expected as $field) :
        // inside foreach we handle the value submitted in each form field 
            if (isset($$field) && !empty($$field)) {
                $val = $$field;
                /*instead of $val = $name (1st time loop runs), $val = $email (2nd time loops runs), $val = $comments (3rd time loop runs)*/
            } else {
                $val = 'Not selected';
            }
            // If an array (some form elements submit their values as an array), expand to a comma-separated string
            if (is_array($val)) {
                $val = implode(', ', $val);
                // implode function joins together all the elements in an array as a single string (comma separated strings)
            }
            // Replace underscores in the field names with spaces, bc we are gonna use them as label in the message
            $field = str_replace('_', ' ', $field); /*we are using name of the input element coming from expected array instead of variable variables.*/
            $message .= ucfirst($field) . ": $val\r\n\r\n"; /*adds current label and the current value to the message variable that we created at the start. ucfirst($field) gives us the name of the field with an upper case first letter. $val is the value stored in that field */
        endforeach;
        $message = wordwrap($message, 70); /*when sending email each line must be max of 70 characters*/
        $mailSent = true; /*we assume mail has been sent*/

        /* we test submitting the form between pre tags in contact.php */
    endif;
endif;