

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once ("../dist/php/mysqlmo.php");



class ticket
{
    /* Properties */
    private $conn;
    
    /* Get database access */
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }
    
    /* List all users */
    public function get_users($que) {
        return $this->conn->query("SELECT user_account.* , role.role_name  FROM user_account INNER JOIN role ON id = role_id $que ")->fetchAll();
    }
    
    public function insert_ticket($subject,$priority,$category,$message,$id_Submitted_By) {
        
        return $this->conn->query("INSERT INTO tickets (subject,priority,status,category,entered,message,id_Submitted_By) values ('$subject','$priority','new','$category',CURRENT_TIMESTAMP(),'$message','$id_Submitted_By')");
    }
    
   
    public function have_permission($id_user, $id_task){
        
        $query = "select * from tasks_users where user_id = $id_user and task_id = $id_task ";
        
        
        
        $statement = $this->conn->query($query);
        
        $usetasks = $statement->fetch(); 
        
        if($usetasks == 0){
            
            return false;
            
        }else{
            
            return true;
        }
        // executi had query w chof chni rj3at , ida rj3at 1 row ya3ni 3ando permission , ida rj3at 0 rows ya3ni no
    }
    public function get_leaves($lv) {
        return $this->conn->query("SELECT Leaves.* , user_account.id_user , user_account.user_name FROM Leaves INNER JOIN user_account ON id_user = user_account_id $lv")->fetchAll();
    }
}


?>