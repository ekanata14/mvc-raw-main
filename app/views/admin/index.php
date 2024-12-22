<h1>Admin Page</h1>
<a href="<?= BASE_URL ?>/admin/addPetugas" class="btn btn-primary mb-2">Tambah Petugas</a>
<a href="<?= BASE_URL ?>/admin/addUser" class="btn btn-primary mb-2">Tambah User</a>
<a href="<?= BASE_URL ?>/auth/logout" class="btn btn-danger mb-2">Logout</a>
<div class="col-6">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach($data['users'] as $user): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>/admin/editPetugas/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                        <form action="<?= BASE_URL ?>/admin/deletePetugasAction" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>"> 
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php $i++ ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>