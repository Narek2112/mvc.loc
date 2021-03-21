<div class="card" >
    <div class="card-header d-flex justify-content-between">
        <h5>Admins List</h5>
        <div>
            <a href="<?= url('/admin/products/create') ?>" class="btn btn-success">Create New Product</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td scope="col"><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td>$<?= $product['price'] ?></td>
                        <td><img class="img-fluid" height="50" width="50" src="<?= $product['src'] ?>" alt=""></td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="<?= url("/admin/products/".$product['id']."/edit") ?>" class="btn btn-primary">Edit</a>
                                <form action="<?= url("/admin/products/".$product['id']."/delete") ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
