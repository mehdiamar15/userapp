<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("../dist/php/mysqlmo.php");
require_once("../dist/php/process.php");
require_once ("../dist/php/user_class.php");
require_once ("ticket_class.php");
require_once ("tkprocess.php");
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
        <link href="../dist/css/styles.css" rel="stylesheet" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <!--  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
      
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">New Ticket</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Open New Ticket</li>
                        </ol>
                        
 

                        
                        
                        <div  class="card mb-4">
                            <div  class="card-body">
                            
                            
                               </div>
                        </div>
                    <!-- -----------------------newticket----------------------------- -->

                        

<form action="tkprocess.php" method="POST">

<div style="height: 100vh;" class="card-header">
<div class="form-group" >
  <label for="exampleInputPassword1">Priority :</label>
  <select name="priority" class="form-control">
  <option value="" selected>* Choose Priority * </option>
  <option value="low">Low</option>
  <option value="mùedium">Medium</option>
    <option value="high">High</option>
    <option value="urgent">Urgent</option>
    
     </select>
 </div>



  <label for="exampleInputPassword1">Category :</label>
  <select name="category" class="form-control">
  <option value="" selected>* Choose Category * </option>
  <option value="Paid Leave">General Enquire</option>
    <option value="Sick Leave">Bugs&Issues</option>
    <option value="National Holidays">Server Support</option>
    <option value="Religious Holidays">Statistics</option>
     </select></br>
 
 
<label for="exampleInputEmail1">Subject :</label> <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></br>
<!--........ -->
					
					
   <label for="exampleInputEmail1">Message :</label> <textarea name="message" type="text" id="summernote" placeholder="enter your message"></textarea></br>				
<!--........ -->

	<button type="submit" name="newticket" class="btn btn-primary">New Ticket</button>		



</div>
      </form>                   
                        
                        <!-- -----------------------end newticket----------------------------- -->
                         
                        
                        

                        
                        
                        
                    </div>
                </main>
               
            </div>
        </div>
<?php require_once ("../dist/layout/layoutSidenav.php");?>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
      <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --> 
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="../dist/assets/demo/datatables-demo.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
	    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
        
        
        
        
        
        
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
<script>
$('#summernote').summernote({
	toolbar: [
		  ['style', ['style']],
		  ['font', ['bold', 'underline', 'clear']],
		  ['fontname', ['fontname']],
		  ['color', ['color']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['table', ['table']],
		  ['insert', ['link', 'picture', 'video']],
		  ['view', ['fullscreen', 'codeview', 'help']],
		],
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
