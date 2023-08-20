<?php 
class Post extends QueryBuilder {
    public $post_inserted = NULL;
    public $post_updated = NULL;
    public $postInput = NULL;

    public function addNewPost(){
        $post = $_POST['new_post'];
        $tags = $_POST['tag'];

        $category = $_POST['category'];
        $user = $_SESSION['loggedUser']->id;

        if($post == null){
            $this->postInput = true;
        }else{

        $sql = "INSERT INTO posts VALUES(NULL,?,?,?,?,NOW())";
        $query = $this->db->prepare($sql);
        $query->execute([$post,$category,$user,$tags]);
        $this->post_inserted = true;
    }

    }

    public function allPosts(){
        
        $sql = "SELECT posts.id,posts.post,posts.category_id,posts.user_id,posts.tags,posts.created_at,categories.name,users.userName FROM posts INNER JOIN categories ON posts.category_id=categories.id INNER JOIN users ON posts.user_id=users.id";
        $query1 = $this->db->prepare($sql);
        $query1->execute();
        $result = $query1->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function postsFromUserId($id){
        $sql = "SELECT posts.id,posts.post,posts.category_id,posts.user_id,posts.tags,posts.created_at,categories.name,users.userName FROM posts INNER JOIN categories ON posts.category_id=categories.id INNER JOIN users ON posts.user_id=users.id  WHERE posts.user_id=? ";
        $query1 = $this->db->prepare($sql);
        $query1->execute([$id]);
        $result = $query1->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

   public function categoryFromId($id){
    
    $sql = "SELECT posts.id,posts.post,posts.category_id,posts.user_id,posts.tags,posts.created_at,categories.name,users.userName FROM posts INNER JOIN categories ON posts.category_id=categories.id INNER JOIN users ON posts.user_id=users.id  WHERE posts.category_id=? ";
    $query1 = $this->db->prepare($sql);
    $query1->execute([$id]);
    $result = $query1->fetchAll(PDO::FETCH_OBJ);
    return $result;
   }

   public function deletePost($id){
    $sql = "DELETE FROM posts WHERE id=?";
    $query1 = $this->db->prepare($sql);
    $query1->execute([$id]);
    
   }

   public function tags($str){
    $sql = "SELECT posts.id,posts.post,posts.category_id,posts.user_id,posts.tags,posts.created_at,categories.name,users.userName FROM posts INNER JOIN categories ON posts.category_id=categories.id INNER JOIN users ON posts.user_id=users.id  WHERE LOWER(tags) LIKE '%$str%'";
    $query1 = $this->db->prepare($sql);
    $query1->execute();
    $result = $query1->fetchAll(PDO::FETCH_OBJ);
    return $result;
   }

   public function updateView($id){
    $sql = "SELECT * FROM posts WHERE id = ?";
    $query1 = $this->db->prepare($sql);
    $query1->execute([$id]);
    $result = $query1->fetchAll(PDO::FETCH_OBJ);
    return $result;

   }

   public function update(){
    $id = $_POST['id'];
    $post = $_POST['post'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $user_id = $_SESSION['loggedUser']->id;

    $sql = "UPDATE posts SET post='$post',category_id='$category',user_id='$user_id',tags='$tags',created_at=NOW() WHERE id=$id";
    $query1 = $this->db->prepare($sql);
    $query1->execute();
    $this->post_updated=true;
    
   }

   
}
?>