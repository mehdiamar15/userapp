<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require("mysqlcnct.php");
require_once ("php/mysqlmo.php");
require_once ("php/user_class.php");
//require_once ("users.php");

?>





<!DOCTYPE html>
<html>
<body>

<h1>Show checkboxes:</h1>



<form action ="tasks.php" method ="post">
<?php 

$query="select * from tasks";
$tasks = $pdo->query($query);
$user = new User($pdo);
$list = $user->get_users();

//$tas = $tasks->fetch();
// $uselogin['id_user'];
//var_dump($tas['task_id']);
//var_dump($tas['task_name']);


?>
<?php foreach($tasks as $row) { ?>

  <input type="checkbox" name="tasks[]" value="<?php echo $row['task_id'] ?>"  >
  <label for="vehicle1"> <?php echo $row['task_name'] ?></label><br>
  
  <?php } ?>
  
  
   <label for="cars">Choose a user:</label>

<select multiple name ="iduser[]">
<?php foreach($list as $box) { ?>
  <option name ="iduser" value="<?php echo $box['id_user'] ?>"><?php echo $box['id_user'] ?></option>
 
  <?php } ?>
</select> 
  <input name="addtask" type="submit" value="Add tasks">

 <?php  if(isset($_POST['addtask']))
    {   
        //$checkBox = array();
        $user_id = array();
      //  $checkBox = $_POST['tasks'];
        $user_id = $_POST['iduser'];
        foreach ($user_id  as $us)
        {   $checkBox = array();
            $checkBox = $_POST['tasks'];
            for ($i=0; $i<count($checkBox); $i++)
            {
                $query="insert into tasks_users (task_id,user_id) values ($checkBox[$i],$us);";
                $addtask = $pdo->query($query);
            
            }
        }
        echo "added";
        
        
        
        
        
 
        //}
    }
    ?>
  
</form>

</body>
</html>
