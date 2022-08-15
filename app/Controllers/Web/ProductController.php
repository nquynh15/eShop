<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Comment.php');
class ProductController extends WebController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
        $this->comment= new Comment();
    }

    public function show()
    {
        $id=$_GET['product_id'];
        $countComment =$this->comment->countComment($id)->get();
        $cntComment =count($countComment);
        $viewComment=$this->comment->viewAll($id)->hydrate();
        $product = $this->product->find($id)->hydrate();
        return $this->view('product/show.php', ['products' => $product,'countComment'=>$cntComment,'viewComment'=>$viewComment]);
    }
    public function search(){
        $searchP= new Product();
        $listP =$searchP->search($_POST['search'])->hydrate();
        return $this->view("product/search.php",['products'=>$listP]);
    }
}

?>