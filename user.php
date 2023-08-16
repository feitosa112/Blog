<?php require_once "bootstrap.php" ?>
<?php require_once "partials/header.php" ?>
<?php 
$id = $_GET['id'];
$allPosts = $post->postsFromUserId($id);
$users = $user->allUsers();

$comments = $comment->allComments();

// var_dump($comments);
?>





    <?php if(isset($_SESSION['loggedUser'])): ?>
        <div class="jumbotron text-center">
            <?php for ($i=0; $i < count($users) ; $i++):?>
                <?php if($users[$i]->id == $_GET['id']): ?>
                    <h4 class="display-4">
                        <?php echo $users[$i]->name . ' ' .$users[$i]->surname ?>
                    </h4>
                    <p>UserName:<b><?php echo $users[$i]->userName ?></b></p>
                <?php endif ?>
            <?php endfor ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <?php require_once "card.php" ?>
                </div>
            </div>
        </div>
 
        <?php else: ?>
        <?php header('Location: index.php') ?>

        <?php endif ?>
   