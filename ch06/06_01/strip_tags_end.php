<?php

// type of input that could come from online form
$input = "<p>Hi, there! <script>alert('Gotcha!');</script>. <a href='http://www.lynda.com/PHP-training-tutorials/282-0.html'>Expand your PHP skills</a>.";

echo strip_tags($input, '<p><a>');
// strip tags were used to prevent script
// strip_tags take optional second argument