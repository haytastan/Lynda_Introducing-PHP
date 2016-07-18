<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments', 'terms'];
    $required = ['name', 'comments', 'terms'];
    $to = 'David Powers <david@example.com>';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: webmaster@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    /*if the form has been submitted without the checkbox being selected it is not included in the post array. steps below are necessary because every script in process_mail.php assumes that the post array will contain all elements listed in the expected array. otherwise it will generate errors*/
    if (!isset($_POST['terms'])) {
        $_POST['terms'] = '';
    }
    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Single checkbox</title>
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
        <?php elseif (isset($errors['email'])) : ?>
            <span class="warning">Invalid email address</span>
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
  <!-- agreed value olmasa, check-box tıklanınca on olacaktı -->
    <input type="checkbox" name="terms" id="terms" value="agreed"
        <?php
        if ($_POST && $terms == 'agreed') {
            echo 'checked';
        }
        ?>
        >
    <label for="terms">I agree to the terms and conditions
    <!-- for caution if not clicked -->
    <?php if ($missing && in_array('terms', $missing)) : ?>
        <span class="warning">Please signify acceptance</span>
        <?php endif; ?>
    </label>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>