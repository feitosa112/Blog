<?php require_once "bootstrap.php" ?>
<?php 
$id = $_GET['id'];
$post = $post->updateView($id);
$categories=$category->allCategory();
// var_dump($post);

// var_dump($post);
?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <h4 class="display-4">Update post</h4>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $post[0]->id ?>">
                <input type="text" name="post" value="<?php echo $post[0]->post ?>" class="form-control" ><br>
                <select name="category" id="" class="form-control">
                    <option value="<?php echo $post[0]->category_id ?>">Choose category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                    <?php endforeach ?>
                </select><br>
                <input type="text" name="tags" value="<?php echo $post[0]->tags ?>" class="form-control"><br>
                <button type="submit" name="updateBtn" class="btn btn-warning form-control">Update</button>
            </form>
            
        </div>
    </div>
</div>