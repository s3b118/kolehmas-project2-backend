<?php
// Om data har skickats
if (! empty($_REQUEST['username']) && ! empty($_REQUEST['email'])) {

    $username   = test_input($_REQUEST['username']);
    $realname   = test_input($_REQUEST['realname']);
    $email      = test_input($_REQUEST['email']);
    $password   = test_input($_REQUEST['password']);
    $passhash   = password_hash($password, PASSWORD_DEFAULT);
    $zipcode    = test_input($_REQUEST['zipcode']);
    $bio        = test_input($_REQUEST['bio']);
    $salary     = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['preference']);
    $likes      = 0; // model_likes ej implementerad, default = 0
    $role       = 1; // 1 = användare 2 = moderator 3 = admin

    // Användar-input skadlig till databasen - ENDAST PREPARED STATEMENTS med ? placeholder
    $sql = "INSERT INTO profiles (id, username, realname, email, passhash, zipcode, bio, salary, preference, likes, role) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$username, $realname, $email, $passhash, $zipcode, $bio, $salary, $preference, $likes, $role])) {

        $_SESSION['username'] = $username;

        // Redirect efter 3 sekunder
        echo("<h2 id='successfulUserInput'>Registered successfully! Redirecting to your profile in 3 seconds...</h2>");

        // HTML meta refresh (redirect after 3 sekunder)
        echo '<meta http-equiv="refresh" content="3;url=profile.php">';

    } else {
        echo("<h2 id='errorOnUserInput'>Error on executing SQL</h2>");
    }
}
