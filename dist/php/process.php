
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require("mysqlcnct.php");
require_once ("mysqlmo.php");
require_once ("user_class.php");
//require_once ("users.php");

if(!isset($_SESSION))
{
    session_start();
} 

    if(isset($_POST['Login']))
    {
        
        var_dump($pdo);
        $email = trim($_POST['email']);
        $pass = trim($_POST['Password']);
        //$email = $_POST['email'];
        //$pass = $_POST['Password'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        if(empty($_POST['email']) || empty($_POST['Password']))
        {
            header("location:../login.php?Empty= Please Fill in the Blanks");
        }
        else
        {  
          //  $email = $_POST['email'];
            //$passs = $_POST['password'];
            
            $query="SELECT user_account.* , role.role_name  FROM user_account INNER JOIN role ON id = role_id where email='$email' and password='$pass' LIMIT 1";
            $statement = $pdo->query($query);
           $statement->execute(
                array($user,$pass)  
                ); 
            $uselogin = $statement->fetch();
           // $uselogin['id_user'];
            var_dump($uselogin['id_user']);
            var_dump($uselogin['role_name']);
            $statlog = $uselogin['status'];
            //var_dump($statement->fetch());
            
            $count = $statement->rowCount();
            if($count > 0 && $statlog == '1')
            {
                $_SESSION["User"] = $_POST["email"];
                $_SESSION["Roles"] = $uselogin['role_name'];
                $_SESSION["Roleid"] = $uselogin['role_id'];
                $_SESSION["iduser"] = $uselogin['id_user'];
                header("location:../index.php");
                exit();
            }
           
           /* if(mysqli_fetch_assoc($result))
            {
               // $_SESSION['User']=$_POST['email'];
                header("location:home.php");              
            }*/
            else
            {
               header("location:../login.php?Invalid= Please Enter Correct email and Password ");
            }
        }
        exit();
        
     
        }else{
            
            header("location:../login.php?Invalid= Please Enter Correct email and Password ");
            
        }
    }

  
