
<?= $this->extend('layouts/header') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 ">
            <div class="container">
                <h3 class="text-center">Register</h3>
                <hr>
                <form action="/register" method="post">
                   <div class="form-group">
                        <label for="firstname">firatname:</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="lastname">lastname:</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="email">email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password') ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="password_comfirm">Password Comfirm:</label>
                        <input type="password" class="form-control" name="password_comfirm" id="password_comfirm"> 
                   </div>
                   <?php if(isset($validation)) :?>
                         <div class="col-12">
                              <div class="alert alert-danger" role="alert">
                                   <?= $validation->listErrors(); ?>
                              </div>
                         </div>
                   <?php endif; ?>

                   <div class="row">
                       <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">register</button>
                       </div>
                       <div class="col-12 col-sm-8">
                        <a href="/">You have a account</a>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>