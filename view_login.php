<h2>Login view<h2>
<p>Login as user</p>

<?php include "model_login.php"?>

<form action="login.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>

    <input type="submit" value="Login">
</form>

Don't have an account? <a href="register.php">Register here</a>