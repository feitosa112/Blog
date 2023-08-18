<?php require_once "bootstrap.php" ?>

<?php 
$id = $_GET['id'];
$allPosts = $post->categoryFromId($id);
foreach ($allPosts as $post);

$id = $post->id;
$comments = $comment->allComments($id);
// var_dump($allPosts);

?>

<div class="jumbotron text-center">
    <h5 class="display-4">Category <?php echo $allPosts[0]->name ?></h5>
</div>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <?php require_once "card.php" ?>
        </div>
    </div>
</div>