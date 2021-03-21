<div class="card" >
    <div class="card-header d-flex justify-content-between">
        <h5>Admins List</h5>
        <div>
            <a href="<?= url('/admin/admins/create') ?>" class="btn btn-success">Create Admin</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($admins as $admin) : ?>
                <tr>
                    <td scope="row"><?= $admin['id'] ?></td>
                    <td><?= $admin['name'] ?></td>
                    <td><?= $admin['username'] ?></td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a  href="<?= url("/admin/admins/".$admin['id']."/edit/") ?>" class="btn btn-primary w-45">Edit</a>
                            <form action="<?= url("/admin/admins/".$admin['id']."/delete/") ?>" method="post">

                                <button type="submit" class="btn btn-danger ">Delete</button>
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
