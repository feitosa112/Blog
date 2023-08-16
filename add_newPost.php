<?php 
require_once "bootstrap.php";
if(isset($_POST['addNewPost'])){
    $post->addNewPost();
    $_SESSION['flash_message'] = "Uspjesno ste dodali post!";
    header("Location: index.php");
}
?>