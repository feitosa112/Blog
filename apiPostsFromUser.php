<?php require_once "apiBootstrap.php";
$id = $_GET['id'];
$allPosts = $post->postsFromUserId($id);
echo json_encode($allPosts);

?>