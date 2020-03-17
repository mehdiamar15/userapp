

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once ("mysqlmo.php");



class User
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
    
    public function set_users($user_name,$email,$password,$status,$nmbr_jrs_conge,$role_id,$tl) {
        
        return $this->conn->query("INSERT INTO user_account (user_name,email,password,status,nmbr_jrs_conge,role_id,idAdmin) values('$user_name','$email','$password','$status','$nmbr_jrs_conge','$role_id','$tl')")->fetchAll();
    }
    
    public function delete($id_del) {
        
        return $this->conn->query("delete from user_account where id_user='$id_del'");
    }
    
    public function edit($user_name,$email,$password,$status,$nmbr_jrs_conge,$role_id,$id_user,$tl) {
        
        return $this->conn->query("UPDATE user_account SET user_name = '$user_name', email= '$email', password ='$password',status='$status',nmbr_jrs_conge='$nmbr_jrs_conge',role_id = '$role_id', idAdmin='$tl' WHERE id_user = '$id_user'");
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