//************************************addemploye******************************************************
    /*if(isset($_POST['save']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $hiredate = $_POST['hiredate'];
        $pass = $_POST['password'];
        $role = $_POST['role'];
        if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['gender']) || empty($_POST['birthdate']) || empty($_POST['hiredate']) || empty($_POST['password']))
        {
            header("location:addemployee.php?Empty= Please Fill in the Blanks");
        }
        else
        {
           
            $query2="INSERT INTO dbemployee.employees (birth_date,first_name,last_name,password,gender,hire_date,role) values('".$_POST["birthdate"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["password"]."','".$_POST["gender"]."','".$_POST["hiredate"]."','".$_POST["role"]."')";
            
            $result = $conn->query($query2) or die ($mysql->error);
            header("location:home.php");
            
        }
           
        exit();
    }*/
    $user = new User($pdo);
    if(isset($_POST['save']))
    {
        
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['stat'];
        $nmbr_jrs_conge = $_POST['nmbr_jrs_conge'];
        $role_id = $_POST['role'];
        $tl= $_POST['tl'];
        
        $add = $user->set_users($user_name,$email,$password,$status,$nmbr_jrs_conge,$role_id,$tl);
        header("location:../users.php");
 
        //}
    }
    //***********************************edite user*********************************************************
    
    if(isset($_POST['savechange']))
    {
     
    
        $id_user = $_POST['iduser2'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['stat2'];
        $nmbr_jrs_conge = $_POST['nmbr_jrs_conge'];
        $role_id = $_POST['role2'];
        $tl = $_POST['tledite'];
        
        //echo $role_id ;
        var_dump($id_user);
        
        try {
            
            $user = new User($pdo);
            $edit = $user->edit($user_name,$email,$password,$status,$nmbr_jrs_conge,$role_id,$id_user,$tl);
           /* $query="SELECT user_account.* , role.role_name  FROM user_account INNER JOIN role ON id = role_id";
            $statement = $pdo->query($query);
           
            $uselogin = $statement->fetch();*/
            
            
            //header("location:listemployee.php");            
            //redirecting to the display page (index.php in our case)
           // $_SESSION["Roles"] = $uselogin['role_name'];
            $result='Edited';
           header("location:../users.php?result=$result");
           // $result='<div class="alert alert-success">Deleted</div>';
        }
            
            
        
        catch(PDOException $e)
        {
            
            $result='<div class="alert alert-danger">Not edited</div>';
        }
        
        
        
   
    }
    
    
    //***********************************delete user*********************************************************
    
    if(isset($_POST['deleteit']))
    {
        
        
        $idro="select role_id from user_account  where id_user='".$_POST['iduser']."'";
        $statement = $pdo->query($idro);
        
        $aa = $statement->fetch();
        $aa['role_id'];
        
        if($_POST['iduser'] != '248' && $_SESSION["Roleid"] <= $aa['role_id'] && $_POST['iduser'] != $_SESSION["iduser"]){
            
            
       
        
        $id = $_POST['iduser'];
        echo $id;
        try {
            
            $user = new User($pdo);
            $del = $user->delete($id);
            //header("location:listemployee.php");
            //  var_dump($del);
            
            $q="UPDATE user_account SET idAdmin = '137' where idAdmin='$id'";
            $pdo->query($q);
           
            $result='Deleted';
            header("location:../users.php?result=$result");
      
            //redirecting to the display page (index.php in our case);
           
            
            // $result='<div class="alert alert-success">Deleted</div>';
            
            
        }
        
        catch(PDOException $e)
        {
            
            $result='<div class="alert alert-danger">Not Deleted</div>';
        }
        
        
        }else {
            $result='<div class="alert alert-danger">sorry you cant delete this admin</div>';
            header("location:../users.php?result=$result");
            
        }
        
        
    }
    
    
    //****************************************Leaves****************************************************
    
    
                                   //**********New leave************
    $user = new User($pdo);
    $datec = "";
    if(isset($_POST['newleave']))
    {
        $datec = explode("-", $_POST["daterange"]);
        
      
        $date = str_replace('/"', '/', $datec[0]);  
        $datefrom = date("Y-m-d", strtotime($date));

        $date = str_replace('/"', '/', $datec[1]);
        $dateend = date("Y-m-d", strtotime($date));
        
        echo $datefrom;
        echo $dateend;
        $type = $_POST['type'];
        $usidd = $_SESSION["iduser"];
        echo $usidd;
        echo $type;
        $li = $_POST["repo"];
        //$values = array();
       echo gettype (  $li );
      
        $valuesrepo = implode('/', $_POST["repo"]);
        echo $valuesrepo ;
       //exit();
      // die();
        
       $nleave="insert into Leaves (date_start,end_date,days,type,status,repo,entered,modified,user_account_id) values ('$datefrom','$dateend',DATEDIFF('$dateend','$datefrom'),'$type','requested','$valuesrepo',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),'$usidd');";
       $pdo->query($nleave);
    
        header("location:../leave.php");
        $to = 'mehdiamar15@gmail.com';
        $subject = 'the subject';
        $message = 'hello aaaa222';
        $headers ='From: smith.fin00@hotmail.com';
        
        
        $success= mail($to, $subject, $message, $headers);
        var_dump("aaa",$success);
       
    }
                                    //**********Status leave************
    
  
    if(isset($_POST['accepted']))
    {
        $li = $_POST["iduserleave"];
        echo $li;
        $nleave="UPDATE Leaves SET status = 'accepted' where id_leave = '$li'";
        $modifed="UPDATE Leaves SET modified = CURRENT_TIMESTAMP() where id_leave = '$li'";
        $pdo->query($modifed);
        $pdo->query($nleave);
        
        header("location:../leaves.php");
    }
    if(isset($_POST['approved']))
    {
        $li = $_POST["iduserleave"];
        echo $li;
        $nleave="UPDATE Leaves SET status = 'approved' where id_leave = '$li'";
        $modifed="UPDATE Leaves SET modified = CURRENT_TIMESTAMP() where id_leave = '$li'";
        $pdo->query($modifed);
        $pdo->query($nleave);
        header("location:../leaves.php");
    
    }
    if(isset($_POST['rejected']))
    {
        $li = $_POST["iduserleave"];
        echo $li;
        $nleave="UPDATE Leaves SET status = 'rejected' where id_leave = '$li'";
        $modifed="UPDATE Leaves SET modified = CURRENT_TIMESTAMP() where id_leave = '$li'";
        $pdo->query($modifed);
        $pdo->query($nleave);
        
        header("location:../leaves.php");
    }
    
    
    //****************************************End Leaves****************************************************
    
    
    
//function del($id_del)
//{ global $conn;
//    //echo "Study " . $_GET['id'] . " at " . $_GET['id'];
//   $id = $_GET['id'];
    //   $query3="delete from dbemployee.employees where emp_no='$id_del'";
    //   $result3 = $conn->query($query3) or die ($mysql->error);
    
    //}
    
    
//********************************************************************************************
    
    


?>