
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require("mysqlcnct.php");
require_once ("../dist/php/mysqlmo.php");
require_once ("../dist/php/user_class.php");
require_once ("ticket_class.php");
//require_once ("users.php");
if(!isset($_SESSION))
{
    session_start();
} 


    $ticket = new ticket($pdo);
    if(isset($_POST['newticket']))
    {
        $subject = $_POST['subject'];
        $priority = $_POST['priority'];
        $category = $_POST['category'];
        $message = $_POST['message'];
        $id_Submitted_By = $_SESSION["iduser"];
        if(empty($_POST['subject']) || empty($_POST['priority']) || empty($_POST['category']) || empty($_POST['message'])  )
        {
            header("location:newticket.php?Empty= Please Fill in the Blanks");
        }
        else
        {
        $html = '<img id="12" border="0" src="/images/image.jpg"
         alt="Image" width="100" height="100" />';
        
        $doc = new DOMDocument();
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        $base64_string = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
      //  echo $base64_string;
       
        $ifp = fopen( 'mehdi.txt', 'w' );
        
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[1] ) );
        
        // clean up the file resource
        fclose( $ifp ); 
        //$addtk = $ticket->insert_ticket($subject,$priority,$category,$message,$id_Submitted_By);
       // header("location:../users.php");
        //}
    }
    
    
    }
    //***********************************edite user*********************************************************

    
    


?>