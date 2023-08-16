<?php 

class Category extends QueryBuilder{

    public function allCategory(){


        $sql = "SELECT * FROM categories";
        $query1 = $this->db->prepare($sql);
        $query1->execute();
        $result = $query1->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}

?>