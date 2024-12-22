<h1>Login</h1>
<form action="<?= BASE_URL ?>/auth/login" method="POST" class="d-flex flex-column">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="my-2">
    <label for="password">Password</label>
    <input type="text" name="password" id="password" class="my-2">
    <button type="submit" class="btn btn-primary my-3">Login</button>
</form>
<a href="<?= BASE_URL ?>/auth/register">Register</a>