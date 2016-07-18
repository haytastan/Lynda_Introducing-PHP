<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments'];
    $to = 'David Powers <david@example.com>'; 
    /* for only mailing adress: $to ='david@example.com' 
    we should separate by comma for more than 1 mailing adress */

    $subject = 'Feedback from online form';
    /*body of the email message is normally 3rd argument, which is absent now. 
    first 3 args (to, subject, body) are necessary, while last 2 args (headers and authorized) are optional*/
    $headers = []; /*empty array*/
    $headers[] = 'From: webmaster@example.com'; /*added to empty array*/
    /*this should be email adress on our own domain. 
    we shouldnt use it for the email adress submitted through the form*/

    $headers[] = 'Cc: another@example.com'; /*added to empty array*/
    // Cc and Bcc are used to send the copy of the mailing adress to another adress
    // if we want more than one adress to send the mail, we should separate by comma

    $headers[] = 'Content-type: text/plain; charset=utf-8'; /*added to empty array*/
    $authorized = null; /*this is for security to stop spam*/
    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Preparing to send</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<?php if ($_POST && $suspect) : ?>
<p class="warning">Sorry, your mail couldn't be sent.</p>
<?php elseif ($errors || $missing) : ?>
<p class="warning">Please fix the item(s) indicated</p>
<?php endif; ?>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
  <p>
    <label for="name">Name:
    <?php if ($missing && in_array('name', $missing)) : ?>
        <span class="warning">Please enter your name</span>
    <?php endif; ?>
    </label>
    <input type="text" name="name" id="name"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($name) . '"';
        }
        ?>
        >
  </p>
  <p>
    <label for="email">Email:
        <?php if ($missing && in_array('email', $missing)) : ?>
            <span class="warning">Please enter your email address</span>
        <?php endif; ?>
    </label>
    <input type="email" name="email" id="email"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($email) . '"';
        }
        ?>
        >
  </p>
  <p>
    <label for="comments">Comments:
        <?php if ($missing && in_array('comments', $missing)) : ?>
            <span class="warning">You forgot to add any comments</span>
        <?php endif; ?>
    </label>
      <textarea name="comments" id="comments"><?php
          if ($errors || $missing) {
              echo htmlentities($comments);
          }
          ?></textarea>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>