<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = 'products';

    protected $id = 'products_id';

    protected $fillable = ['products_id','name','slug','images','description','size','color','price','quantity','addtional_information','categories_id'];

    public function formatPrice() 
    {
        return number_format($this->price,0,'.', ',');
    }

    public function getLatestProducts($limit = 3) 
    {
        $sql = "SELECT * FROM products LIMIT $limit";
        return $this->getAll($sql);
    }

    public function getToprateProducts($limit = 3) 
    {
        $sql = "SELECT * FROM products ORDER BY rate DESC LIMIT $limit";
        
        return $this->getAll($sql);
    }

    public function image()
    {
        $sql = "SELECT * FROM products WHERE products_id = {$this->id}";
        return $this->getFirst($sql)->get();
    }

    public function getProductsByIds($itemIds)
    {
        $sql = "SELECT * FROM products WHERE products_id IN ($itemIds)";
       
        
        return $this->getAll($sql)->get();
    }
    public function search($name){
        $sql ="SELECT *FROM products WHERE name LIKE '%$name'";
        return $this->getAll($sql);
    }
    public function countProduct(){
    
        $sql ="SELECT * from products";
        return $this->getAll($sql);
    }
    public function list($start,$limit){
        $sql ="SELECT * FROM products limit $start, $limit";
        return $this->getAll($sql);
    }
    public function thongKe1(){
        $sql ="SELECT product_name as'name', Sum(quantity) as 'quantity' FROM `order_detail` GROUP by(product_name);";
        return $this->getAll($sql);
    }
    public function topSell(){
        $sql="SELECT product_name as name, Sum(quantity) as quantities FROM `order_detail` GROUP by name ORDER by quantities DESC Limit 4;";
        return $this->getAll($sql);
    }
    public function topSellThree(){
        $sql="SELECT products.products_id as products_id,products.images as image,order_detail.product_name as name, Sum(order_detail.quantity) as quantities FROM `order_detail` INNER JOIN products on order_detail.product_id=products.products_id GROUP by name ORDER by quantities DESC Limit 3;";
        return $this->getAll($sql);
    }

}