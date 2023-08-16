<?php require_once "bootstrap.php" ?>
<?php require_once "partials/header.php" ?>
<?php
$str = $_GET['tags']; 
$allPosts = $post->tags($str);

?>
<div class="jumbotron text-center">
    <h5 class="display-4">Tag <?php echo $str ?></h5>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <?php require_once "card.php" ?>
        </div>
    </div>
</div>