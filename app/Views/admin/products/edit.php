<div class="card" >
    <div class="card-header d-flex justify-content-between">
        <h5>Edit Product</h5>
        <div>
            <button class="btn btn-dark"  data-toggle="modal" data-target="#productImageModal">Show Product Image</button>

            <a href="<?= url('/admin/products') ?>" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= url('/admin/products/'.$product['id'].'/update') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?= old('name') ?? $product['name'] ?>">
                <?php if ($errors && $errors['name']): ?>
                    <?= show_validation_errors($errors['name']) ?>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number"  step=".01" name="price" id="price" class="form-control" value="<?= old('price') ?? $product['price'] ?>">
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
                <button class="btn btn-success">Update Product</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <img src="<?= $product['src']?>" alt="">
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="productImageModal" tabindex="-1" role="dialog" aria-labelledby="productImageModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Product Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid w-100" src="<?= $product['src']?>" alt="">

            </div>

        </div>
    </div>
</div>

