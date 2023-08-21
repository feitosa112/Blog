<?php require_once "apiBootstrap.php" ;
$allPosts = $allPosts->allPosts();
echo json_encode($allPosts);
?>