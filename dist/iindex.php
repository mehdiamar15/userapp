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
				<h1 class="mt-4">Users List</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
					<li class="breadcrumb-item active">List Users</li>
				</ol>




				<div class="card mb-4">
					<div class="card-body">
                            
                            
          <?php
    
    if (isset($_GET['result'])) {
        ?>
      <div class="alert alert-success"><?php echo $_GET['result']; ?>   </div>
     <?php }?>                            </div>
				</div>
				<!-- -----------------------users----------------------------- -->
				<!-- Button trigger modal -->


				<!--------------------------- Modal add user-------------------------------->
				<div class="modal fade" id="addusermodal" tabindex="-1"
					role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">add User</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>


							<form action="php/process.php" method="POST">
								<div class="modal-body">

									<div class="form-group">
										<label for="exampleInputEmail1">User Name</label> <input
											type="text" name="user_name" class="form-control"
											id="exampleInputEmail1" aria-describedby="emailHelp">
									</div>



									<div class="form-group">
										<label for="exampleInputEmail1">Email</label> <input
											type="email" name="email" class="form-control"
											id="exampleInputEmail1" aria-describedby="emailHelp">
									</div>

									<div class="form-group">
										<label for="exampleInputPassword1">Password</label> <input
											type="password" class="form-control" name="password"
											id="exampleInputPassword1">
									</div>
  
  <?php $qry = "select * from user_account where role_id IN (1,2) "?>
       <?php  $ment = $pdo->query($qry)->fetchAll(); ?>
         
  <div class="form-group">
										<label for="exampleInputPassword1">chef de group</label> <select
											name="tl" class="form-control">
  <?php foreach($ment as $m) { ?>
    <option value="<?php echo $m['id_user'] ?>"><?php echo $m['user_name'] ?></option>
    <?php } ?>
     </select>
									</div>




									<div class="form-group">
										<label for="exampleInputPassword1">Role</label> <select
											name="role" class="form-control">
											<option value="1">superadmin</option>
											<option value="2">admin</option>
											<option value="3">team leader</option>
											<option value="4">user</option>
										</select>
									</div>


									<div class="form-group">
										<label for="exampleInputPassword1">Status</label> <select
											name="stat" class="form-control">
											<option value="1">active</option>
											<option value="0">inactive</option>
										</select>
									</div>


									<div class="form-group">
										<label for="exampleInputPassword1">Jours Conge</label> <input
											type="number" name="nmbr_jrs_conge" value="0" min="0"
											max="200" step="1" />
									</div>


								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Close</button>
									<button type="submit" name="save" class="btn btn-primary">save
										User</button>
								</div>
							</form>





						</div>
					</div>
				</div>
				<!--------------------------- Modal DELETE user-------------------------------->
				<div class="modal fade" id="deleteuserrmodal" tabindex="-1"
					role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>


							<form action="php/process.php" method="POST">
								<div class="modal-body">

									<h4>Do you want to delete ?</h4>
									<input type="hidden" id="iduser" name="iduser">


								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">No</button>
									<button type="submit" name="deleteit" class="btn btn-primary">Yes,
										Delete it!</button>
								</div>
							</form>





						</div>
					</div>
				</div>




				<!--------------- Modal EDIT user--------------------------->

				<div class="modal fade" id="editeuserrmodal" tabindex="-1"
					role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>


							<form action="php/process.php" method="POST">
								<div class="modal-body">


									<input id="iduser2" name="iduser2">
									<div class="form-group">
										<label for="exampleInputEmail1">User Name</label> <input
											type="text" id="user_name" name="user_name"
											class="form-control" id="exampleInputEmail1"
											aria-describedby="emailHelp">
									</div>



									<div class="form-group">
										<label for="exampleInputEmail1">Email</label> <input
											type="email" id="email" name="email" class="form-control"
											id="exampleInputEmail1" aria-describedby="emailHelp">
									</div>

									<div class="form-group">
										<label for="exampleInputPassword1">Password</label> <input
											type="password" class="form-control" id="password"
											name="password" id="exampleInputPassword1">
									</div>




									<div class="form-group">
										<label for="exampleInputPassword1">Role</label> <select
											id="role2" name="role2" class="form-control">
											<option value="1">superadmin</option>
											<option value="2">admin</option>
											<option value="3">team leader</option>
											<option value="4">user</option>
										</select>
									</div>
 
 <?php $qry = "select * from user_account where role_id IN (1,2) "?>
       <?php  $ment = $pdo->query($qry)->fetchAll(); ?>
         
  <div class="form-group">
										<label for="exampleInputPassword1">chef de group</label> <select
											id="tledite" name="tledite" class="form-control">
  <?php foreach($ment as $m) { ?>
    <option value="<?php echo $m['id_user'] ?>"><?php echo $m['user_name'] ?><?php echo $m['id_user'] ?></option>
    <?php } ?>
     </select>
									</div>

									<div class="form-group">
										<label for="exampleInputPassword1">Status</label> <select
											id="stat2" name="stat2" class="form-control">
											<option value="1">active</option>
											<option value="0">inactive</option>
										</select>
									</div>


									<div class="form-group">
										<label for="exampleInputPassword1">Jours Conge</label> <input
											type="number" id="nmbr_jrs_conge" name="nmbr_jrs_conge"
											value="0" min="0" max="200" step="1" />
									</div>


								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">close</button>
									<button type="submit" name="savechange" class="btn btn-primary">
										Save Changes</button>
								</div>
							</form>





						</div>
					</div>
				</div>



				<!-- buton add -->
       
      <?php $havepermission = $user->have_permission($idus,'1');  if ($havepermission) : ?>
         
                         <div class="card-body">
					<button type="button" class="btn btn-primary" data-toggle="modal"
						data-target="#addusermodal">Add User</button>
				</div>
               <?php endif ?>
               
     
        <!----------------show table ------------------------ -->
				<div class="card-header">
					<i class="fas fa-table mr-1"></i>Users List
				</div>
				<table class="table table-bordered" id="dataTable" width="100%"
					cellspacing="0">

					<thead>
						<tr>
							<th hidden>id_user</th>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
							<th>Team leader</th>
							<th>action</th>



						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>id_user</th>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
							<th>Team leader</th>
							<th>action</th>

						</tr>
					</tfoot>



					<tbody>











						<!--  aa = "where id role = 5";    -->                           
                                       
                                         <?php
    
    $qu = "";
    $idus = $_SESSION["iduser"];
    if ($_SESSION['Roles'] != 'superadmin') {
        $qu = "where idAdmin = $idus";
    }
    $user = new User($pdo);
    $list = $user->get_users($qu);
    
    ?>
