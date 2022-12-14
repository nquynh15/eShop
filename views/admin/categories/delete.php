<head>
    <title>Categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="<?php echo asset('assets/admin/css/style1.css')?>" rel="stylesheet">

</head>

<?php require_once('app/Models/Categories.php') ?>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Xóa Categories</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="wrapper img"
                        style='background-image: url("<?php echo asset('assets/admin/img/img.jpg') ; ?>") '>
                        <div class="row">
                            <div class="col-md-9 col-lg-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">

                                    <!-- <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div> -->
                                    <?php
                        $id = $_GET['categories_id'];
                        $this_category = new Categories();
                        $categories = $this_category->find($id)->hydrate();
                    ?>
                                    <?php if (Flash::has('create_error')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo Flash::get('create_error') ?>
                                    </div>
                                    <?php endif ?>
                                    <?php if (Flash::has('create_success')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo Flash::get('create_success') ?>
                                    </div>
                                    <?php endif ?>
                                    <form method="POST" class="contactForm"
                                        action="<?php echo url("admin/categories/delete1", ['categories_id' => $id]) ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="name">ID Categories</label>
                                                    <input type="text" class="form-control" 
                                                        value="<?php echo $categories->categories_id ?>">

                                                    <label class="label" for="name">Tên Categories</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="<?php echo $categories->name ?>">
                                                    <p class="text-danger">
                                                        <?php echo isset($categoriesErrors['name']) ? $categoriesErrors['name'] : '' ?>
                                                    </p>
                                                    <label class="label" for="name">Mô tẩ ngắn</label>
                                                    <input type="text" class="form-control" name="slug" id="name"
                                                        value="<?php echo $categories->slug ?>">
                                                    <p class="text-danger">
                                                        <?php echo isset($categoriesErrors['slug']) ? $categoriesErrors['slug'] : '' ?>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div>
                                                        <input type="submit" value="Xóa categories"
                                                            class="btn btn-primary" id="btn">
                                                        <!-- <button type="submit" class="btn btn-primary"> create</button> -->
                                                    </div>
                                                    <div>
                                                        <a href="<?php echo url('admin/thongke/index') ?>">
                                                            <input value="quay về  Admin" class="btn btn-primary">
                                                        </a>
                                                    </div>
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo asset('assets/admin/jscreate/js/jquery.min.js') ?>"></script>
    <script src="<?php echo asset('assets/admin/jscreate/js/popper.js') ?>"></script>
    <script src="<?php echo asset('assets/admin/jscreate/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo asset('assets/admin/jscreate/js/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo asset('assets/admin/jscreate/js/main.js') ?>"></script>