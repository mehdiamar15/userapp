<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require("mysqlcnct.php");
require_once ("php/mysqlmo.php");
require_once ("php/user_class.php");
//require_once ("users.php");

$id_user = 137; // id d  user li f session

?>

<!DOCTYPE html>
<html>
<body>

<h1>Show b:</h1>

<form>

                                   <?php

$user = new User($pdo);
$havepermission = $user->have_permission($id_user,'3');
$havepermission2 = $user->have_permission($id_user,'1');
$havepermission3 = $user->have_permission($id_user,'2');
?>
<?php  if ($havepermission){  ?>
    <button type="button">add user!</button> 
<?php } ?>

<?php  if ($havepermission2){  ?>
    <button type="button">edite user!</button> 
<?php } ?>

<?php  if ($havepermission3){  ?>
    <button type="button">delete user!</button> 
<?php } ?>


     
</form>

</body>
</html>



