<div class="card" >
    <div class="card-header d-flex justify-content-between">
        <h5>Update  Admin</h5>
        <div>
            <a href="<?= url('/admin/home') ?>" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= url('/admin/admins/'.$id.'/update/') ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>">
                <?php if ($errors && $errors['name']): ?>
                    <?= show_validation_errors($errors['name']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="username" class="form-control"  value="<?= $user['username'] ?>">
                <?php if ($errors['username']): ?>
                    <?= show_validation_errors($errors['username']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="name">New Password</label>
                <input type="password" name="password" class="form-control">
                <?php if ($errors['password']): ?>
                    <?= show_validation_errors($errors['password']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="name">Confirm New Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <?php if ($errors['confirm_password']): ?>
                    <?= show_validation_errors($errors['confirm_password']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="name">Your Password</label>
                <input type="password" name="current_password" class="form-control">
                <?php if ($errors['current_password']): ?>
                    <?= show_validation_errors($errors['current_password']) ?>
                <?php endif ?>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
</div>
