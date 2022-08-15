<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');
class HomepageController extends WebController
{
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $topSell=$this->product->topSellThree()->hydrate();
        return $this->view('homepage/index.php',['topSell'=>$topSell]);
    }
    
}

?>