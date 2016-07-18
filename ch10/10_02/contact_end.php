<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments', 'gender']; /*name of radio button added*/
    $required = ['name', 'comments', 'gender']; /*genderı expected arrayin elemanı olmadan required arrayin parçası yapabilirdik*/
    $to = 'David Powers <david@example.com>';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: webmaster@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    /*because if no button is set as the default we also need to check whether gender has been included in the post array. if gender element of post array is not set we create a default value of empty string for gender. this is necessary because every script in process_mail.php assumes that every input field listed in the expected array will be included in the post array. otherwise it will generate errors*/
    if (!isset($_POST['gender'])) { /* *** key-value ilişkisi var. gender: key/name attr, (empty string): value/value attr*** */
        $_POST['gender'] = '';
    }
    /* ***most (drop down hariç hepsi) multiple choice elements are not included in the post array if no value is selected*** */
    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Radio buttons</title>
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
  <fieldset>
  <!-- gender, required array'de olduğu için eklendi -->
      <legend>Gender: <?php if ($missing && in_array('gender', $missing)) : ?>
          <span class="warning">Please select a value</span>
          <?php  endif; ?>
      </legend>
      <p>
        <!-- let's say radio button has been selected, but there was an error in the form. we need to redisplay the form with the selected button preserved. we use below php tags for that. 
        if POST array has elements it means form has been submitted
        gender variable comes from the mail processing script which converts the post array into new variables based on the array element key-->
        <input type="radio" name="gender" value="female" id="gender_f"
            <?php
            if ($_POST && $gender == 'female') {
                echo 'checked';
            }
            ?>
            >
          <label for="gender_f">Female</label>
        <input type="radio" name="gender" value="male" id="gender_m"
            <?php
            if ($_POST && $gender == 'male') {
                echo 'checked';
            }
            ?>
            >
          <label for="gender_m">Male</label>
        <input type="radio" name="gender" value="won't say" id="gender_0"
            <?php
            if (!$_POST || $gender == "won't say") {
                echo 'checked';
                // default value when not posted 
                // also when posted with this radio button clicked, it preserves data
            }
            ?>
            >
          <label for="gender_0">Rather not say</label>
      </p>
  </fieldset>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>