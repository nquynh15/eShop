<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Order.php');
require_once('app/Models/User.php');
class ThongkeController extends BackendController
{
    private $products;
    private $key ='products';
    public function __construct(){
        $this->products= new Product();
        $this->order = new Order();
        $this->user=new User();
    }
    public function index()
    {
        $countP =$this->products->countProduct()->get();
        $cnt =count($countP);
        $countO=$this->order->countOrder()->get();
        $cntO=count($countO);
        $countPrice=$this->order->sumPrice()->hydrate();
        $countUser=$this->user->countUser()->get();
        $cntU=count($countUser);
        return $this->view("thongke/index.php",['countProduct'=>$cnt,'countOder'=>$cntO,'sumPrice'=>$countPrice,'countUser'=>$cntU]);
    }
    
}