<?php foreach($list as $row) { ?>

    <tr>
							<td><?php echo $row['id_user'] ?></td>
							<td><?php echo $row['user_name'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['password'] ?></td>
							<td><?php
        if ($row['status'] == 1) {
            echo "Active";
        } else {
            echo "Inactive";
        }
        
        ?></td>
							<td><?php echo $row['nmbr_jrs_conge'] ?></td>
							<td><?php echo $row['role_name'] ?></td>
							<!--   <td><a  href="users.php?id=<?php echo $row['id_user']; ?>">Delete</a></td> -->
       
      <?php $qry = "select * from user_account where id_user='".$row['idAdmin']."' "?>
       <?php  $ment = $pdo->query($qry); $ad = $ment->fetch();?>
       

     <td><?php echo $ad['user_name'] ?><?php echo $row['idAdmin'] ?></td>
							<td>
								<div class="card-body">
                       
                    <?php $havepermissiondelete = $user->have_permission($idus,'3');  if ($havepermissiondelete) : ?> <button
										type="button" class="btn btn-danger deletbtn"
										data-toggle="modal" data-target="#deleteuserrmodal">delete</button><?php endif ?>
                     <?php $havepermissionedite = $user->have_permission($idus,'2');  if ($havepermissionedite) : ?><button
										type="button" class="btn btn-info editbtn" data-toggle="modal"
										data-target="#editeuserrmodal">
										edit</i>
									</button><?php endif ?>

               </div>


							</td>


						</tr>
  

<?php } ?>
                                        </tbody>





				</table>









				<!-- -----------------------end users----------------------------- -->
				<div style="height: 100vh;"></div>





				<div class="card mb-4">
					<div class="card-body">When scrolling, the navigation stays at the
						top of the page. This is the end of the static navigation demo.</div>
				</div>
			</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div
						class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2019</div>
						<div>
							<a href="#">Privacy Policy</a> &middot; <a href="#">Terms &amp;
								Conditions</a>
						</div>
					</div>
				</div>
			</footer>
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
	// deletebtn
        $(document).ready(function (){
            console.log('am tr',document);
            
                	$("#dataTable").on("click", ".deletbtn", function(){
                $('#deleteuserrmodal').modal('show');
        
                 tr = $(this).closest('tr');
                 console.log('am tr',tr);
                 var data = tr.children("td").map(function() {
                     return $(this).text();
        
               }).get();
                 
               console.log('am data',data);
        
                 $('#iduser').val(data[0]);
                
        
                	
                });

//------------------------------------------------

                	
 
               // editbtn

            console.log('am tr',document);
            
                	$("#dataTable").on("click", ".editbtn", function(){
                $('#editeuserrmodal').modal('show');
               
                 tr = $(this).closest('tr');
                 console.log('ana howa tr',tr);
                 var data = tr.children("td").map(function() {
                     return $(this).text();
        
               }).get();
                 
               console.log('am data',data);


				const status = data[4] === 'Active' ? 1 : 0   
						$("#iduser2").val('');  
            $('#iduser2').val(data[0]);
				console.log('the id  is',data[1]);
            $('#user_name').val(data[1]);
            $('#email').val(data[2]);
            $('#password').val(data[3]);
            $('#stat2').val(status);
            $('#nmbr_jrs_conge').val(data[5]);
           // $('#role2').val(data[6]);
           
            $("#role2 option").filter(function() {
              //may want to use $.trim in here
              return $(this).text() == data[6];
            }).attr('selected', true);

            $("#tledite option").removeAttr('selected');
            $("#tledite option").filter(function() {
                //may want to use $.trim in here
                return $(this).text() == data[7];
              }).attr('selected', true);
            

            
           

             
            console.log('am data',data);
            
                 //$('#role2 option[value="+data[4]+"]').prop("selcted",true); 
                 //$('#stat option[value="+data[5]+"]').prop("selcted",true); 

                });

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
