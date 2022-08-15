<?php include_once('views/web/layouts/app.php') ?>

<?php startblock('content') ?>
    
<!-- Contact Start -->
<div class="container-fluid pt-5 text-align">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Login to your account</span></h2>
    </div>
    
    <div class="row justify-content-md-center px-xl-5">
                        <?php if (Flash::has('signin_error')): ?>
							<div class="alert alert-danger" role="alert">
								<?php echo Flash::get('signin_error') ?>
							</div>
						<?php endif ?>  
        <form class="col-md-6 col-12" action="<?php echo url('login/miss') ?>" method="POST">
         
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email'] )? $_POST['email'] : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?php echo isset($missErrors['email']) ? $missErrors['email'] : '' ?></p>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <p class="text-danger"><?php echo isset($missErrors['password']) ? $missErrors['password'] : '' ?></p>
                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword1">
                <p class="text-danger"><?php echo isset($missErrors['confirm_password']) ? $missErrors['confirm_password'] : '' ?></p>
                
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <button type="submit" name="miss" class="btn btn-primary">Login</button>
            
        </form>
    </div>
</div>
<!-- Contact End -->


<?php endblock() ?>