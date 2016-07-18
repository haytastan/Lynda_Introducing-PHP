<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    // echo $_POST['comments'];
    // echo $_POST['send'];
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments'];
    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blocking suspect phrases</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<?php if ($_POST && $suspect) : ?> <!-- ***if there are elements in the post array and if suspect variable is true ($_POST: if form has been submitted (zira submit buttonun valeu su garantidir zaten). post array ile valuelara ulaşıyoruz (formdaki valuelar, post arrayin valueları iken, post arrayin keyleri, formdaki name attribute une karşılık gelen valuelardır))***-->
<p class="warning">Sorry, your mail couldn't be sent.</p>
<?php elseif ($errors || $missing) : ?> <!-- elseif bitişik -->
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
        <?php /*helps to preserve data in case of error*/
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