<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("php/mysqlmo.php");
require_once("php/process.php");
require_once ("php/user_class.php");
$user = new User($pdo);
$idus = $_SESSION["iduser"];
echo $idus;
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
        <title>User App </title>
        
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        
            <a class="navbar-brand" href="index.php">Users App</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <strong style="color: #888;"><?php echo $_SESSION['User']; ?></strong>&nbsp;
					<strong style="color: #888;"><?php echo $_SESSION['Roles']; ?></strong>&nbsp;
					<strong style="color: #888;"><?php echo $idus; ?></strong>
					 
            <!-- Navbar Search-->
            
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            
                <div class="input-group">
               
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                    
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                
            </form>
                    <?php require_once ("notification.php");?>    
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php?logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                             
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="users.php">List Users</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Permissions
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Gestion Permissions
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="permission.php">Gestion Permissions</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <!--   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error -->
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href=""
                                ><!-- <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts></a>-->
                            <a class="nav-link" href="tables.html">
                             <!--<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>-->
                              <!--  Tables--></a> 
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Leaves  List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Users</li>
                        </ol>
                        
                        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                        
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
                        
                        
                             ...</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>
                        
                        
                        <!-- -----------------------end users----------------------------- -->
                         
                        <div style="height: 100vh;"></div>
                        

                        
                        
                        
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> 
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
      <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --> 
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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
               
 
        </script>
       

<script>



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

