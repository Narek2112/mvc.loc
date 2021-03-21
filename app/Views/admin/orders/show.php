<div class="card" ">
    <div class="card-body">
        <div class="d-flex justify-content-between p-2">
            <h5 class="card-title">Order #<?= $order['id']?> (<?= $order['date'] ?>) </h5>
            <a class="btn btn-info" href="/admin/orders">Back</a>
        </div>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($order['products'] as $product) : ?>
                    <tr>
                        <td scope="col"><a href="<?= url('/admin/products/'.$product['id'].'/edit') ?>"><?= $product['name'] ?></a> </td>
                        <td><?= $product['name'] ?></td>
                        <td>$<?= $product['price'] ?></td>

                    </tr>
                <?php endforeach ?>
                <tr class="font-weight-bold ">
                    <td colspan="2">Total</td>
                    <td class="bg-success">$<?= $order['total_price'] ?></td>
                </tr>
                </tbody>
            </table>
    </div>
</div>