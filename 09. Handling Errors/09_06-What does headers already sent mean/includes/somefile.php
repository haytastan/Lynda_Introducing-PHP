<?php
// process some code here
?>
<!-- new line/white space outside of php tags in a server-side include sends output to the browser preventing the header function from working, we either delete white space or delete the php closing tag (if the file only contains php code) or we simply disable "php_value output_buffering 0" so that browser buffers data upto 4 kb of output allowing you to use the header function even if some amount of output is already being sent -->




