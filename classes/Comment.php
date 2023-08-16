<?php 
class Comment extends QueryBuilder {
    

    public function addNewComment(){
        $comment = $_POST['comment'];
        $user_id = $_POST['user_id'];
        
        $post_id = $_POST['post_id'];
        $status = 1;

        $sql = "INSERT INTO comments VALUES(NULL,?,?,?,NOW(),?)";
        $query = $this->db->prepare($sql);
        $query->execute([$comment,$post_id,$user_id,$status]);
        
    }

    public function allComments(){
        $sql = "SELECT comments.comment,comments.created_at,comments.post_id,comments.user_id,users.name,posts.id FROM comments INNER JOIN posts ON comments.post_id = posts.id INNER JOIN users ON comments.user_id = users.id";
        $query1 = $this->db->prepare($sql);
        $query1->execute();
        $result = $query1->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }
}
?>