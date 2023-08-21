<?php 
var_dump($_POST);
exit();
require_once "bootstrap.php";
if(isset($_POST['addNewPost'])){
    $post->addNewPost();
    if($post->post_inserted){
        $_SESSION['flash_message'] = "Uspjesno ste dodali post!";

        header("Location: index.php");
    }
    
}else{
    echo "Morate unijeti text posta";
}
?>
<?php if($post->postInput): ?>
    <?php $_SESSION['postInput'] = "Neuspjesan unos!Morate popuniti polje 'Add new post'" ?>
    <?php header("Location: index.php") ?>
    <?php endif ?>
