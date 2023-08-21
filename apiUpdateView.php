<?php require_once "apiBootstrap.php";
$id = $_GET['id'];
$post = $post->updateView($id);
$categories=$category->allCategory();

echo json_encode($post);


?>