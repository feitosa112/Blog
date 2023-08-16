<?php require_once "bootstrap.php";
if(isset($_POST['addComment'])){
    
    $comment->addNewComment();
    $_SESSION['comment_added'] = "Uspjesno ste dodali komentar na post!";
    header("Location: index.php");
}
?>