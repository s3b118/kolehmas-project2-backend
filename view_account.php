<h2>Account Details</h2>

<?php include "model_account.php"?>

<p>Here is your current profile information:</p>

<!-- Visar nuvarande information -->
<ul>
    <li><strong>Username:</strong> <?php echo htmlspecialchars($row['username']);?></li>
    <li><strong>Full Name:</strong> <?php echo htmlspecialchars($row['realname']);?></li>
    <li><strong>Email:</strong> <?php echo htmlspecialchars($row['email']);?></li>
    <li><strong>Zipcode:</strong> <?php echo htmlspecialchars($row['zipcode']);?></li>
    <li><strong>Bio:</strong> <?php echo htmlspecialchars($row['bio']);?></li>
    <li><strong>Salary:</strong> <?php echo htmlspecialchars($row['salary']);?></li>
    <li><strong>Preference:</strong> <?php echo htmlspecialchars($row['preference']);?></li>
</ul>

<!-- Form för uppdatering av profil -->
<h3>Edit Profile</h3>
<p>You can edit your profile as <?php echo htmlspecialchars($_SESSION['username']);?> below:</p>

<form action="profile.php" method="get">
    Full name: <input type="text" name="fullname" value="<?php echo htmlspecialchars($row['realname']);?>"><br>
    Email: <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']);?>"><br>
    Zipcode: <input type="text" name="zipcode" value="<?php echo htmlspecialchars($row['zipcode']);?>"><br>
    Bio: <input type="text" name="bio" value="<?php echo htmlspecialchars($row['bio']);?>"><br>
    Salary: <input type="number" name="salary" value="<?php echo htmlspecialchars($row['salary']);?>"><br>
    Preference: <input type="number" name="preference" value="<?php echo htmlspecialchars($row['preference']);?>"><br>
    Password (leave blank if not changing): <input type="password" name="password" value=""><br>
    <input type="submit" value="Update Profile">
</form>