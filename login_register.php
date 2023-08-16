<?php require_once "bootstrap.php" ?>
<?php 
if(isset($_POST['registerBtn'])){
    $user->registerUser();
}


if(isset($_POST['loginBtn'])){
    $user->logUser();
}
?>
<?php require_once "views/login.register.view.php" ?>