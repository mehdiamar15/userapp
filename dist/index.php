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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                            <?php  if ($_SESSION['Roles'] == 'superadmin') : ?>
                                <div class="card bg-primary text-white mb-4">
                             
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>  
                               <?php endif ?>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                 <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Users List</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th hidden >id_user</th>
                                                <th hidden>id_role</th>
                                                <th>user name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>status</th>
                                                <th>jours conge </th>
                                                <th>role</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th hidden>id_user</th>
                                                <th hidden>id_role</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                             
                                            </tr>
                                        </tfoot>
                                        
                                        
                                        
                                        <tbody>
                                        
                                          
                                           
                                 
                          
                                            
                                       
                                          
                                             

                                       
                                       
<?php
 $qu = "";
$idus = $_SESSION["iduser"];
if ($_SESSION['Roles'] != 'superadmin')
 {
$qu="where idAdmin = $idus";
 }
$user = new User($pdo);
$list = $user->get_users($qu);

?>
<?php foreach($list as $row) { ?>

    <tr>
      <td hidden><?php echo $row['id_user'] ?></td>
      <td hidden><?php echo $row['role_id'] ?></td>
      <td><?php echo $row['user_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['password'] ?></td>
      <td><?php
      if ($row['status'] ==1){
          echo "Active";
          
      }
      else {
          echo "Inactive";
      }
              
      ?></td>
      <td><?php echo $row['nmbr_jrs_conge'] ?></td>
      <td><?php echo $row['role_name'] ?></td>
     <!--   <td><a  href="users.php?id=<?php echo $row['id_user']; ?>">Delete</a></td> -->
     
      
    
    </tr>
  

<?php } ?>
                                        </tbody>
                                            
                                            
                                            
                 
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
               
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
