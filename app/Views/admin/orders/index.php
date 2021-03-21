<div class="card" >
    <div class="card-header d-flex justify-content-between">
        <h5>Order List</h5>
        <div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['date'] ?></td>
                        <td>$<?= $order['total_price'] ?></td>
                        <td class="d-flex justify-content-around">
                            <a href="<?= url("/admin/orders/".$order['id']."/show") ?>" class="btn btn-primary">Order Details</a>
                            <form action="<?= url("/admin/orders/".$order['id']."/delete") ?>" method="post">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
