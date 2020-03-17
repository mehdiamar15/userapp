
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("php/mysqlmo.php");
require_once("php/process.php");
require_once ("php/user_class.php");
$user = new User($pdo); 
$idus = $_SESSION["iduser"];
?>

<!doctype html>
<html lang="en">
  <head>
  
  
  <style type="text/css">
  .dot {
    height: 15px;
    width: 15px;
    background-color: red;
    border-radius: 50%;
    display: inline-block;
  }

.sec{
    position: relative;
    right: -13px;
    top:-22px;
}

.counter.counter-lg {
    top: -24px !important;
}
  
  
  
  
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
  </head>

  <body>



            <li class="nav-item dropdown" style="left: -350px; top: -0px;">
            <a class="nav-link" href="http://example.com" name ="dropdown01" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope" aria-hidden="true" style="font-size:36px"></i>
                <?php
               
                $qu = "where Leaves.status ='requested' ORDER BY entered DESC;";
                $idus = $_SESSION["iduser"];
                if ($_SESSION['Roles'] != 'superadmin')
                {
                    $qu="where user_account.idAdmin=$idus and Leaves.status ='requested' ORDER BY entered DESC ";
                }
                
                
                $user = new User($pdo);
                $leaves = $user->get_leaves($qu);
                //$count = $leaves->rowCount();
                $count=0;
                foreach($leaves as $row) {
                
                    $count++;
              } 
              if($count > 0 )
                {
                ?>
                <span class="badge badge-warning"><?php echo $count; ?></span>
              <?php
                }
                    ?>
              </a>
            <div id ="div1-wrapper" class="dropdown-menu" aria-labelledby="dropdown01" style="overflow-y: scroll; height:450px;">
                <?php
                if($count > 0){
                    foreach($leaves as $i) { //var_dump($i);
                ?>
                
              <a id ="clicknot" data-id='<?php echo $i['id_leave']?>' name="click" style ="
                         <?php
                         if($i['notific']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="#">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['entered'])) ?></i></small><br/>
                  <?php 
                  
                  echo "You have a request leave from  ",$i['user_name'];
                 
                  
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
            
          </li>
    
         
     
        
          <?php
          if(isset($_POST['update'])){
              $id = $_POST['id'];
              $query ="UPDATE Leaves SET notific = 'read' where id_leave= '$id' ";
              $pdo->query($query);
              header("location:index.php");
              
          }
          if(isset($_POST['like'])){
              $name = $_POST['name'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '$name', 'like', '', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:index.php");
              }
          }
          
          ?>
        

  
<script>
$(document).ready(function(){
	
$('body').on("click", "#clicknot",function(event){
	event.preventDefault();
	//console.log($(this));
	var idl = $(this).data("id")
console.log($(this).data("id"));
	
$.ajax({
    url: 'notification.php',
    type: 'POST',
    data: {
    	'update': 1,
    	'id': idl,
    	
    },
     
	});		
$('#div1-wrapper').load('aa.php' + ' #div1', function(responseText) {

});
	});

	

	
});



</script>
    
  </body>
</html>
