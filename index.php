<?php require_once "partials/header.php" ?>

<?php if(isset($_SESSION['loggedUser'])){
    require_once "views/add.post.view.php";
    
} ?>

<?php if(isset($_SESSION['flash_message'])) :?>

    <div class="alert alert-success" role="alert">
    
    <?php echo $_SESSION['flash_message'] ?>

    </div>
    <?php unset($_SESSION['flash_message']) ?>

<?php endif ?>
<?php if(isset($_SESSION['comment_added'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['comment_added'] ?>
    </div>
    <?php unset($_SESSION['comment_added']) ?>
<?php endif ?>

<?php if(isset($_SESSION['deleted_msg'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['deleted_msg'] ?>
    </div>
    <?php unset($_SESSION['deleted_msg']) ?>

<?php endif ?>
<?php require_once "views/all.posts.view.php"; ?>



  