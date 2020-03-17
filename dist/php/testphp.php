
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        $to = 'mehdiamar15@gmail.com';
        $subject = 'the subject';
        $message = 'hello hello';
        $headers = 'From: smith.fin00@hotmail.com';


             $to = mail($to, $subject, $message, $headers);
var_dump("aaa",$to);
?>
