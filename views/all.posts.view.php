<?php require_once "bootstrap.php";
$allPosts = $allPosts->allPosts();
foreach ($allPosts as $post)
$id = $post->id;
// $comments = $comment->allComments();
// var_dump($_SESSION['loggedUser']->id);
// var_dump($comments);
?>
<h5 class="display-4 text-center">All posts</h5>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
        <?php require_once "card.php" ?>
        </div>
    </div>
</div>

