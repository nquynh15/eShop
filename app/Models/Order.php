<?php 

require_once('app/Models/Model.php');

class Order extends Model
{
    protected $table = "oder";

    protected $id = "order_id";

    protected $fillable = ['order_id', 'name', 'phone_number','address_street' ,'address',  'subtotal',
    'payment','users_id'];
    public function countOrder(){
        
        $sql ="SELECT * from oder";
        return $this->getAll($sql);
    }
    public function sumPrice(){
        
        $sql ="SELECT SUM(subtotal) as price from oder";
        return $this->getAll($sql);
    }
    public function search($name){
        $sql ="SELECT *FROM oder WHERE name LIKE '%$name'";
        return $this->getAll($sql);
    }
    public function list($start,$limit){
        $sql ="SELECT * FROM oder limit $start, $limit";
        return $this->getAll($sql);
    }

}