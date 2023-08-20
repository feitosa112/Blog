<?php 
class User extends QueryBuilder {
    public $register_result = NULL;
    public $userExist = NULL;
    public $loggedUser = NULL;
    public $registerError = NULL;
    public $name;
    public $surname;
    public $email;
    public $username;
    



    public function registerUser(){
        $this->name = $_POST['register_name'];
        $this->surname = $_POST['register_surname'];
        $this->email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $this->username=$_POST['register_username'];

        
        if($this->name == null || $this->surname == null || $this->email==null || $password == null || $this->username == null ){
            $this->registerError = true;
        }else{
            
        

        $sql1 = "SELECT * FROM users WHERE email=?";
        $query1 = $this->db->prepare($sql1);
        $query1->execute([$this->email]);
        $result = $query1->fetch(PDO::FETCH_OBJ);

        if($result==false){
            $sql = "INSERT INTO users VALUES (NULL,?,?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$this->name,$this->surname,$this->username,$this->email,SHA1($password)]);
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