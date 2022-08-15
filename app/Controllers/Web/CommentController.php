<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Comment.php');
require_once('app/Models/Product.php');
class CommentController extends WebController
{
    protected $cart;
    
    public function __construct()
    {
        $this->comment= new Comment();
        $this->product= new Product();
    }
    public function index()
    {
        return $this->view('product/show.php');
    }
    public function post()
    {
        if ($this->middleware('Authenticated')) {
            $_POST['users_id'] = Auth::getUser('user')['users_id'];
            $_POST['users_name'] = Auth::getUser('user')['name'];
            $_POST['products_id']=$_GET['product_id'];
            if(isset($_POST['post'])){
                $this->comment->create($_POST);
            }  
            
            $id = $_POST['products_id'];
            $countComment =$this->comment->countComment($id)->get();
            $product = $this->product->find( $_POST['products_id'])->hydrate();
            $cntComment =count($countComment);
            $viewComment=$this->comment->viewAll($id)->hydrate();
            $product = $this->product->find($id)->hydrate();
            return redirect('product/show',['product_id'=>$id]);
            
            
        }
    }
}

?>