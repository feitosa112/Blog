<?php require_once "partials/header.php" ?>
<!-- <?php phpinfo() ?> -->
<?php if(isset($_SESSION['loggedUser'])){
    require_once "views/add.post.view.php";
    
} ?>

<?php require_once "messages.php" ?>
<?php require_once "views/all.posts.view.php"; ?>



  