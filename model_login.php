<?php
// Om data har skickats
if (! empty($_POST['username']) && ! empty($_POST['password'])) {

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']); // Lösenord från login-form (text)

    // Användar-input skadlig till databasen - ENDAST PREPARED STATEMENTS med ? placeholder
    $sql = "SELECT id, username, passhash FROM profiles WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verifierar om lösenordet matchar passhash i databasen
        if (password_verify($password, $row['passhash'])) {

            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id']  = $row['id'];
            echo("<h2 id='successfulUserInput'>Login successful! Redirecting to your profile...</h2>");
            header("Refresh:3; url=profile.php"); // Redirect till profile.php efter 3 sekunder
        } else {
            echo("<h2 id='errorOnUserInput'>Invalid password.</h2>");
        }
    } else {
        echo("<h2 id='errorOnUserInput'>No user found with this username.</h2>");
    }
}
