<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require("mysqlcnct.php");
require_once ("php/mysqlmo.php");
require_once ("php/user_class.php");
//require_once ("users.php");
$user = new User($pdo);
$qu = "";
$list = $user->get_users($qu);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Users App </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
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
                                        >Gestion Permission
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="permission.php">Permissons</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div>
                           <!--  <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            >--> 
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
                        <h1 class="mt-4">Permissions -Tasks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Permission  -Tasks</li>
                        </ol>
                        
                        <form action ="permission.php" method ="post">
                        <div class="card mb-4" style="max-width:300px;"> 
                        
                        <select class="browser-default custom-select" multiple  name ="iduser[]">
<?php foreach($list as $box) { ?>
  <option name ="iduser" value="<?php echo $box['id_user'] ?>"><?php echo $box['id_user'] ?>  <?php echo $box['user_name'] ?></option>
 
  <?php } ?>
</select> 


                        
                        </div>
                        <div style="max-width:150px;" class="card mb-4" ><input name="addtask"  class="btn btn-primary" type="submit" value="Add tasks"></div>
                        <div style="max-width:150px;" class="card mb-4" ><input name="deltask"  class="btn btn-danger" type="submit" value="Delete tasks"></div>
                        
     
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Tasks </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  width="100%" cellspacing="0">
                                        <tfoot>
                                            <tr>
                                                
                                           
                                             
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                                           <?php 

$query="select * from tasks";
$tasks = $pdo->query($query);


//$tas = $tasks->fetch();
// $uselogin['id_user'];
//var_dump($tas['task_id']);
//var_dump($tas['task_name']);

$count = 0;
?>
          <tr>                               
                                        <?php foreach($tasks as $row) { $count++; ?>

 
 
 
 <td><input type="checkbox" name="tasks[]" value="<?php echo $row['task_id'] ?>"  >
  <label for="vehicle1"> <?php echo $row['task_name'] ?></label><br></td>
 
  <?php
if($count == 5) { // three items in a row
    echo $count;
    echo "</td></tr><tr>";
        
        $count = 0;
        
    }
 ?>
  
  <?php } ?>
  
  </tr>
  
  
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </form>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
      
        <script type="text/javascript">
        $(document).ready(function() {
        	$('.mdb-select').materialSelect();
        	});

        </script>
    </body>
</html>

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
    if(isset($_POST['deltask']))
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
            $query="delete from tasks_users where task_id = '$checkBox[$i]' and user_id = '$us';";
            $addtask = $pdo->query($query);
            
        }
        }
        echo "deleted";
        
        
        
        
        
        
        //}
    }
    
    ?>
