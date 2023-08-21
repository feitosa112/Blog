<?php require_once "apiBootstrap.php";
$str = $_GET['tags']; 
$allPosts = $post->tags($str);
echo json_encode($allPosts);

?>