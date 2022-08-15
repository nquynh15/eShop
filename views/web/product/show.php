<?php include_once('views/web/layouts/app.php') ?>
<?php require_once('app/Models/Product.php') ?>

<?php startblock('content') ?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?php echo asset("storage/{$products->images}"); ?>" alt="Image">
                    </div>


                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo asset("storage/{$products->images}"); ?>" alt="Image">
                    </div>


                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?php echo $products->name ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                
            </div>
            <h3 class="font-weight-semi-bold mb-4"><?php echo $products->price ?></h3>
            <p class="mb-4"><?php echo $products->description ?></p>
            <form action="<?php echo url("cart/add&product_id={$products->products_id}")?>" method="POST">
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-1" name="size"
                            value="<?php echo $products->size ?>">
                        <label class="custom-control-label" for="size-1"><?php echo $products->size ?></label>
                    </div>



                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-1" name="color"
                            value="<?php echo $products->color ?>">
                        <label class="custom-control-label" for="color-1"><?php echo $products->color ?></label>
                    </div>


                </div>
                

                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </form>

            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (<?php echo "$countComment"?>)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p><?php echo $products->description?></p>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Additional Information</h4>
                    <p><?php echo $products->addtional_information?></p>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">

                        <div class="row">
                            
                            <div class="col-md-6">
                                <?php foreach($viewComment as $commnet) :?>
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6><?php echo "$commnet->users_name" ?></h6>
                                        <p><?php echo "$commnet->content" ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                
                                <form method="POST" action="<?php echo url("comment/post&product_id={$products->products_id}") ?>">
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <input id="message" cols="30" rows="5" class="form-control" name="content"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="post" value="Post" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <?php
                    $product = new Product();
                    $products=$product->findAll()->hydrate();
                   
                ?>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <?php foreach($products as $product): ?>
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="<?php echo asset("storage/{$product->images}"); ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $product->name?></h6>
                        <div class="d-flex justify-content-center">
                            <h6><?php echo $product->price?></h6>

                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="<?php echo url("product/show&product_id={$product->products_id}") ?>"
                            class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                            Detail</a>
                        <form action="<?php echo url("cart/add&product_id={$product->products_id}")?>" method="POST">
                            <button type="submit" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <?php endblock() ?>