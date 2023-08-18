<?php require_once "bootstrap.php" ?>
<?php 
if(isset($_POST['updateBtn'])){
    $post->update();
    
    $_SESSION['update'] = "Uspjesno ste editovali svoj post!";
    header("Location: index.php");
    
    
}
?>