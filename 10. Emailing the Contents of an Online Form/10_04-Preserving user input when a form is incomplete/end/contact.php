<!-- we are trying to preserve the input for when we make a mistake filling the forum -->
<?php
$errors = []; /*error array not used*/
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments'];
    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Preserving input</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<?php if ($errors || $missing) : ?>
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
          // echo "value='$name'"
          // yapınca ' sonrasını ekleyemedik
            echo 'value="' . htmlentities($name) . '"';
          // passing name attr value to htmlentities and wrapping it in double quotes
          // value; tıpkı type, name ve id gibi inputun bir parçası oluyor eksik girme durumunda ama sol tarafta bulunan value'nun ismi değişebilir
          // process_mail.php'de $$key = $value; demeseydik hata verecekti, zira $name, $$key olarak düşünülebilir 
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
          // textareas don't have value attr so they need slightly different way of approaching this
          ?></textarea>
          <!-- php opening and closing tags should be adjacent to text-area tags -->
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>