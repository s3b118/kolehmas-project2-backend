<?php
$username = $_SESSION['username'];
echo("Welcome user " . $username . "<br>");

$sql  = "SELECT * FROM profiles WHERE username = ?"; // SQL kommando för användardata
$stmt = $conn->prepare($sql);                        // Prepared statements för säkerhet
$stmt->execute([$username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC); // Associativ array

// Användar-id från databasen
$user_id = $row['id'];
echo("You are user with id: " . $user_id . "<br>");

// Om HTML form har skickats
if (! empty($_REQUEST['fullname']) && ! empty($_REQUEST['email']) && ! empty($_REQUEST['zipcode']) && ! empty($_REQUEST['bio']) && ! empty($_REQUEST['salary']) && ! empty($_REQUEST['preference'])) {

    $realname   = test_input($_REQUEST['fullname']);
    $bio        = test_input($_REQUEST['bio']);
    $zipcode    = test_input($_REQUEST['zipcode']);
    $email      = test_input($_REQUEST['email']);
    $salary     = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['preference']);

    // Om nytt lösenord, uppdatera med ny hash
    if (! empty($_REQUEST['password'])) {
        $password = test_input($_REQUEST['password']);
        $passhash = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // Om ingen lösenordsförändring, använd nuvarande pass-hash i databas
        $passhash = $row['passhash'];
    }

    // Uppdaterar användardata i databas
    $sql  = "UPDATE profiles SET realname = ?, bio = ?, zipcode = ?, email = ?, salary = ?, preference = ?, passhash = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$realname, $bio, $zipcode, $email, $salary, $preference, $passhash, $user_id])) {
        echo("<strong>Your profile has been updated.</strong><br>");
        echo("Refreshing page in 2 seconds.");
        echo '<meta http-equiv="refresh" content="2;url=profile.php">';
    } else {
        echo("Error: Failed to update profile.");
    }
}
