<?php
$errors = [];
$missing = [];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Conditional error messages</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<?php if ($errors || $missing) : ?> 
<!-- if either of these 2 arrays have elements, they will be true -->
<p class="warning">Please fix the item(s) indicated</p>
<?php endif; ?>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
  <p>
    <label for="name">Name:
    <!-- if the user forgets to fill in a required field, the field's name will be added to the missing array.
    "name" is the attr value we are looking for in the "missing" array -->
    <?php if ($missing && in_array('name', $missing)) : ?>
        <span class="warning">Please enter your name</span>
    <?php endif; ?>
    </label>
    <input type="text" name="name" id="name">
  </p>
  <p>
    <label for="email">Email:
        <?php if ($missing && in_array('email', $missing)) : ?>
            <span class="warning">Please enter your email address</span>
        <?php endif; ?>
    </label>
    <input type="email" name="email" id="email">
  </p>
  <p>
    <label for="comments">Comments:
        <?php if ($missing && in_array('comments', $missing)) : ?>
            <span class="warning">You forgot to add any comments</span>
        <?php endif; ?>
    </label>
    <textarea name="comments" id="comments"></textarea>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>