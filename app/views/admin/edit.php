<h1>Edit</h1>
<form action="<?= BASE_URL ?>/admin/editPetugasAction" method="POST" class="d-flex flex-column">
    <input type="hidden" name="id" id="id" value="<?= $data['user']['id'] ?>">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?= $data['user']['username'] ?>" class="my-2">
    <label for="password">Password</label>
    <input type="text" name="password" id="password" value="<?= $data['user']['password'] ?>" class="my-2">
    <input type="text" name="role" id="role" value="<?= $data['user']['role'] ?>" disabled class="my-2"> 
    <button type="submit" class="btn btn-warning my-2">Edit</button>
</form>