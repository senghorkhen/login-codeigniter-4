
<?= $this->extend('layouts/header') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 ">
            <div class="container">
                <h3 class="text-center"><?= $user['firstname'].' '.$user['lastname'] ?></h3>
                <hr>
               <?php if(session()->get('success')) :?>
                   <div class="alert alert-success" role="alert"> <?= session()->get('success') ?></div>
               <?php endif; ?>
                <form action="/profile" method="post">
                   <div class="form-group">
                        <label for="firstname">firatname:</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname',$user['firstname']) ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="lastname">lastname:</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname',$user['lastname']) ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="email">email:</label>
                        <input type="text" class="form-control" readonly id="email" value="<?= $user['email'] ?>"> 
                   </div>

                   <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" value=""> 
                   </div>

                   <div class="form-group">
                        <label for="password_comfirm">Password Comfirm:</label>
                        <input type="password" class="form-control" name="password_comfirm" id="password_comfirm" value=""> 
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
                            <button type="submit" class="btn btn-primary">Update</button>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>