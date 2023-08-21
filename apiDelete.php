<?php require_once "apiBootstrap.php";
$id = $_GET['id'];
$post->deletePost($id);
$_SESSION['deleted_msg'] = "Uspjesno ste obrisali post!";  
echo json_encode($_SESSION['deleted_msg']);

?>