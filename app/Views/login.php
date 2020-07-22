
<?= $this->extend('layouts/header') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 ">
            <div class="container">
                <h3 class="text-center">Login</h3>
                <?php if(session()->get('success')) :?>
                   <div class="alert alert-success" role="alert"> <?= session()->get('success') ?></div>
                <?php endif; ?>
                <hr>
                <form action="" method="post">
                   <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="password">Email:</label>
                        <input type="text" class="form-control" name="password" id="password" value="<?= set_value('password') ?>"> 
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
                            <button type="submit" class="btn btn-primary">Login</button>
                       </div>
                       <div class="col-12 col-sm-8">
                        <a href="/register">Don't have an account yet?</a>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>