<div class="card" >
    <div class="card-header d-flex justify-content-between">
        <h5>Create Product</h5>
        <div>
            <a href="<?= url('/admin/products') ?>" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= url('/admin/products/store') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?= old('name') ?>">
                <?php if ($errors && $errors['name']): ?>
                    <?= show_validation_errors($errors['name']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number"  step=".01" name="price" id="price" class="form-control" value="<?= old('price') ?>">
                <?php if ($errors['price']): ?>
                    <?= show_validation_errors($errors['price']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input type="file" name="image" class="form-control">
                <?php if ($errors['image']): ?>
                    <?= show_validation_errors($errors['image']) ?>
                <?php endif ?>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-success">Create Product</button>
            </div>
        </form>
    </div>
</div>
