<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Product.php');
class DoanhthuController extends BackendController
{
    public function __construct(){
        $this->products= new Product();
        // $this->order = new Order();
        // $this->user=new User();
    }
    public function index()
    {
        $data =$this->products->thongKe1()->hydrate();
        $dataTopSell=$this->products->topSell()->hydrate();
        return $this->view('doanhthu/index.php',['data'=>$data,'dataTopSell'=>$dataTopSell]);
    }
    

}