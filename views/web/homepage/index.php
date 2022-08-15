<?php include_once('views/web/layouts/app.php') ?>
<?php require_once('app/Models/Product.php') ?>
<?php require_once('app/Models/Categories.php') ?>
<?php require_once('app/Models/Cart.php') ?>
<?php startblock('content') ?>
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Chất lượng sản phẩm</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free ship</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Hỗ trợ</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Top sản phẩm bán chạy</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php foreach($topSell as $product): ?>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right"><?php echo $product->quantities ." Products" ?></p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="<?php echo asset("storage/{$product->image}"); ?>" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0"><?php echo $product->name ?></h5>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="<?php echo url("product/show&product_id={$product->products_id}") ?>"
                                    class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                <form action="<?php echo url("cart/add&product_id={$product->products_id}")?>" method="POST">
                                    <button type="submit" class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                </form>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            
            
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    
    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
       <?php
                                        if (isset($_GET["page"])) {
                                            $page  = $_GET["page"]; 
                                            
                                            } 
                                            else{ 
                                            $page=1;
                                            
                                            };  
                                          ?> 
                                        
        <div class="row px-xl-5 pb-3">
            <div class="row px-xl-5 pb-3">
                <?php include('views/web/includes/product.php') ?>
            </div>
        </div>   
        <div class="col-12 pb-1">
        <?php $product = new Product(); 
		                                $products = $product->findAll()->hydrate();
                                        $cnt = count($products);
                                        $limit = 4; 
                                        $total_pages=ceil($cnt/$limit);
                                        ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-3">
                    <?php 
                        

                        for($i=1 ; $i<=$total_pages;$i++){
                            
                              ?>  <li class="page-item "   ><a class="page-link" href="<?php echo url("homepage/index&page={$i}") ?>"><?php echo $i?> </a></li><?php 
                            
                            
                            
                        }

                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
        </div>
        <?php
                                        if (isset($_GET["page1"])) {
                                            $page1  = $_GET["page1"]; 
                                            
                                            } 
                                            else{ 
                                            $page1=1;
                                            
                                            };  
                                          ?> 
        <div class="row px-xl-5 pb-3">
            
                <?php include('views/web/includes/justarrived.php') ?>
            
            
        </div>
        <div class="col-12 pb-1">
        <?php $product = new Product(); 
		                                $products = $product->findAll()->hydrate();
                                        $cnt = count($products);
                                        $limit = 4; 
                                        $total_pages1=ceil($cnt/$limit);
                                        ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-3">
                    <!-- <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li> -->
                    <?php 
                        

                        for($i=1 ; $i<=$total_pages;$i++){
                            
                              ?>  <li class="page-item "   ><a class="page-link" href="<?php echo url("homepage/index&page1={$i}") ?>"><?php echo $i?> </a></li><?php 
                            
                            
                            
                        }

                    ?>
                </ul>
            </nav>
        </div>
    </div> 
    <!-- Products End -->



<?php endblock('content') ?>

<?php startblock('js') ?>
    <script>
        $(function() {
            $('#navbar-vertical').collapse('show')
        });
    </script>
<?php endblock()?>
