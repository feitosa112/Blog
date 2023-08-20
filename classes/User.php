<?php 
class User extends QueryBuilder {
    public $register_result = NULL;
    public $userExist = NULL;
    public $loggedUser = NULL;
    public $registerError = NULL;




    public function registerUser(){
        $name = $_POST['register_name'];
        $surname = $_POST['register_surname'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $username=$_POST['register_username'];
        
        if($name == null || $surname == null || $email==null || $password == null || $username == null ){
            $this->registerError = true;
        }else{
            
        

        $sql1 = "SELECT * FROM users WHERE email=?";
        $query1 = $this->db->prepare($sql1);
        $query1->execute([$email]);
        $result = $query1->fetch(PDO::FETCH_OBJ);

        if($result==false){
            $sql = "INSERT INTO users VALUES (NULL,?,?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$surname,$username,$email,SHA1($password)]);
            $this->register_result = true;
        }else{
            $this->userExist = true;   

        }

    }
        
   
    } 

    public function logUser(){
        
        $email=$_POST['login_email'];
        $password = $_POST['login_password'];

        $sql = "SELECT * FROM users WHERE email=? AND password=?";
        $query = $this->db->prepare($sql);
        $query->execute([$email,SHA1($password)]);
        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if($loggedUser){
            $_SESSION['loggedUser']=$loggedUser;
            $this->loggedUser = $loggedUser;
            
        }
    }

    public function allUsers(){
        $sql = "SELECT * FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
?>