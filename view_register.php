<h2>Register view<h2>
<p>Register user</p>

<?php include "model_register.php"?>

<form action="register.php" method="get">
    Username: <input type="text" name="username"><br>
    Real name: <input type="text" name="realname"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    Zipcode / Postal code: <input type="text" name="zipcode"><br>
    Bio <input type="text" name="bio"><br>
    Salary:  <input type="number" name="salary"><br>
    Preference: <input type="number" name="preference"><br>
    <input type="submit" value="Register account">
</form>

Already have an account? <a href="login.php">Log in here</a>