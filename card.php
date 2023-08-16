<?php $comments = $comment->allComments()?>
<?php foreach ($allPosts as $post): ?>
    <div class="card m-4" >

        <div class="card-header" style="background-color: #f5dc98;">
            <a href="user.php?id=<?php echo $post->user_id ?>" class="btn btn-info btn-sm float-left"><?php echo $post->userName ?></a>
            <a href="category.php?id=<?php echo $post->category_id ?>" class="badge badge-secondary btn-sm float-right"><?php echo $post->name ?></a>
        </div>

        <div class="card-body">
            <h5><?php echo $post->post ?></h5>
            <?php
             $tags = $post->tags;
             $tag = explode(',',$tags); 
             ?>
            <?php foreach ($tag as $t): ?>
                <a href="tags.php?tags=<?php echo $t ?>"><?php echo "#".$t ?></a>
            <?php endforeach ?>
            
        </div>

        <div class="card-footer">
            <?php if(isset($_SESSION['loggedUser']) && $post->user_id == $_SESSION['loggedUser']->id): ?>
                <a href="delete.php?id=<?php echo $post->id ?>" class="badge badge-danger btn-sm float-left">Delete</a>
                <a href="" class="badge badge-warning btn-sm float-right">Update</a>
            <?php endif ?><br><br>
                        
            <p>Comments:</p>
                        
            <?php foreach ($comments as $comment): ?>
                <?php if($comment->post_id == $post->id): ?>
                    <a href="user.php?id=<?php echo $comment->user_id ?>" class="badge badge-info"><?php echo $comment->name ?></a>
                    <p><small><i><?php echo $comment->created_at ?></i></small></p>
                    <p><?php echo $comment->comment ?></p>
                <?php endif ?>
            <?php endforeach ?>
        </div>


        <div class="card-postfooter">
            <?php if(isset($_SESSION['loggedUser']) && $post->user_id != $_SESSION['loggedUser']->id): ?>
                <form action="add_comment.php" method="POST">
                    <input type="text" name="comment" placeholder="Input comment" class="form-control">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['loggedUser']->id ?>">
                    <input type="hidden" name="post_id" value="<?php echo $post->id ?>">
                    <button type="submit" name="addComment" class="btn btn-primary btn-sm float-right">Add comment</button>
                </form>
            <?php endif ?>
        </div>


</div><br>
<?php endforeach ?>
    