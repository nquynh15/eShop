<?php 
require_once('./core/Database.php');
require_once('app/Models/Model.php');

class User extends Model
{
    protected $table = "users";
    

    protected $id = 'users_id';

   
    protected $fillable = ['users_id','email','name','password'];
    public function countUser(){
        $sql ="SELECT * from users";
        return $this->getAll($sql);
    }
    
    public function update($password,$email){
        
        $password=md5($password);
        $sql="UPDATE users SET password= '$password' WHERE email='$email'";
        return $this->getConnect($sql);
    }
    public function listPay($users_id,$start,$limit){
        $sql ="SELECT oder.name, order_detail.product_name, order_detail.quantity,oder.subtotal, oder.payment from oder INNER JOIN order_detail on oder.order_id=order_detail.order_id WHERE oder.users_id='$users_id' limit $start, $limit";
        
        return $this->getAll($sql);
    }
    public function list($users_id){
        $sql ="SELECT oder.name, order_detail.product_name, order_detail.quantity,oder.subtotal, oder.payment from oder INNER JOIN order_detail on oder.order_id=order_detail.order_id WHERE oder.users_id='$users_id' ";
        
        return $this->getAll($sql);
    }

}



    

