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

<?php if(isset($_SESSION['User']))

{ 
 

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Leaves  List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Users</li>
                        </ol>
                        
 

                        
                        
                        <div  class="card mb-4">
                            <div  class="card-body">
                            
                            
                               </div>
                        </div>
                    <!-- -----------------------Leaves----------------------------- -->
                        <!-- Button trigger modal -->


<!--------------------------- Modal add leave-------------------------------->
<form action="php/process.php" method="POST">
<div class="modal fade" id="addleavemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">    
        <h5 class="modal-title" id="exampleModalLabel">New Leave</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      
      <div class="modal-body">
           

  <div class="form-group">
    <label for="exampleInputEmail1">Date Leave:</label></br>
    <label for="exampleInputEmail1">   From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    To:</label></br>
     <input type="text" name="daterange" value="" />
   </div>
   
 
 
  <div class="form-group" >
  <label for="exampleInputPassword1">Repo</label>
  <select class="js-example-basic-multiple" name="repo[]" multiple="multiple" style="width: 10.75em;" >
  <option value="Tuesday-Wednesday" >Tuesday-Wednesday </option>
  <option value="Thursday-Friday">Thursday-Friday</option>
    <option value="Saturday-Sunday " selected>Saturday-Sunday</option>
   </select>
 </div>
  


  
  <div class="form-group" >
  <label for="exampleInputPassword1">Type</label>
  <select name="type" class="form-control">
  <option value="Special Leave">Special Leave</option>
  <option value="Paid Leave">Paid Leave</option>
    <option value="Sick Leave">Sick Leave</option>
    <option value="National Holidays">National Holidays</option>
    <option value="Religious Holidays">Religious Holidays</option>
     </select>
 </div>

     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="newleave" class="btn btn-primary">New Leave</button>
      </div>
    
      
      
      
      
      
    </div>
  </div> 
</div>
                         <div class="card-body">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addleavemodal">
                
  New Leave
</button>
 <input type="hidden" id="iduserleave" name="iduserleave"  > 


               </div>
                     
                         <!-- ------------------------------------------------- -->
                         <!----------------show table -------------------------->
        <div class="card-header"><i class="fas fa-table mr-1"></i>Leaves List</div>
        
        
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>ID Leave</th>
                                                <th hidden>id_user</th>
                                                <th>User name</th>
                                                <th>Start date</th>
                                                <th>End Date</th>
                                                <th>Days</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Repo</th>
                                                <th>Entered</th>
                                                <th>Modified</th>
                                                <th>Change Status</th>
                                                
                                                                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID Leave</th>
                                                <th hidden>id_user</th>
                                                <th>User name</th>
                                                <th>Start date</th>
                                                <th>End Date</th>
                                                <th>Days</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Repo</th>
                                                <th>Entered</th>
                                                <th>Modified</th>
                                                <th>Change Status</th>
                                                
                                             
                                            </tr>
                                        </tfoot>
                                        
                                        
                                        
                                        <tbody>
   

      
      <!--  aa = "where id role = 5";    -->                           
                                       
                                         <?php
   $qu = "";
  $idus = $_SESSION["iduser"];
 if ($_SESSION['Roles'] != 'superadmin')
       {
           $qu="where user_account.idAdmin=$idus";
       }
$user = new User($pdo);
$leaves = $user->get_leaves($qu);


?>
<?php foreach($leaves as $lea) { ?>

    <tr>
      <td><?php echo $lea['id_leave'] ?></td>   
      <td><?php echo $lea['user_name'] ?></td>
      <td><?php echo $lea['date_start'] ?></td>
      <td><?php echo $lea['end_date'] ?></td>
      <td><?php echo $lea['days'] ?></td>
      <td><?php echo $lea['type'] ?></td>
      <?php $badge = 'warning'; if ($lea['status']=='accepted'){$badge ='success';} if ($lea['status']=='rejected'){$badge ='danger';} if ($lea['status']=='approved'){$badge ='info';}?>
      <td><span class="badge badge-<?php echo $badge ?>"><?php echo $lea['status'] ?></span></td>
      <td><?php echo $lea['repo'] ?></td>
      <td><?php echo $lea['entered'] ?></td>
      <td><?php echo $lea['modified'] ?></td>
      <td hidden ></td>
      <?php if($lea['status'] == "requested" || $lea['status'] == "rejected" ) {?>
       <td>
       
       
      <div class="btn-group" role="group" aria-label="Basic example" style ="display: flex;">
                       
                    <?php $havepermissiondelete = $user->have_permission($idus,'3');  if ($havepermissiondelete) : ?> <button type="submit" name="approved"  class="btn btn-info statleave">Approved</button>&nbsp;<?php endif ?>
                     <?php $havepermissionedite = $user->have_permission($idus,'2');  if ($havepermissionedite) : ?><button type="submit" name="accepted"  class="btn btn-success statleave">Accepted</button>&nbsp;<?php endif ?>
                     <?php $havepermissionedite = $user->have_permission($idus,'2');  if ($havepermissionedite) : ?><button type="submit" name="rejected" class="btn btn-danger statleave">Rejected</button>&nbsp;<?php endif ?>
                    
               </div>
      
      
      </td>
      <?php } ?>
      
      <?php if($lea['status'] == "approved") {?>
       <td>
       
       
      <div class="btn-group" role="group" aria-label="Basic example" style ="display: flex;">
                       
                     <?php $havepermissionedite = $user->have_permission($idus,'2');  if ($havepermissionedite) : ?><button type="submit" name="accepted"  class="btn btn-success statleave">Accepted</button>&nbsp;<?php endif ?>
                     <?php $havepermissionedite = $user->have_permission($idus,'2');  if ($havepermissionedite) : ?><button type="submit" name="rejected" class="btn btn-danger statleave">Rejected</button>&nbsp;<?php endif ?>
                    
               </div>
      
      
      </td>
      <?php } ?>
      
       <?php if($lea['status'] == "accepted") {?>
       <td>
       
       
      <div class="btn-group" role="group" aria-label="Basic example" style ="display: flex;">
                        <?php $havepermissionedite = $user->have_permission($idus,'2');  if ($havepermissionedite) : ?><button type="submit" name="rejected" class="btn btn-danger statleave">Rejected</button>&nbsp;<?php endif ?>
                    
               </div>
      
      
      </td>
      <?php } ?>
    
    </tr>
  

<?php } ?>
                                        </tbody>
                            
                                    </table>
                       
                        
                        
                        </form> 
                        

                        
                        
                        <!-- -----------------------end users----------------------------- -->
                         
                        <div style="height: 100vh;"></div>
                        

                        
                        
                        
                    </div>
                </main>
               
            </div>
        </div>
<?php require_once ("layout/layoutSidenav.php");?>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
      <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --> 
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
	    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
        
        
        
        
        
        
        <script type="text/javascript">
        $(document).ready(function (){
            console.log('am tr',document);
            
                $('.statleave').on('click', function(){
        
                
        
                 tr = $(this).closest('tr');
                 console.log('am tr',tr);
                 var data = tr.children("td").map(function() {
                     return $(this).text();
        
               }).get();
                 
               console.log('am data',data);
        
                 $('#iduserleave').val(data[0]);
                
        
                	
                });

  });
               
 
 



$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    
  }); 
});
</script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

    
    </body>
    
</html>

 <?php }
 
 else
 {
     header("location:login.php");
 }
 
 ?>
