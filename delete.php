<?php require_once "bootstrap.php" ?>

<?php 
$id = $_GET['id'];
if(isset($_GET['id'])){
    $post->deletePost($id);

    $_SESSION['deleted_msg'] = "Uspjesno ste obrisali post!";
    header("Location: index.php");

}
 ?>