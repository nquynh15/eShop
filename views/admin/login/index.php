<?php include_once('views/web/layouts/app.php') ?>

<?php startblock('content') ?>
    
<!-- Contact Start -->
<div class="container-fluid pt-5 text-align">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Đăng nhập tài khoản quản lý</span></h2>
    </div>
    
    <div class="row justify-content-md-center px-xl-5">
                        <?php if (Flash::has('signin_error')): ?>
							<div class="alert alert-danger" role="alert">
								<?php echo Flash::get('signin_error') ?>
							</div>
						<?php endif ?>  
        <form class="col-md-6 col-12" action="<?php echo url('admin/login/login') ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email'] )? $_POST['email'] : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?php echo isset($loginErrors['email']) ? $loginErrors['email'] : '' ?></p>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <p class="text-danger"><?php echo isset($loginErrors['password']) ? $loginErrors['password'] : '' ?></p>
                
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
</div>
<!-- Contact End -->


<?php endblock() ?>