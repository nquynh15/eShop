<?php include_once('views/admin/layouts/main.php') ?>
<?php require_once('app/Models/Order.php') ?>
<?php startblock('orders') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Đơn đặt hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo url('admin/thongke/index') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item">Bảng</li>
                <li class="breadcrumb-item active">Đặt hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Bảng Đặt hàng </h5>


                        <!-- Table with stripped rows -->
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-top">

                                <form method="POST" action="<?php echo url('admin/Oders/searchOders') ?>">
                                    <div class="dataTable-search">
                                        <input class="dataTable-input" placeholder="Search..." type="text"
                                            name="search">
                                        <button type="submit" class="btn btn-primary">Tìm</button>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Điện thoại</th>
                                            <th scope="col">Địa chỉ 1</th>
                                            <th scope="col">Địa chỉ 2</th>
                                            <th scope="col">Tổng giá</th>
                                            <th scope="col">thanh  toán</th>
                                            <th scope="col">mã ID người đặt</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($oders)>0) :?>
                                        <?php foreach ($oders as $oder) :?>

                                        <tr>
                                            <th scope="row"><?php echo $oder->order_id ?></th>
                                            <td><?php echo $oder->name; ?></td>
                                            <td><?php echo $oder->phone_number; ?></td>

                                            <td><?php echo $oder->address_street ?></td>
                                            <td><?php echo $oder->address ?></td>
                                            <td style="text-align: center;"><?php echo $oder->subtotal?></td>
                                            <td><?php echo $oder->payment?></td>
                                            <td><?php echo $oder->users_id ?></td>

                                        </tr>
                                        <?php endforeach ?>
                                        <?php else: ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                No products found
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
<?php endblock() ?>