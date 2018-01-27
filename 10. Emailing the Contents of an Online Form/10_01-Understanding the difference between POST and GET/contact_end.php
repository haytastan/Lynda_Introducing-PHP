<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Get and post</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<!-- as a general rule the get method should be used for only search forms. the post method is used for sending emails or for inserting records into a database -->
<!-- method get olursa, name attribute name e karşılık gelen value = value attribute name e karşılık gelen value şeklinde url'de gözükür -->
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
<!-- action attr tells the browser where to send the data for processing. usually this is the adress of the script that checks the data and then handles it someway or another such as emailing it, inserting it to a database or adding the processing script in a conditional sta above the doctype to execute the code only when the form has been submitted (which is called as self-processing form, and makes it easy to redisplay the form if there are any errors) action attr must have value in html5
$_SERVER['PHP_SELF'] automatically include the path to the current file in the action attr. we don't need to worry about changing the file name using PHP_SELF instead of file name
$_SERVER is a super global array-->
  <p>
    <label for="name">Name:</label> <!-- for and id attr values match each other for ease of clicking -->
    <input type="text" name="name" id="name"> <!-- name attr value is used for url and linking to php -->
  </p>
  <p>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
  </p>
  <p>
    <label for="comments">Comments:</label>
    <textarea name="comments" id="comments"></textarea>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
<pre>
    <?php
    // $_GET and $_POST are super global arrays as well 
    // get and post arrays are always created by php, but they don't contain values if a form hasn't been submitted by the relevant method (get or post). php treats empty array as false. but if the form has been submitted using the get method the get array will have values and display these values. 
    // both the $_GET array and the $_POST array use the name attribute of each form element to identify the value submitted. $_GET array and the $_POST array capture the values submitted by a form using the post and get methods respectively. the name attr of each form element is used as the array key. name attribute of each input element cannot have spaces 
    if ($_GET) {
        echo 'Content of the $_GET array:<br>';
        print_r($_GET);
        // name attribute valueları ile userın girdiği inputlar gözükür 
    } elseif ($_POST) {
        echo 'Content of the $_POST array:<br>';
        print_r($_POST);
    }
    ?>
</pre>
</body>
</html>