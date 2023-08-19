<h4 class="display-4 text-center">All posts</h4>
<?php require_once "bootstrap.php";
$allPosts1 = $allPosts->allPosts();
$num_posts = count($allPosts1);
$num_posts_per_page = 3;
$total_page = ceil($num_posts/$num_posts_per_page);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$firstIndex = ($current_page-1)*$num_posts_per_page;

$sql = "SELECT posts.id,posts.post,posts.category_id,posts.user_id,posts.tags,posts.created_at,categories.name,users.userName FROM posts INNER JOIN categories ON posts.category_id=categories.id INNER JOIN users ON posts.user_id=users.id ORDER BY created_at DESC LIMIT $firstIndex, $num_posts_per_page";
$query1 = $db->prepare($sql);
$query1->execute();
$allPosts = $query1->fetchAll(PDO::FETCH_OBJ);

if(count($allPosts)>0){
    require_once "container.php";
}
?>
<?php if($total_page >1): ?>
    <?php if($current_page>1): ?>
        <div class="text-center">
        <a href="?page=<?php echo $current_page-1 ?>"class="btn btn-primary text-center mb-4"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back(3)</a>
        </div>
    <?php endif ?>
    <?php if($current_page<$total_page): ?>       
        <div class="text-center">
        <a href="?page=<?php echo $current_page+1 ?>"class="btn btn-primary text-center">Next(3) <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div>
    <?php endif ?>
<?php endif ?>
