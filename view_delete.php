<p>Please confirm your password to delete your account.</p>

<?php include "model_delete.php"?>

<form action="profile.php" method="post">
    Password: <input type="password" name="password" required><br>
    Confirm Password: <input type="password" name="confirm_password" required><br>

    <input type="submit" value="Delete Account">
</form>