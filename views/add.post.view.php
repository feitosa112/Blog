<?php 
require_once "bootstrap.php";
$categories=$category->allCategory();
?> 
<div class="container mt-4">
    <div class="row">
        <div class="col-2">
          
            <!-- Button trigger modal -->
       
       
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus" aria-hidden="true"></i> Add new post
            </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus" aria-hidden="true"></i> Add new post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_newPost.php" method="POST">
            <input type="text" name="new_post" placeholder="Add new post" class="form-control"><br>
            <select name="category" id="" class="form-control">
                <option value="11">Chose category</option>
                <?php foreach($categories as $cat):?>
                    <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                <?php endforeach ?>
            </select><br>
            <input type="text" name="tag" placeholder="Add tags" class="form-control"><br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="addNewPost" class="btn btn-primary">Add post</button>
            </div>
        </form>
        <?php if($post->post_inserted): ?>
          
          <?php header("Location: index.php") ?>
        <?php endif ?>

        
      </div>
      
    </div>
  </div>
</div>

            
        </div>
    </div>
</div>