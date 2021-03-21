<!--<div id="login">-->
<!--    <h3 class="text-center text-white pt-5">Login form</h3>-->
<!--    <div class="container">-->
<!--        --><?//= show_flash_message() ?>
<!--        <div id="login-row" class="row justify-content-center align-items-center">-->
<!---->
<!--            <div id="login-column" class="col-md-6">-->
<!--                <div id="login-box" class="col-md-12">-->
<!--                    <form id="login-form" class="form" action="" method="post">-->
<!--                        <h3 class="text-center text-info">Login</h3>-->
<!--                        <div class="form-group">-->
<!--                            <label for="username" class="text-info">Username:</label><br>-->
<!--                            <input type="text" name="username" id="username" value="--><?//= old('username') ?><!--" class="form-control">-->
<!--                            --><?php //if ($errors['username']): ?>
<!--                                --><?//= show_validation_errors($errors['username']) ?>
<!--                            --><?php //endif ?>
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="password" class="text-info">Password:</label><br>-->
<!--                            <input type="text" name="password" id="password" value="" class="form-control">-->
<!--                            --><?php //if ($errors['password']): ?>
<!--                                --><?//= show_validation_errors($errors['password']) ?>
<!--                            --><?php //endif ?>
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">-->
<!--                        </div>-->
<!--                        <div id="register-link" class="text-right">-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="container mt-4">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Login</h5>

    </div>
    <div class="card-body">
        <form id="login-form" class="form" action="" method="post">
            <?= show_flash_message() ?>
            <div class="form-group">
                <label for="username" class="text-info">Username:</label><br>
                <input type="text" name="username" id="username" value="<?= old('username') ?>" class="form-control">
                <?php if ($errors['username']): ?>
                    <?= show_validation_errors($errors['username']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Password:</label><br>
                <input type="password" name="password" id="password" value="" class="form-control">
                <?php if ($errors['password']): ?>
                    <?= show_validation_errors($errors['password']) ?>
                <?php endif ?>
            </div>
            <div class="form-group text-right">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
            </div>

        </form>
    </div>
</div>
</div>