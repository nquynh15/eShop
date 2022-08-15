<?php 

require_once('app/Models/Model.php');

class Comment extends Model
{
    protected $table = "comment";

    protected $id = "comment_id";

    protected $fillable = ['comment_id', 'content', 'products_id','users_id','users_name'];
    public function countComment($id){
        $sql ="SELECT * from comment where products_id='$id'";
        return $this->getAll($sql);
    }
    public function viewAll($id){
        $sql="SELECT * from comment where products_id='$id'";
        return $this->getAll($sql);
    }
    

}